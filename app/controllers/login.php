<?php
session_start();

class Login extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                header("Location: /systemuser/dashboard");
                $this->view->render('systemuser/dashboard');
                exit;
            } else if ($_SESSION['type'] == "Admin") {
                print_r($_SESSION['blood_donations']);die();
                header("Location: /user/dashboard?page=1");
                //$this->view->render('admin/dashboard');
                exit;
            } else if ($_SESSION['type'] == "Donor") {
                header("Location: /donoruser/dashboard");
                $this->view->render('donor/dashboard');
                exit;
            } else if ($_SESSION['type'] == "Hospital/Medical_Center") {
                header("Location: /hospitaluser/dashboard");
                $this->view->render('hospitals/dashboard');
                exit;
            
            } 
            
        }
        else{
            $this->view->render('authentication/login');
        }
    }
}