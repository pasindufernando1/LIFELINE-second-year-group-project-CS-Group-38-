<?php
session_start();

class Organization extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    

    function login()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Organization/Society") {
                header("Location: /organizationuser/dashboard");
                $this->view->render('organization/dashboard');
                exit;
            }
        }
        else{
            $this->view->render('authentication/organizationlogin');
        }
        
    }

    function signup(){
            // header("Location: /organizationuser/signuppage/");
            $this->view->render('signup/organizationsignup');        
    }
}
