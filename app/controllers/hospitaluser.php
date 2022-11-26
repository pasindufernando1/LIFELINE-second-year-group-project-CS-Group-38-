<?php
session_start();
$_SESSION['error'] = '';

class HospitalUser extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function dashboard()
    {
        
        //redirect to login if not logged in or login button is not clicked
        if (!isset($_POST['login']) && !isset($_SESSION['login'])) {
            header("Location: /authentication/hospitalslogin");
        }
        
        //if already logged in redirect to the admin dashboard
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $this->view->render('hospitals/dashboard');
                exit;
            }
        }


        //get POST data from login page
        $uname = $_POST['username'];
        $pwd = $_POST['password'];
        
        

        $type = $this->model->gettype($uname);
        $_SESSION['type'] = $type;
        

        if ($this->model->authenticate($uname, $pwd)) {

            //set session variables
            $_SESSION['login'] = "loggedin";
            $_SESSION['username'] = $this->model->getUserName($uname);
            $_SESSION['User_ID'] = $this->model-> getUserID($uname);
            
            $this->view->render('hospitals/dashboard');
           
            
                
        }
        else {
            $_SESSION['error'] = 'Incorrect Username or Password';
            header("Location: /hospitals/login");
        }
    }

    function logout()
    {
        //destroy session variables
        session_unset();
        session_destroy();
        session_regenerate_id(true);
        header("Location: /hospitals/login");
    }
}