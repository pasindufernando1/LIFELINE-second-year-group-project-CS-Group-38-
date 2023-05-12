<?php
session_start();

class Sys_reports extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $useridobj = $this ->model -> getUserid($_SESSION['useremail']);
                $userid = $useridobj[0]['UserID'];
                $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']);
                $_SESSION['reports'] = $this ->model-> getAllReportDetails($userid);
                $_SESSION['inv_types'] = $this ->model-> getAllInvTypes();
                $_SESSION['don_org'] = $this ->model-> getAllorg($blood_bank_id);
                $_SESSION['camp_org'] = $this ->model-> getCamporg($blood_bank_id);

                if(isset($_GET['filtered'])){
                    $_SESSION['reports'] =$_SESSION['filtered_rep'] ;
                }
               
                if(isset($_POST['filter'])){
                    $start = $_POST['start'];
                    $end = $_POST['end'];
                    $output = array();
                    $rows = $this->model->getfilterrep($userid,$start,$end);
                    $output = array_merge($output,$rows);       
                    
                
                    $_SESSION['reports'] = $output;
                

                }
                
                if(isset($_POST['r1'])){
                    $start = $_POST['start'];
                    $end = $_POST['end'];
                    $output = array();
                    for ($i=0; $i < 8 ; $i++) { 
                        if(isset($_POST[$i])){
                            if(!isset($_POST[10]) && !isset($_POST[11]) && !isset($_POST[12]) && !isset($_POST[13])){
                                $rows = $this->model->getfiltertype($_POST[$i],$blood_bank_id,$start,$end);
                                $output = array_merge($output,$rows);
                            }
                            else{
                                if(isset($_POST[10])){
                                    $rows = $this->model->getfiltertypes($_POST[$i],$blood_bank_id,$_POST[10],$start,$end);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[11])){
                                    $rows = $this->model->getfiltertypes($_POST[$i],$blood_bank_id,$_POST[11],$start,$end);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[12])){
                                    $rows = $this->model->getfiltertypes($_POST[$i],$blood_bank_id,$_POST[12],$start,$end);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[13])){
                                    $rows = $this->model->getfiltertypes($_POST[$i],$blood_bank_id,$_POST[13],$start,$end);
                                    $output = array_merge($output,$rows);
                                }
                            }
                            
                        }
                    }
                
                    $_SESSION['output'] = $output;
                

                }

                if(isset($_POST['r2'])){
                    $start = $_POST['start'];
                    $end = $_POST['end'];
                    $output = array();
                    for ($i=0; $i < 8 ; $i++) { 
                        if(isset($_POST[$i])){
                            if(!isset($_POST[10]) && !isset($_POST[11]) && !isset($_POST[12]) && !isset($_POST[13])){
                                $rows = $this->model->getfilterexps($_POST[$i],$blood_bank_id,$start,$end);
                                $output = array_merge($output,$rows);
                            }
                            else{
                                if(isset($_POST[10])){
                                    $rows = $this->model->getfilterexp($_POST[$i],$blood_bank_id,$_POST[10],$start,$end);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[11])){
                                    $rows = $this->model->getfilterexp($_POST[$i],$blood_bank_id,$_POST[11],$start,$end);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[12])){
                                    $rows = $this->model->getfilterexp($_POST[$i],$blood_bank_id,$_POST[12],$start,$end);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[13])){
                                    $rows = $this->model->getfilterexp($_POST[$i],$blood_bank_id,$_POST[13],$start,$end);
                                    $output = array_merge($output,$rows);
                                }
                            }
                            
                        }
                    }
                
                    $_SESSION['output'] = $output;
                

                }

                if(isset($_POST['r3'])){
                   
            
                    $output = array();
                    foreach ($_POST['inv-type'] as $row) {
                        $rows = $this->model->getInv($row,$blood_bank_id);
                        $output = array_merge($output,$rows);
                    }
        
                    $_SESSION['output'] = $output;
                

                }


                if(isset($_POST['r4'])){
                   
            
                    $output = array();
                    foreach ($_POST['inv-type'] as $row) {
                        $rows = $this->model->getInvdon($row,$blood_bank_id);
                        $output = array_merge($output,$rows);
                    }
        
                    $_SESSION['output'] = $output;
                   
                

                }

                if(isset($_POST['r5'])){
        
                        if(isset($_POST['r5'])){
                            if(isset($_POST['all_type'])){
                                $output = $this->model->getAllDonorDetails();
                                $_SESSION['output'] = $output;
                                $this->view->render('systemuser/reports/report');
                                exit;
                            }
                            $output = array();
                            if(!empty($_POST['nic'])){
                                $nic = $_POST['nic'];
                                $rows = $this->model->getFilteredDonorDetailsNIC($nic);
                                $output = array_merge($output, $rows);
                                $_SESSION['output'] = $output;
                                $this->view->render('systemuser/reports/report');
                                exit;
                            }

                            $flag_category = 0;
                            $district_flag = 0;
                            //If a district is selected
                            for($i=10;$i<35;$i++){
                                if(isset($_POST[$i])){
                                    $district_flag = 1;
                                    for($j=0;$j<8;$j++){
                                        $flag_category = 1;
                                        if(isset($_POST[$j])){
                                            $rows = $this->model->getFilteredDonorDetails_District_BloodCategory($_POST[$i], $_POST[$j]);
                                            $output = array_merge($output, $rows);
                                        }
                                    }
                                }
                                
                            }
                            $_SESSION['output'] = $output;
                            
                            //If a single blood category is not selected
                            if($flag_category==0){
                                for($i=10;$i<35;$i++){
                                    if(isset($_POST[$i])){
                                        $rows = $this->model->getFilteredDonorDetails_District($_POST[$i]);
                                        $output = array_merge($output, $rows);
                                    }
                                    
                                }
                                
                            }

                            //If no district is selected
                            if($district_flag==0){
                                for($i=0;$i<8;$i++){
                                    if(isset($_POST[$i])){
                                        $rows = $this->model->getFilteredDonorDetails_BloodCategory($_POST[$i]);
                                        $output = array_merge($output, $rows);
                                    }
                                }
                                
                            }
                            $_SESSION['output'] = $output;
                            $this->view->render('systemuser/reports/report');
                           
                            
                        
                        
                        
                    }
                }

                if(isset($_POST['r6'])){
                    $start = $_POST['start'];
                    $end = $_POST['end'];
                    $output = array();
                    for ($i=0; $i < 8 ; $i++) { 
                        if(isset($_POST[$i])){
                                $rows = $this->model->getfilterdon($_POST[$i],$blood_bank_id,$start,$end);
                                $output = array_merge($output,$rows);
                        }
                    }
                
                    $_SESSION['output'] = $output;
                

                }

                if(isset($_POST['r7'])){
                    // print_r($_POST);die();
                    $start = $_POST['start'];
                    $end = $_POST['end'];
                    $output = array();
                    foreach ($_POST['inv-type'] as $row) {
                        $rows = $this->model->getCampDet($row,$blood_bank_id,$start,$end);
                        $output = array_merge($output,$rows);
                    }
        
                    $_SESSION['output'] = $output;
                   
                

                }
        
                   
                   
                $this->view->render('systemuser/reports/report');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    

    function category()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/reports/reports_category');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function blood_availability()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/reports/reports_blood');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function blood_inventory()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/reports/reports_inventory');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function donors()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/reports/reports_donors');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function campaign()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/reports/reports_campaign');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function downloadr1()
    {
        
        $header_args = array('Date','Complication','Name','Subtype','Quantity','Status');
        $cur_date = date('Y-m-d');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=reservation_report '.$cur_date.'.csv');
        $output = fopen( 'php://output', 'w' );
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['output']);
        foreach ($_SESSION['output'] as $data) {
            $row = array($data['Date'],$data['Complication'],$data['Name'],$data['Subtype'],$data['Quantity'],$data['Status']);
            fputcsv($output, $row);
        }
        exit;
    }

    function downloadr2()
    {
        
        $header_args = array('Date','Complication','Name','Subtype','Quantity','Status');
        $cur_date = date('Y-m-d');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=expired_blood_report '.$cur_date.'.csv');
        $output = fopen( 'php://output', 'w' );
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['output']);
        foreach ($_SESSION['output'] as $data) {
            $row = array($data['Date'],$data['Complication'],$data['Name'],$data['Subtype'],$data['Quantity'],$data['Status']);
            fputcsv($output, $row);
        }
        exit;
    }

    function downloadr3()
    {
       
        $header_args = array('Inventory Name','Inventory Type','Quantity');
        $cur_date = date('Y-m-d');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=inventory_report '.$cur_date.'.csv');
        $output = fopen( 'php://output', 'w' );
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['output']);
        foreach ($_SESSION['output'] as $data) {
            $row = array($data['Name'],$data['Type'],$data['Quantity']);
            fputcsv($output, $row);
        }
        exit;
    }


    function downloadr4()
    {
        $header_args = array('Inventory Category','Quantity','Accepted_date','Admin_verify','Donated By');
        $cur_date = date('Y-m-d');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=inventory_report '.$cur_date.'.csv');
        $output = fopen( 'php://output', 'w' );
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['output']);
        foreach ($_SESSION['output'] as $data) {
            
            $row = array($data['Inventory_category'],$data['Quantity'],$data['Accepted_date'],$data['Admin_verify'],$data['Name']);
            fputcsv($output, $row);
        }
        exit;
    }

    function downloadr5()
    {
        $header_args = array('Donor Name','Donor NIC','Date of Birth','Gender','Blood Type','Address No','Lane Name', 'City','District','Province');
        $cur_date = date('Y-m-d');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=donor_report '.$cur_date.'.csv');
        $output = fopen( 'php://output', 'w' );
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['output']);
        foreach ($_SESSION['output'] as $data) {
            $row = array($data['Fullname'],$data['NIC'],$data['DOB'],$data['Gender'],$data['BloodType'],$data['Number'],$data['LaneName'],$data['City'],$data['District'],$data['Province']);
            fputcsv($output, $row);
        }
        exit;
    }

    function downloadr6()
    {
    
        $header_args = array('Donor Name','Donor NIC','blood Group','Date of Donation','Complication');
        $cur_date = date('Y-m-d');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=donation_report '.$cur_date.'.csv');
        $output = fopen( 'php://output', 'w' );
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['output']);
        foreach ($_SESSION['output'] as $data) {
            $row = array($data['Fullname'],$data['NIC'],$data['BloodType'],$data['Date'],$data['Complication']);
            fputcsv($output, $row);
        }
        exit;
    }

    function downloadr7()
    {
        // print_r($_SESSION['output'][0]);die();
        $header_args = array('Campaign Name','Organized By','Location','Bed Quantity','Date','Starting Time','Ending Time','Number of Donors');
        $cur_date = date('Y-m-d');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=campaign_report '.$cur_date.'.csv');
        $output = fopen( 'php://output', 'w' );
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['output']);
        foreach ($_SESSION['output'] as $data) {
            $row = array($data[1],$data['Name'],$data['Location'],$data['BedQuantity'],$data['Date'],$data['Starting_time'],$data['Ending_time'],$data['Number_of_donors']);
            fputcsv($output, $row);
        }
        exit;
    }

    function saver1()
    {
         $useridobj = $this ->model -> getUserid($_SESSION['useremail']);
         $userid = $useridobj[0]['UserID'];
         
        $header_args = array('Date','Complication','Name','Subtype','Quantity','Status');
        $cur_date = date('Y-m-d');
        $csv_filename = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/reservation_report_".date("Y-m-d_H-i",time()).".csv";
        $output = fopen ($csv_filename, "w");
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['output']);
        foreach ($_SESSION['output'] as $data) {
            $row = array($data['Date'],$data['Complication'],$data['Name'],$data['Subtype'],$data['Quantity'],$data['Status']);
            fputcsv($output, $row);
        }
        fclose($output);

        $name = 'Reservation Report '.date("Y-m-d_H-i",time()) ;
        $date = date("Y-m-d");
        $entity = 'System User';
        $res= $this->model->addReport($name,$date,$entity,$csv_filename,$userid);
        if($res){
             header("Location: /sys_reports?page=1");
        }
        exit;
    }

    function saver2()
    {
         $useridobj = $this ->model -> getUserid($_SESSION['useremail']);
         $userid = $useridobj[0]['UserID'];
        $header_args = array('Date','Complication','Name','Subtype','Quantity','Status');
        $cur_date = date('Y-m-d');
        $csv_filename = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/expired_blood_report_".date("Y-m-d_H-i",time()).".csv";
        $output = fopen ($csv_filename, "w");
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['output']);
        foreach ($_SESSION['output'] as $data) {
            $row = array($data['Date'],$data['Complication'],$data['Name'],$data['Subtype'],$data['Quantity'],$data['Status']);
            fputcsv($output, $row);
        }
        fclose($output);

        $name = 'Expired Blood Report '.date("Y-m-d_H-i",time()) ;
        $date = date("Y-m-d");
        $entity = 'System User';
        $res= $this->model->addReport($name,$date,$entity,$csv_filename,$userid);
        if($res){
             header("Location: /sys_reports?page=1");
        }
        exit;
    }

    function saver3()
    {
        $useridobj = $this ->model -> getUserid($_SESSION['useremail']);
        $userid = $useridobj[0]['UserID'];

        $header_args = array('Inventory Name','Inventory Type','Quantity');
        $cur_date = date('Y-m-d');
        $csv_filename = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/inventory_report_".date("Y-m-d_H-i",time()).".csv";
        $output = fopen ($csv_filename, "w");
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['output']);
        foreach ($_SESSION['output'] as $data) {
            $row = array($data['Name'],$data['Type'],$data['Quantity']);
            fputcsv($output, $row);
        }
        fclose($output);

        $name = 'Inventory Report '.date("Y-m-d_H-i",time()) ;
        $date = date("Y-m-d");
        $entity = 'System User';
        $res= $this->model->addReport($name,$date,$entity,$csv_filename,$userid);
        if($res){
             header("Location: /sys_reports?page=1");
        }
        exit;
    }

    function saver4()
    {
        $useridobj = $this ->model -> getUserid($_SESSION['useremail']);
        $userid = $useridobj[0]['UserID'];

        $header_args = array('Inventory Category','Quantity','Accepted_date','Admin_verify','Donated By');
        $cur_date = date('Y-m-d');
        $csv_filename = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/inventory_donation_report_".date("Y-m-d_H-i",time()).".csv";
        $output = fopen ($csv_filename, "w");
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['output']);
        foreach ($_SESSION['output'] as $data) {
            $row = array($data['Inventory_category'],$data['Quantity'],$data['Accepted_date'],$data['Admin_verify'],$data['Name']);
            fputcsv($output, $row);
        }
        fclose($output);

        $name = 'Inventory Donation Report '.date("Y-m-d_H-i",time()) ;
        $date = date("Y-m-d");
        $entity = 'System User';
        $res= $this->model->addReport($name,$date,$entity,$csv_filename,$userid);
        if($res){
             header("Location: /sys_reports?page=1");
        }
        exit;
    }

    function saver5()
    {
        $useridobj = $this ->model -> getUserid($_SESSION['useremail']);
        $userid = $useridobj[0]['UserID'];

        $header_args = array('Donor Name','Donor NIC','Date of Birth','Gender','Blood Type','Address No','Lane Name', 'City','District','Province');
        $cur_date = date('Y-m-d');
        $csv_filename = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/Donor_Report".date("Y-m-d_H-i",time()).".csv";
        $output = fopen ($csv_filename, "w");
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['output']);
        foreach ($_SESSION['output'] as $data) {
            $row = array($data['Fullname'],$data['NIC'],$data['DOB'],$data['Gender'],$data['BloodType'],$data['Number'],$data['LaneName'],$data['City'],$data['District'],$data['Province']);
            fputcsv($output, $row);
        }
        fclose($output);

        $name = 'Donor Report '.date("Y-m-d_H-i",time()) ;
        $date = date("Y-m-d");
        $entity = 'System User';
        $res= $this->model->addReport($name,$date,$entity,$csv_filename,$userid);
        if($res){
             header("Location: /sys_reports?page=1");
        }
        exit;
    }

    function saver6()
    {
        $useridobj = $this ->model -> getUserid($_SESSION['useremail']);
        $userid = $useridobj[0]['UserID'];

        $header_args = array('Donor Name','Donor NIC','blood Group','Date of Donation','Complication');
        $cur_date = date('Y-m-d');
        $csv_filename = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/Donation_Report".date("Y-m-d_H-i",time()).".csv";
        $output = fopen ($csv_filename, "w");
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['output']);
        foreach ($_SESSION['output'] as $data) {
            $row = array($data['Fullname'],$data['NIC'],$data['BloodType'],$data['Date'],$data['Complication']);
             fputcsv($output, $row);
        }
        fclose($output);

        $name = 'Donotion Report '.date("Y-m-d_H-i",time()) ;
        $date = date("Y-m-d");
        $entity = 'System User';
        $res= $this->model->addReport($name,$date,$entity,$csv_filename,$userid);
        if($res){
             header("Location: /sys_reports?page=1");
        }
        exit;
    }

    function saver7()
    {
        $useridobj = $this ->model -> getUserid($_SESSION['useremail']);
        $userid = $useridobj[0]['UserID'];

        $header_args = array('Campaign Name','Organized By','Location','Bed Quantity','Date','Starting Time','Ending Time','Number of Donors');
        $cur_date = date('Y-m-d');
        $csv_filename = $_SERVER['DOCUMENT_ROOT'] . "/public/reports/Campaigns_Report".date("Y-m-d_H-i",time()).".csv";
        $output = fopen ($csv_filename, "w");
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['output']);
        foreach ($_SESSION['output'] as $data) {
            $row = array($data[1],$data['Name'],$data['Location'],$data['BedQuantity'],$data['Date'],$data['Starting_time'],$data['Ending_time'],$data['Number_of_donors']);
             fputcsv($output, $row);
        }
        fclose($output);

        $name = 'Campaign Report '.date("Y-m-d_H-i",time()) ;
        $date = date("Y-m-d");
        $entity = 'System User';
        $res= $this->model->addReport($name,$date,$entity,$csv_filename,$userid);
        if($res){
             header("Location: /sys_reports?page=1");
        }
        exit;
    }

    function downloadexist()
    {
        $file = $_GET['link'];

        if (file_exists($file)) {

            //set appropriate headers
            header('Content-Description: File Transfer');
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();

            //read the file from disk and output the content.
            readfile($file);
            exit;
        }
    }

    function delete($id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $res= $this->model->deleteReport($id);
                 if($res){
                    header("Location: /sys_reports?page=1");
                }
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }
}