<?php
session_start();

class Reports extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/reports');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    // Get the report details
    function type()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['reports'] = $this->model->getAllReportDetails();
                // print_r($_SESSION['reports']);die();
                $this->view->render('admin/reports');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    // Give generate analytics page
    function gen_analytics()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/gen_analytics');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function donationsVsmonths()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/donationsVsmonths');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    
    



    
}

