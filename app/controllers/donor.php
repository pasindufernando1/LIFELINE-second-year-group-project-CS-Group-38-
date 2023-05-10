<?php
session_start();

class Donor extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    

    function login()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Donor") {
                header("Location: /donoruser/dashboard");
                $this->view->render('donor/dashboard');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
        
    }

}


