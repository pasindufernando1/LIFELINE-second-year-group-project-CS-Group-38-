<?php
session_start();

class Hospitals extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    

    function login()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospitals") {
                header("Location: /hospitaluser/dashboard");
                $this->view->render('hospitals/dashboard');
                exit;
            }
        }
        else{
            $this->view->render('authentication/hospitalslogin');
        }
        
    }
}
