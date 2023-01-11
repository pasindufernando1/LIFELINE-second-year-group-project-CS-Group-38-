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


        
        if ($this->model->authenticate($uname, $pwd)) {

            //set session variables
            
            $_SESSION['login'] = "loggedin";
            $_SESSION['username'] = $this->model->getUserName($uname);
            $_SESSION['bloodbankname'] = $this->model->getBloodBankName($uname);
            $this->view->render('systemuser/dashboard');

            
        }
         else {
            $_SESSION['error'] = 'Incorrect Username or Password';
            header("Location: /login");
        }
    }

    function logout()
    {
        //destroy session variables
        session_unset();
        session_destroy();
        session_regenerate_id(true);
        header("Location: /");
    }
}