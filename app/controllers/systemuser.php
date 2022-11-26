<?php
session_start();
$_SESSION['error'] = '';

class Systemuser extends Controller
{

    function __construct()
    {
        parent::__construct();
    }
    function header(){
        $this->view->render('systemuser/layout/sidebar');
    }
    
    function login()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "systemuser") {
                header("Location: /systemuser/dashboard");
                $this->view->render('systemuser/layout/header');
                exit;
            } else if ($_SESSION['type'] == "admin") {
                header("Location: /user/dashboard");
                $this->view->render('layout/navigation');
                exit;
            } else if ($_SESSION['type'] == "donor") {
                header("Location: /user/dashboard");
                $this->view->render('systemuser/dashboard');
                exit;
            } else {
                header("Location: /user/dashboard");
                $this->view->render('systemuser/dashboard');
                exit;
            }
        }
        else{
            $this->view->render('systemuser/login');
        }
    }

    function dashboard()
    {
        
        //redirect to login if not logged in or login button in not clicked
        if (!isset($_POST['login']) && !isset($_SESSION['login'])) {
            header("Location: /systemuser/login");
        }
        
        //if already logged in redirect according to user types
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "systemuser") {
                $this->view->render('systemuser/dashboard');
                exit;
            } else if ($_SESSION['type'] == "admin") {
                $this->view->render('layout/navigation');
                exit;
            } else if ($_SESSION['type'] == "donor") {
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

        $user_pic = $this->model->getuserimg($uname);
        $_SESSION['user_pic'] = $user_pic;


        
        if ($this->model->authenticate($uname, $pwd)) {

            //set session variables
            $_SESSION['login'] = "loggedin";
            $_SESSION['username'] = $this->model->getUserName($uname);
            $_SESSION['bloodbankname'] = $this->model->getBloodBankName($uname);
            $this->view->render('systemuser/layout/header');

            
        }
         else {
            $_SESSION['error'] = 'Incorrect Username or Password';
            header("Location: /systemuser/login");
        }
    }

    function logout()
    {
        //destroy session variables
        session_unset();
        session_destroy();
        session_regenerate_id(true);
        header("Location: /systemuser/login");
    }
}