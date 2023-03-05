<?php
session_start();

class Admin extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    

    function login()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                header("Location: /adminuser/dashboard");
                $this->view->render('admin/dashboard');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
        
    }
}
