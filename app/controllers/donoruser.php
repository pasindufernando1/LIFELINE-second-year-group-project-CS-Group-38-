<?php
session_start();
$_SESSION['error'] = '';

class DonorUser extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    

    function dashboard()
    {
        
        //redirect to login if not logged in or login button is not clicked
        if (!isset($_POST['login']) && !isset($_SESSION['login'])) {
            header("Location: /authentication/donorlogin");
        }
        
        //if already logged in redirect to the donor dashboard
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "donor") {
               // print_r($_SESSION['type']);
                $this->view->render('donor/dashboard');
                exit;
            }
        }


        //get POST data from login page
        $uname = $_POST['username'];
        $pwd = $_POST['password'];

        //Set Donor Email as Session Variable
        $_SESSION['email'] = $_POST['username'];

        $type = $this->model->gettype($uname);
        $_SESSION['type'] = $type;

        if ($this->model->authenticate($uname, $pwd)) {

            //set session variables
            $_SESSION['login'] = "loggedin";
            $_SESSION['username'] = $this->model->getUserName($uname);
            $this->view->render('donor/dashboard');

            
        }
         else {
            $_SESSION['error'] = 'Incorrect Username or Password';
            header("Location: /donor/login");
        }
    }

    function logout()
    {
        //destroy session variables
        session_unset();
        session_destroy();
        session_regenerate_id(true);
        header("Location: /donor/login");
    }
}