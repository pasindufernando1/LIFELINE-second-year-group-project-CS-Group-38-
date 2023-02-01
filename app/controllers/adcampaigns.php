<?php
session_start();

class Adcampaigns extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/campaigns');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    //Get the campaign details
    function type()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['campaigns'] = $this->model->getAllCampaignDetails();
                // print_r($_SESSION['inventory']);die();
                $this->view->render('admin/campaigns');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }    
    }

    
    



    
}

