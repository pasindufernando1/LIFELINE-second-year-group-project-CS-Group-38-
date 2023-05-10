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
            $this->view->render('authentication/login');
        }
    }

    //Get the campaign details
    function type()
    {
        if (isset($_SESSION['login'])) {
            //print_r($_POST);die();
            // Get the bloodbank names needed for the filter
            $_SESSION['bloodbank_names'] = $this->model->getAllBloodBankName();
            //To check whether a filter is applied
            if(isset($_GET['filter'])){
                $is_filtered = $_GET['filter'];
            }
            if ($_SESSION['type'] == "Admin") {
                if(!isset($_POST['filter']) && !$is_filtered){
                    $_SESSION['is_filtered'] = false;
                    $_SESSION['campaigns'] = $this->model->getAllCampaignDetails();
                    $this->view->render('admin/campaigns');
                    exit;
                }
                if(isset($_POST['filter'])){
                    if(isset($_POST['all_type'])){
                        $_SESSION['is_filtered'] = true;
                        $_SESSION['campaigns'] = $this->model->getAllCampaignDetails();
                        $this->view->render('admin/campaigns');
                        exit;
                    }
                    $output = array();
                    $_SESSION['is_filtered'] = true;
                    // If a blood bank,and date is selected
                    if(isset($_POST['blood_bank']) && isset($_POST['date'])){
                        $rows = $this->model->getFilteredCampaignsDate_and_Bank($_POST['blood_bank'],$_POST['date']);
                        $output = array_merge($output,$rows);
                    }
                    // If only a blood bank is selected
                    if(isset($_POST['blood_bank']) && empty($_POST['date'])){
                        $rows = $this->model->getFilteredCampaignsBank($_POST['blood_bank']);
                        $output = array_merge($output,$rows);
                    }
                    // If only a date is selected
                    if(empty($_POST['blood_bank']) && isset($_POST['date'])){
                        $rows = $this->model->getFilteredCampaignsDate($_POST['date']);
                        $output = array_merge($output,$rows);
                    }
                    $_SESSION['campaigns'] = $output;
                        
                }
                $this->view->render('admin/campaigns');
                exit;

            }
        }
        else{
            $this->view->render('authentication/login');
            
        }    
    }

    // Archive advertisement
    function archive_add($id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if($this->model->archive($id))
                {
                    $this->view->render('admin/campaign_archive_successful');
                    exit;
                }
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    
    



    
}

