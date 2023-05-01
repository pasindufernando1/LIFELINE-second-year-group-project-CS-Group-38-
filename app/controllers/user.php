<?php
session_start();
$_SESSION['error'] = '';

class User extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function dashboard()
    {
        //redirect to login if not logged in or login button in not clicked
        if (!isset($_POST['login']) && !isset($_SESSION['login'])) {
            header('Location: /authentication/login');
        }

        //if already logged in redirect according to user types
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'System User') {
                $this->view->render('systemuser/dashboard');
                exit();
            } elseif ($_SESSION['type'] == 'Admin') {
                $_SESSION['hospitals'] = $this->model->getHospitals();
                $_SESSION['dashboard_stats'] = $this->model->getDashboardStats();
                $_SESSION['blood_donations'] = $this->model->getdonations();
                $_SESSION['donor_composition'] = $this->model->getdonorcomposition();
                $this->view->render('admin/dashboard');
                exit();
            } elseif ($_SESSION['type'] == 'Donor') {
                $this->view->render('donor/dashboard');
                exit();
            } elseif ($_SESSION['type'] == 'Hospital/Medical_Center') {
                $this->view->render('hospitals/dashboard');
                exit();
            } elseif ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/dashboard');
                exit();
            }
        }

        //get POST data from login page
        $uname = $_POST['username'];
        $pwd = $_POST['password'];

        $type = $this->model->gettype($uname);
        $_SESSION['type'] = $type;


        if ($_SESSION['type'] == 'System User') {
            if ($this->model->authenticate($uname, $pwd)) {
                $_SESSION['useremail'] = $_POST['username'];

                //set session variables
                $user_pic = $this->model->getuserimg($uname);
                $_SESSION['user_pic'] = $user_pic;
                $_SESSION['blood_bank_id'] = $this->model->getBloodBankid($_SESSION['useremail']);
                $_SESSION['login'] = 'loggedin';
                $_SESSION['username'] = $this->model->getUserName($uname);
                $_SESSION['bloodbankname'] = $this->model->getBloodBankName(
                    $uname
                );

                $_SESSION['month_donations'] = $this->model->getMonthlyDonation($_SESSION['blood_bank_id']);
                $_SESSION['no_of_donors'] = $this->model->getdonorcomposition();

                date_default_timezone_set("Asia/Calcutta");
                $date = date('Y-m-d');
                $_SESSION['donation_today'] =$this->model->getTodayDonation($_SESSION['blood_bank_id'],$date);
                $_SESSION['cards_issued'] =$this->model->getCardIssued();
                $_SESSION['ads_count'] =$this->model->getAdCount($_SESSION['blood_bank_id']);
                $_SESSION['camp_req_count'] =$this->model->getCampReqCount($_SESSION['blood_bank_id']);
                $this->view->render('systemuser/dashboard');
                exit();
            } else {
                $_SESSION['error'] = 'Incorrect Username or Password';
                header('Location: /login');
            }
        } elseif ($_SESSION['type'] == 'Admin') {
            $type = $this->model->gettype($uname);
            $_SESSION['type'] = $type;

            $user_pic = $this->model->getuserimg($uname);
            $_SESSION['user_pic'] = $user_pic;

            $password = $this->model->getpassword($uname);
            $_SESSION['Password'] = $password;


            // Get pending hospital requests details
            $_SESSION['hospitals'] = $this->model->getHospitals();
            // Get the dashboard stats
            $_SESSION['dashboard_stats'] = $this->model->getDashboardStats();
            $_SESSION['blood_donations'] = $this->model->getdonations();
            $_SESSION['donor_composition'] = $this->model->getdonorcomposition();

            if ($this->model->authenticate($uname, $pwd)) {
                $_SESSION['useremail'] = $_POST['username'];
                //set session variables
                $_SESSION['login'] = 'loggedin';
                $_SESSION['username'] = $this->model->getUserName($uname);
                $this->view->render('admin/dashboard');
            } else {
                $_SESSION['error'] = 'Incorrect Username or Password';
                header('Location: /login');
            }
        } elseif ($_SESSION['type'] == 'Donor') {
            $_SESSION['email'] = $_POST['username'];

            $type = $this->model->gettype($uname);
            $_SESSION['type'] = $type;
            $_SESSION['user_ID'] = $this->model->get_user_id(
                $_SESSION['email']
            );

            if ($this->model->authenticate($uname, $pwd)) {
                //set session variables
                $_SESSION['login'] = 'loggedin';
                $_SESSION['user_pic'] = $this->model->getuserimg($uname);
                $_SESSION['username'] = $this->model->getUserName($uname);

                $_SESSION['today'] = date('Y-m-d H:i:s');

                $_SESSION['upcoming_campaigns'] = $this->model->getAllCampaigns($_SESSION['today']);

                // $_SESSION['newest_badge'] = $this->model->getnewestbadge(
                //     $_SESSION['user_ID']
                // );

                $_SESSION['camp_ads'] = $this->model->getCampAds(
                    $_SESSION['upcoming_campaigns']
                );

                //Get the last donation date of the donor
                $last_donation = $this->model->getLastDonation(
                    $_SESSION['user_ID']
                );

                $_SESSION['days_last_donation'] = null;

                if ($last_donation != false) {
                    $date1 = date_create($last_donation);
                    $date2 = date_create($_SESSION['today']);
                    $_SESSION['days_last_donation'] = date_diff($date2, $date1);
                    $_SESSION['days_last_donation'] = $_SESSION['days_last_donation']->days;
                }

                //Get the total donated amount of blood of the donor
                $_SESSION['total_donated_amount'] = $this->model->getTotalDonatedAmount(
                    $_SESSION['user_ID']
                );
                $no_of_camp_donations = $this->model->getNoOfCampDonations(
                    $_SESSION['user_ID']
                );
                $no_of_bank_donations = $this->model->getNoOfBankDonations(
                    $_SESSION['user_ID']
                );

                $_SESSION['no_of_donations'] = $no_of_camp_donations + $no_of_bank_donations;
                $this->view->render('donor/dashboard');
            } else {
                $_SESSION['error'] = 'Incorrect Username or Password';
                header('Location: /login');
            }
            exit();
        } elseif ($_SESSION['type'] == 'Hospital/Medical_Center') {
           $type = $this->model->gettype($uname);
            $_SESSION['type'] = $type;
            $status =$this->model->checkHosStatus($uname);

            if ($this->model->authenticate($uname, $pwd) && $status == 1 ) {
                //set session variables
                $_SESSION['login'] = 'loggedin';
                $_SESSION['user_pic'] = $this->model->getuserimg($uname);
                $_SESSION['username'] = $this->model->getUserName($uname);
                $_SESSION['User_ID'] = $this->model->getUserID($uname);
                $_SESSION['District'] = $this->model->getUserDistrict(
                    $_SESSION['User_ID']
                );
                $_SESSION[
                    'nearbyBloodbanks'
                ] = $this->model->viewNearbyBloodbanks($_SESSION['District']);
                $_SESSION[
                    'bloodbank_contact'
                ] = $this->model->viewBloodBankContact(
                        $_SESSION['nearbyBloodbanks']
                    );



                $this->view->render('hospitals/dashboard');
            } else {
                $_SESSION['error'] = 'Incorrect Username or Password';
                header('Location: /login');
            }
        } elseif ($_SESSION['type'] == 'Organization/Society') {
            $type = $this->model->gettype($uname);
            $_SESSION['type'] = $type;

            if ($this->model->authenticate($uname, $pwd)) {
                //set session variables
                $_SESSION['login'] = 'loggedin';
                $_SESSION['username'] = $this->model->getUserName($uname);
                $_SESSION['User_ID'] = $this->model->getUserID($uname);
                $_SESSION['campaignsList'] = $this->model->view_campaign_info($_SESSION['User_ID']);
                $_SESSION['PastCampaignsList'] = $this->model->view_past_campaign_info($_SESSION['User_ID']);
                $user_pic = $this->model->getuserimg($uname);
                $_SESSION['user_pic'] = $user_pic;
                $this->view->render('organization/dashboard');
            } else {
                $_SESSION['error'] = 'Incorrect Username or Password';
                header('Location: /login');
            }
        } else {
            $_SESSION['error'] = 'Username Not Found';
            header('Location: /login');
            exit();
        }
    }

    function logout()
    {
        //destroy session variables
        session_unset();
        session_destroy();
        session_regenerate_id(true);
        header('Location: /');
    }
}