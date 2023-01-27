<?php
session_start();

class Adprofile extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/profile');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    
    



    
}

