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

    // Give generate report page
    function gen_report()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/gen_report');
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

    function usageVSexpiry()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/usageVSexpiry');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function productiveDonationAreas()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/productiveDonationAreas');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function usageVsmonths()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if (!isset($_POST['year'])) {
                    header("Location: /reports/donationsVsmonths");
                    exit;
                }
                $this->view->render('admin/usageVsmonths');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function UsageVsExpiryreport()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if (!isset($_POST['province'])) {
                    header("Location: /reports/usageVSexpiry");
                    exit;
                }
                $this->view->render('admin/UsageVsExpiryreport');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function productiveDonationAreasReport()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if (!isset($_POST['category'])) {
                    header("Location: /reports/productiveDonationAreas");
                    exit;
                }
                $this->view->render('admin/productiveDonationAreasReport');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function bloodAvailReport()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/bloodAvailabilityReport');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function bloodAvailReport_Gen()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if (!isset($_POST['gen_report'])) {
                    header("Location: /reports/bloodAvailReport");
                    exit;
                }
                $_SESSION['blood_avail'] = $this->model->getAllBloodAvailReports();
                $this->view->render('admin/bloodAvailReport_Gen');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function inventoryReport()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/inventoryReport');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function inventoryReport_Gen()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if (!isset($_POST['gen_report'])) {
                    header("Location: /reports/inventoryReport");
                    exit;
                }
                $_SESSION['inventory_avail'] = $this->model->getAllInvAvailReports();
                $this->view->render('admin/inventoryReport_Gen');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function donorReport()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/donorReport');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function donorReport_Gen()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if (!isset($_POST['gen_report'])) {
                    header("Location: /reports/donorReport");
                    exit;
                }
                $this->view->render('admin/donorReport_Gen');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function campaignReport()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/campaignReport');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin'); 
        }
    }

    function campaignReport_Gen()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if (!isset($_POST['gen_report'])) {
                    header("Location: /reports/campaignReport");
                    exit;
                }
                $_SESSION['campaign_avail'] = $this->model->getAllCampaignDetails();
                $this->view->render('admin/campaignReport_Gen');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }



    
    



    
}

