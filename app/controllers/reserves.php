<?php
session_start();

class Reserves extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/reserves');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    //Get the reserve types
    function type()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['reserves'] = $this->model->getAllReserveDetails();
                // print_r($_SESSION['inventory']);die();
                $this->view->render('admin/reserves');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }    
    }

    
    



    
}

