<?php
session_start();

class Profile extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                
                $_SESSION['user_contact'] =$this -> model -> getUserContactNo($_SESSION['useremail']);
                $this->view->render('systemuser/profile');
                exit;
            } else if ($_SESSION['type'] == "Admin") {
                header("Location: /user/dashboard");
                $this->view->render('layout/navigation');
                exit;
            } else if ($_SESSION['type'] == "Donor") {
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
            $this->view->render('authentication/login');
        }
        
    }
}