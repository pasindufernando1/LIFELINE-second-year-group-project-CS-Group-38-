<?php
session_start();

class Adbadges extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/badges');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    //Get the badge types
    function type()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['badges'] = $this->model->getAllBadgeDetails();
                // print_r($_SESSION['inventory']);die();
                $this->view->render('admin/badges');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }    
    }

    // Give add badge page
    function add_badge()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/add_badge');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function add_badge_done()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                // $this->model->addBadge();
                $this->view->render('admin/add_badge_success');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    
    



    
}

