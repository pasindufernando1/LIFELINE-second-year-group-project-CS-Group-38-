<?php

use FontLib\Table\Type\post;

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
            //To check whether a filter is applied
            if(isset($_GET['filter'])){
                $is_filtered = $_GET['filter'];
            }else{
                $is_filtered = false;
            }
            if ($_SESSION['type'] == "Admin") { 
                if(!isset($_POST['filter']) && !$is_filtered){
                    $_SESSION['is_filtered'] = false;
                    $_SESSION['reports'] = $this->model->getAllReportDetails();
                    $this->view->render('admin/reports');
                    exit;
                }
                if(isset($_POST['filter'])){
                    if(isset($_POST['all_type'])){
                        $_SESSION['is_filtered'] = true;
                        $_SESSION['reports'] = $this->model->getAllReportDetails();
                        $this->view->render('admin/reports');
                        exit;
                    }
                    $output = array();
                    $_SESSION['is_filtered'] = true;
                    // If the requestor is selected
                    if(isset($_POST['requestor'])){
                        // If all the month and year is selected
                        if(isset($_POST['month']) && isset($_POST['year'])){
                            $rows = $this->model->getFilteredReportDetailsDate_requestor($_POST['month'],$_POST['year'],$_POST['requestor']);
                            $output = array_merge($output,$rows);
                        }
                        // If only a month is selected
                        elseif(!empty($_POST['month']) && empty($_POST['year'])){
                            $rows = $this->model->getFilteredReportDetailsMonth_requestor($_POST['month'],$_POST['requestor']);
                            $output = array_merge($output,$rows);
                        }
                        // If only a year is selected
                        elseif(!empty($_POST['year']) && empty($_POST['month'])){
                            $rows = $this->model->getFilteredReportDetailsYear_requestor($_POST['year'],$_POST['requestor']);
                            $output = array_merge($output,$rows);
                        }
                        else{
                            $rows = $this->model->getFilteredReportDetails_requestor($_POST['requestor']);
                            $output = array_merge($output,$rows);
                        }
                        $_SESSION['reports'] = $output;
                    }
                    if(!isset($_POST['requestor'])){
                        
                        // If all the month and year is selected
                        if(isset($_POST['month']) && isset($_POST['year'])){
                            $rows = $this->model->getFilteredReportDetailsDate($_POST['month'],$_POST['year']);
                            $output = array_merge($output,$rows);
                        }
                        // If only a month is selected
                        if(isset($_POST['month']) && empty($_POST['year'])){
                            $rows = $this->model->getFilteredReportDetailsMonth($_POST['month']);
                            $output = array_merge($output,$rows);
                        }
                        // If only a year is selected
                        if(isset($_POST['year']) && empty($_POST['month'])){
                            $rows = $this->model->getFilteredReportDetailsYear($_POST['year']);
                            $output = array_merge($output,$rows);
                        }
                        $_SESSION['reports'] = $output;
                    }
                    
                }
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
                $_SESSION['requests'] = $this->model->getRequestStats($_SESSION['year']);
                $_SESSION['report_name'] = "Usage-Months-Report".date("Y-m-d-H-i-s");
                $this->view->render('admin/usageVsmonths_report');
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

    function UsageVsExpiryreport()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if (!isset($_POST['province'])) {
                    header("Location: /reports/usageVSexpiry");
                    exit;
                }
                $_SESSION['report_id'] = $this->model->getReportId();
                $_SESSION['province'] = $_POST['province'];
                $_SESSION['province_data'] = $this->model->getProvinceData($_POST['province']);
                $_SESSION['usageVSexpiry'] = $this->model->getAllusageVSexpiry($_POST['province']);
                $_SESSION['report_name'] = "Usage-Expiry-Report".date("Y-m-d-H-i-s");
                $this->view->render('admin/UsageVsExpiryreport');
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
                 
                $_SESSION['donors'] = $this->model->getDonors($_SESSION['category']);
                $_SESSION['report_name'] = "Productive-Donation-Areas-Report".date("Y-m-d-H-i-s");
                
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
                // Report name should be 'Blood-Availability-Report' with current timestamp
                $_SESSION['report_name'] = "Blood-Availability-Report-".date("Y-m-d-H-i-s");
                $this->view->render('admin/bloodAvailReport_Gen');
                exit;             
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function updatedatabase_done()
    {
        
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                
                $this->view->render('admin/database_senddone');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    //Function to save the blood availability report
    function saveBloodAvailreport() {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                // Check if a file was uploaded
                if (!empty($_FILES['pdf']['tmp_name']) && is_uploaded_file($_FILES['pdf']['tmp_name'])) {
                    // Define the destination directory where the PDF file will be saved
                    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/";
    
                    // Generate a unique file name for the PDF file in format Blood-Availability-Report-YYYY-MM-DD-HH-MM-SS.pdf
                    $fileName = $_SESSION['report_name'] . ".pdf";
                    
    
                    // Construct the full file path
                    $filePath = $uploadDirectory . $fileName;
    
                    // Move the uploaded file to the desired location
                    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $filePath)) {
                        $_SESSION['userid'] = $this->model->getUserId($_SESSION['useremail']);
                        // Send the file name to the database
                        if($this->model->saveBloodAvailreport($fileName,$_SESSION['userid'])){
                            // header("Location: /reports/updatedatabase_done");
                            // exit;
                            return true;
                        }
                       
                        
                    } else {
                        // Failed to move the uploaded file
                        echo "Failed to move the uploaded file.";
                    }
                } else {
                    // No file was uploaded
                    echo "No file was uploaded.";
                }
            }
        }else{
            $this->view->render('authentication/adminlogin');
        }
    }
    
    //Function to save the inventory availability report
    function saveInventoryAvailreport() {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                // Check if a file was uploaded
                if (!empty($_FILES['pdf']['tmp_name']) && is_uploaded_file($_FILES['pdf']['tmp_name'])) {
                    // Define the destination directory where the PDF file will be saved
                    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/";
    
                    // Generate a unique file name for the PDF file in format Blood-Availability-Report-YYYY-MM-DD-HH-MM-SS.pdf
                    $fileName = $_SESSION['report_name'] . ".pdf";
                    
    
                    // Construct the full file path
                    $filePath = $uploadDirectory . $fileName;
    
                    // Move the uploaded file to the desired location
                    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $filePath)) {
                        $_SESSION['userid'] = $this->model->getUserId($_SESSION['useremail']);
                        // Send the file name to the database
                        if($this->model->saveInventoryAvailreport($fileName,$_SESSION['userid'])){
                            return true;
                        }
                       
                        
                    } else {
                        // Failed to move the uploaded file
                        echo "Failed to move the uploaded file.";
                    }
                } else {
                    // No file was uploaded
                    echo "No file was uploaded.";
                }
            }
        }else{
            $this->view->render('authentication/adminlogin');
        }
    }

    //Function to save the donor reports
    public function saveDonorreport(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                // Check if a file was uploaded
                if (!empty($_FILES['pdf']['tmp_name']) && is_uploaded_file($_FILES['pdf']['tmp_name'])) {
                    // Define the destination directory where the PDF file will be saved
                    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/";
    
                    // Generate a unique file name for the PDF file in format Blood-Availability-Report-YYYY-MM-DD-HH-MM-SS.pdf
                    $fileName = $_SESSION['report_name'] . ".pdf";
                    
    
                    // Construct the full file path
                    $filePath = $uploadDirectory . $fileName;
    
                    // Move the uploaded file to the desired location
                    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $filePath)) {
                        $_SESSION['userid'] = $this->model->getUserId($_SESSION['useremail']);
                        // Send the file name to the database
                        if($this->model->saveDonorreport($fileName,$_SESSION['userid'])){
                            return true;
                        }
                       
                        
                    } else {
                        // Failed to move the uploaded file
                        echo "Failed to move the uploaded file.";
                    }
                } else {
                    // No file was uploaded
                    echo "No file was uploaded.";
                }
            }
        }else{
            $this->view->render('authentication/adminlogin');
        }
    }

    //Function to save campaign report
    public function saveCampaignreport(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                // Check if a file was uploaded
                if (!empty($_FILES['pdf']['tmp_name']) && is_uploaded_file($_FILES['pdf']['tmp_name'])) {
                    // Define the destination directory where the PDF file will be saved
                    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/";
    
                    // Generate a unique file name for the PDF file in format Blood-Availability-Report-YYYY-MM-DD-HH-MM-SS.pdf
                    $fileName = $_SESSION['report_name'] . ".pdf";
                    
    
                    // Construct the full file path
                    $filePath = $uploadDirectory . $fileName;
    
                    // Move the uploaded file to the desired location
                    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $filePath)) {
                        $_SESSION['userid'] = $this->model->getUserId($_SESSION['useremail']);
                        // Send the file name to the database
                        if($this->model->saveCampaignreport($fileName,$_SESSION['userid'])){
                            return true;
                        }
                       
                        
                    } else {
                        // Failed to move the uploaded file
                        echo "Failed to move the uploaded file.";
                    }
                } else {
                    // No file was uploaded
                    echo "No file was uploaded.";
                }
            }
        }else{
            $this->view->render('authentication/adminlogin');
        }
    }

    //Function to save productive donation areas report
    public function saveProductiveDonationreport(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                // Check if a file was uploaded
                if (!empty($_FILES['pdf']['tmp_name']) && is_uploaded_file($_FILES['pdf']['tmp_name'])) {
                    // Define the destination directory where the PDF file will be saved
                    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/";
    
                    // Generate a unique file name for the PDF file in format Blood-Availability-Report-YYYY-MM-DD-HH-MM-SS.pdf
                    $fileName = $_SESSION['report_name'] . ".pdf";
                    
    
                    // Construct the full file path
                    $filePath = $uploadDirectory . $fileName;
    
                    // Move the uploaded file to the desired location
                    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $filePath)) {
                        $_SESSION['userid'] = $this->model->getUserId($_SESSION['useremail']);
                        // Send the file name to the database
                        if($this->model->saveProductiveDonationreport($fileName,$_SESSION['userid'])){
                            return true;
                        }
                       
                        
                    } else {
                        // Failed to move the uploaded file
                        echo "Failed to move the uploaded file.";
                    }
                } else {
                    // No file was uploaded
                    echo "No file was uploaded.";
                }
            }
        }else{
            $this->view->render('authentication/adminlogin');
        }
    }

    // Function to save the usage vs expiry report
    public function saveUsagevsExpiryreport()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                // Check if a file was uploaded
                if (!empty($_FILES['pdf']['tmp_name']) && is_uploaded_file($_FILES['pdf']['tmp_name'])) {
                    // Define the destination directory where the PDF file will be saved
                    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/";
    
                    // Generate a unique file name for the PDF file in format Blood-Availability-Report-YYYY-MM-DD-HH-MM-SS.pdf
                    $fileName = $_SESSION['report_name'] . ".pdf";
                    
    
                    // Construct the full file path
                    $filePath = $uploadDirectory . $fileName;
    
                    // Move the uploaded file to the desired location
                    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $filePath)) {
                        $_SESSION['userid'] = $this->model->getUserId($_SESSION['useremail']);
                        // Send the file name to the database
                        if($this->model->saveUsagevsExpiryreport($fileName,$_SESSION['userid'])){
                            return true;
                        }
                       
                        
                    } else {
                        // Failed to move the uploaded file
                        echo "Failed to move the uploaded file.";
                    }
                } else {
                    // No file was uploaded
                    echo "No file was uploaded.";
                }
            }
        }else{
            $this->view->render('authentication/adminlogin');
        }
    }

    // Function to save the usage vs month report
    public function saveUsagevsMonthsreport()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                // Check if a file was uploaded
                if (!empty($_FILES['pdf']['tmp_name']) && is_uploaded_file($_FILES['pdf']['tmp_name'])) {
                    // Define the destination directory where the PDF file will be saved
                    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/";
    
                    // Generate a unique file name for the PDF file in format Blood-Availability-Report-YYYY-MM-DD-HH-MM-SS.pdf
                    $fileName = $_SESSION['report_name'] . ".pdf";
                    
    
                    // Construct the full file path
                    $filePath = $uploadDirectory . $fileName;
    
                    // Move the uploaded file to the desired location
                    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $filePath)) {
                        $_SESSION['userid'] = $this->model->getUserId($_SESSION['useremail']);
                        // Send the file name to the database
                        if($this->model->saveUsagevsMonthsreport($fileName,$_SESSION['userid'])){
                            return true;
                        }
                       
                        
                    } else {
                        // Failed to move the uploaded file
                        echo "Failed to move the uploaded file.";
                    }
                } else {
                    // No file was uploaded
                    echo "No file was uploaded.";
                }
            }
        }else{
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
                $_SESSION['report_name'] = "Inventory-Availability-Report-".date("Y-m-d-H-i-s");
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
                $_SESSION['report_name'] = "Donor-Report-".date("Y-m-d-H-i-s");
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
                $_SESSION['report_id'] = $this->model->getReportId();
                $_SESSION['report_name'] = "Campaign-Report-".date("Y-m-d-H-i-s");
                $this->view->render('admin/campaignReport_Gen');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }

    function download_copy($reportID)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $filename = $this->model->getReportLink($reportID);
                $file = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/" . $filename;
                if (file_exists($file)) {
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename=' . basename($file));
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    readfile($file);
                    exit;
                }
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
    }



    
    



    
}

