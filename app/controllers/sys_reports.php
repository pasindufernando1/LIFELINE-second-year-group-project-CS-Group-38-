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
                $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']);
                $_SESSION['reports'] = $this ->model-> getAllReportDetails($blood_bank_id);
                $_SESSION['inv_types'] = $this ->model-> getAllInvTypes();
                $_SESSION['don_org'] = $this ->model-> getAllorg($blood_bank_id);
                
               

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
                                $rows = $this->model->getfilterexp($_POST[$i],$blood_bank_id,$start,$end);
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

    function saver1()
    {
         $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']);
        
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
        $res= $this->model->addReport($name,$date,$entity,$csv_filename,$blood_bank_id);
        if($res){
             header("Location: /sys_reports?page=1");
        }
        exit;
    }

    function saver2()
    {
         $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']);
        
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
        $res= $this->model->addReport($name,$date,$entity,$csv_filename,$blood_bank_id);
        if($res){
             header("Location: /sys_reports?page=1");
        }
        exit;
    }

    function saver3()
    {
         $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']);
        
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
        $res= $this->model->addReport($name,$date,$entity,$csv_filename,$blood_bank_id);
        if($res){
             header("Location: /sys_reports?page=1");
        }
        exit;
    }

    function saver4()
    {
         $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']);
        
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
        $res= $this->model->addReport($name,$date,$entity,$csv_filename,$blood_bank_id);
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