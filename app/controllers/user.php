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
                $_SESSION['blood_bank_id'] = $this ->model -> getBloodBankid($_SESSION['useremail']);
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
                $this->view->render('donor/dashboard');
            } else {
                $_SESSION['error'] = 'Incorrect Username or Password';
                header('Location: /login');
            }
            exit();
        } elseif ($_SESSION['type'] == 'Hospital/Medical_Center') {
            $type = $this->model->gettype($uname);
            $_SESSION['type'] = $type;

            if ($this->model->authenticate($uname, $pwd)) {
                //set session variables
                $_SESSION['login'] = 'loggedin';
                $_SESSION['username'] = $this->model->getUserName($uname);
                $_SESSION['User_ID'] = $this->model->getUserID($uname);
                $_SESSION['District'] = $this->model->getUserDistrict(
                    $_SESSION['User_ID']
                );
                $_SESSION['nearbyBloodbanks'] = $this->model->viewNearbyBloodbanks($_SESSION['District']);
                $_SESSION['bloodbank_contact'] = $this->model->viewBloodBankContact( $_SESSION['nearbyBloodbanks']);

                
                $user_pic = $this->model->getuserimg($uname);
            $_SESSION['user_pic'] = $user_pic;
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
                
                //print_r($_SESSION['campaignsList']);die();
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
