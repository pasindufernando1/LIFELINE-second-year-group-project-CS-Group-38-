<?php
session_start();

class Inventory extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/inventory');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    //Get the inventory types
    function type()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['inventory'] = $this->model->getAllInventoryDetails();
                // print_r($_SESSION['inventory']);die();
                $this->view->render('admin/inventory');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }    
    }

    //Get the inventory donations
    function donations()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['inventory_donations'] = $this->model->getAllInventoryDonations();
                //print_r($_SESSION['inventory']);die();
                $this->view->render('admin/inventory_donations');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }    
    }

    //Verify acceptance
    function verify_acceptance($DonationID)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if($this->model->verifyAcceptance($DonationID) && $this->model->sendThankEmail($DonationID)){
                    $this->view->render('admin/verify_Invacceptance');
                    exit;
                }
                
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }    
    }

    // Block pending verifications
    function verifyblock()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/verifyblock');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }    
    }
    



    
}

