<?php
session_start();

class Adadvertisements extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/advertisements');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    //Get the advertisements
    function type()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['advertisements'] = $this->model->getAllAdvertisementsDetails();
                // print_r($_SESSION['inventory']);die();
                $this->view->render('admin/advertisements');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }    
    }

    
    



    
}

