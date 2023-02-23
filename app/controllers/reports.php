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


    function usageVsmonths()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/usage_months');
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

    function usageVsmonths_Report()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if (!isset($_POST['year'])) {
                    header("Location: /reports/usageVsmonths");
                    exit;
                }
                $_SESSION['year'] = $_POST['year'];
                $_SESSION['report_id'] = $this->model->getReportId();
                $_SESSION['bloodusage'] = $this->model->getUsageBlood($_SESSION['year']);
                $this->view->render('admin/usageVsmonths_report');
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
                $_SESSION['usageVSexpiry'] = $this->model->getAllusageVSexpiry($_POST['province']);
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
                $_SESSION['category'] = $_POST['category'];
                $_SESSION['report_id'] = $this->model->getReportId();
                $_SESSION['donations'] = $this->model->getAllBloodDonations($_SESSION['category']);
                // $_SESSION['donors'] = $this->model->getAllDonors($_SESSION['category']);
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
                $_SESSION['province'] = $_POST['province'];
                $_SESSION['blood_group'] = $_POST['category'];
                $_SESSION['report_id'] = $this->model->getReportId();
                $_SESSION['blood_avail'] = $this->model->getAllBloodAvailReports($_SESSION['province'],$_SESSION['blood_group']);
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
                $_SESSION['province'] = $_POST['province'];
                $_SESSION['inv_category'] = $_POST['category'];
                $_SESSION['report_id'] = $this->model->getReportId();
                $_SESSION['inventory_avail'] = $this->model->getAllInvAvailReports($_SESSION['province'],$_SESSION['inv_category']);
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
                $_SESSION['Donors'] = $this->model->getAllDonors();
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
                $_SESSION['donorid']= $_POST['donorID'];
                $_SESSION['donordetails']= $this->model->getDonorDetails($_SESSION['donorid']);
                $_SESSION['report_id'] = $this->model->getReportId();
                $_SESSION['donations'] = $this->model->getAllDonations($_SESSION['donorid']);
                $_SESSION['badge'] = $this->model->getDonorBadge($_SESSION['donorid']);
                $_SESSION['donor-card'] = $this->model->getDonorCard($_SESSION['donorid']);
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
                $_SESSION['date'] = $_POST['date'];
                $_SESSION['province'] = $_POST['province'];
                $_SESSION['campaign_avail'] = $this->model->getAllCampaignDetails($_SESSION['date'],$_SESSION['province']);
                $this->view->render('admin/campaignReport_Gen');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }



    
    



    
}

