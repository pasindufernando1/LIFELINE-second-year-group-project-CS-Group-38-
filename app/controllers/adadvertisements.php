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
            $this->view->render('authentication/login');
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
            $this->view->render('authentication/login');
            
        }    
    }

    // Give add advertisement page
    function add_advertisement()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/ad_type_selection');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }
    }

    function cash_donation()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/add_cash_donation');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }
    }

    function add_cashad_done()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                // $this->model->addCashAd();
                $this->view->render('admin/add_cash_donation_done');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }
    }

    function inv_donation(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/add_inv_donation');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }
    }

    function add_invad_done()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                // $this->model->addInvAd();
                $this->view->render('admin/add_cash_donation_done');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }
    }

    
    



    
}

