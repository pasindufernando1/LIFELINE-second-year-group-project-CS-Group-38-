<?php
session_start();

class Donors extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/donors');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    //Get the  donors
    function type()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['donors'] = $this->model->getAllDonorDetails();
                // print_r($_SESSION['inventory']);die();
                $this->view->render('admin/donors');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }    
    }

    function addDonoruser()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/addnewDonor');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    
    



    
}

