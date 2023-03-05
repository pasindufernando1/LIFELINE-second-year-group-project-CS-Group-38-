<?php
session_start();
$_SESSION['error'] = '';

class User extends Controller
{
<<<<<<< Updated upstream

    function __construct()
=======
    public function __construct()
>>>>>>> Stashed changes
    {
        parent::__construct();
    }

    public function dashboard()
    {
        
        //redirect to login if not logged in or login button in not clicked
        if (!isset($_POST['login']) && !isset($_SESSION['login'])) {
            header("Location: /authentication/login");
        }
        
        //if already logged in redirect according to user types
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/dashboard');
                exit;
            } else if ($_SESSION['type'] == "Admin") {
                $this->view->render('layout/navigation');
                exit;
            } else if ($_SESSION['type'] == "Donor") {
                $this->view->render('systemuser/dashboard');
                exit;
            } else {
                $this->view->render('systemuser/dashboard');
                exit;
            }
        }


        //get POST data from login page
        $uname = $_POST['username'];
        $pwd = $_POST['password'];


        $type = $this->model->gettype($uname);
        $_SESSION['type'] = $type;

<<<<<<< Updated upstream
=======
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
                $_SESSION['packets'] = $this->model->getAllPackets($_SESSION['blood_bank_id']);
                $this->view->render('systemuser/dashboard');
                $_SESSION['bloodtypes'] = $this->model->getAllTypes($_SESSION['blood_bank_id']);
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

            if ($this->model->authenticate($uname, $pwd)) {
                $_SESSION['useremail'] = $_POST['username'];
                //set session variables
                $_SESSION['login'] = 'loggedin';
                $_SESSION['username'] = $this->model->getUserName($uname);
                $_SESSION['hospitals'] = $this->model->getHospitals();
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
                $_SESSION['username'] = $this->model->getUserName($uname);

                $_SESSION['today'] = date('Y-m-d H:i:s');

                $_SESSION['upcoming_campaigns'] = $this->model->getAllCampaigns(
                    $_SESSION['today']
                );

                $_SESSION['newest_badge'] = $this->model->getnewestbadge(
                    $_SESSION['user_ID']
                );

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
>>>>>>> Stashed changes

        
        if ($this->model->authenticate($uname, $pwd)) {

<<<<<<< Updated upstream
            //set session variables
            
            $_SESSION['login'] = "loggedin";
            $_SESSION['username'] = $this->model->getUserName($uname);
            $_SESSION['bloodbankname'] = $this->model->getBloodBankName($uname);
            $this->view->render('systemuser/dashboard');

            
        }
         else {
            $_SESSION['error'] = 'Incorrect Username or Password';
            header("Location: /login");
=======
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
                $_SESSION['campaignsList'] = $this->model->view_campaign_info();

                $_SESSION['login'] = 'loggedin';
                $_SESSION['username'] = $this->model->getUserName($uname);
                $_SESSION['User_ID'] = $this->model->getUserID($uname);
                $this->view->render('organization/dashboard');
            } else {
                $_SESSION['error'] = 'Incorrect Username or Password';
                header('Location: /login');
            }
        } else {
            $_SESSION['error'] = 'Username Not Found';
            header('Location: /login');
            exit();
>>>>>>> Stashed changes
        }
    }

    public function logout()
    {
        //destroy session variables
        session_unset();
        session_destroy();
        session_regenerate_id(true);
        header("Location: /");
    }
}