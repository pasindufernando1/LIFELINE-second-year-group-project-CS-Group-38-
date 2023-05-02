<?php
session_start();

class Reserves extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/reserves');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    //Get the reserve types
    function type()
    {
        if (isset($_SESSION['login'])) {
            //To check whether a filter is applied
            if(isset($_GET['filter'])){
                $is_filtered = $_GET['filter'];
            }else{
                $is_filtered = false;
            }
            //var_dump($_POST);exit;
            if ($_SESSION['type'] == "Admin") {
                if(!isset($_POST['filter']) && !$is_filtered){
                    $_SESSION['is_filtered'] = false;
                    $_SESSION['reserves'] = $this->model->getAllReserveDetails();
                    $this->view->render('admin/reserves');
                    exit;
                }
                if(isset($_POST['filter'])){
                    if(isset($_POST['all_type'])){
                        $_SESSION['is_filtered'] = true;
                        $_SESSION['reserves'] = $this->model->getAllReserveDetails();
                        $this->view->render('admin/reserves');
                        exit;
                    }
                    //echo("filter");exit;
                    $output = array();
                    $_SESSION['is_filtered'] = true;
                    for ($i=0; $i < 8 ; $i++) { 
                        if(isset($_POST[$i])){
                            if(!isset($_POST[10]) && !isset($_POST[11]) && !isset($_POST[12]) && !isset($_POST[13])){
                                $rows = $this->model->filter_out($_POST[$i]);
                                $output = array_merge($output,$rows);
                            }
                            else{
                                if(isset($_POST[10])){
                                    $rows = $this->model->filter_out_subtypes($_POST[$i],$_POST[10]);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[11])){
                                    $rows = $this->model->filter_out_subtypes($_POST[$i],$_POST[11]);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[12])){
                                    $rows = $this->model->filter_out_subtypes($_POST[$i],$_POST[12]);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[13])){
                                    $rows = $this->model->filter_out_subtypes($_POST[$i],$_POST[13]);
                                    $output = array_merge($output,$rows);
                                }
                            }
                            
                        }
                        
                    }
                    
                    $_SESSION['reserves'] = $output;
                    if(isset($_POST[14]) || isset($_POST[15]) || isset($_POST[16]) || isset($_POST[17]) || isset($_POST[18]) || isset($_POST[19]) || isset($_POST[20]) || isset($_POST[21]) || isset($_POST[22])){
                        // If $output is empty, set $output to $this->model->getAllReserveDetails()
                        if (empty($output)) {
                            $output = $this->model->getAllReserveDetails();
                        }
                        
                        // Cretae a new array to store the filtered data
                        $final_output = array();
                        // if $_POST[14] is set, add the rows in $output with province = $_POST[14] to $final_output
                        if(isset($_POST[14])){
                            // Add the entries in $output with province = $_POST[14] to $final_output
                            foreach ($output as $entry) {
                                if ($entry["BloodBank_Details"]["Province"] == $_POST[14]) {
                                    // If the value is "Western", add the corresponding nested array to the filtered array
                                    array_push($final_output, $entry);
                                }
                            }
                        }
                        // if $_POST[15] is set, add the rows in $output with province = $_POST[15] to $final_output
                        if(isset($_POST[15])){
                            // Add the entries in $output with province = $_POST[15] to $final_output
                            foreach ($output as $entry) {
                                if ($entry["BloodBank_Details"]["Province"] == $_POST[15]) {
                                    // If the value is "Central", add the corresponding nested array to the filtered array
                                    array_push($final_output, $entry);
                                }
                            }
                        }
                        //if $_POST[16] is set, add the rows in $output with province = $_POST[16] to $final_output
                        if(isset($_POST[16])){
                            // Add the entries in $output with province = $_POST[16] to $final_output
                            foreach ($output as $entry) {
                                if ($entry["BloodBank_Details"]["Province"] == $_POST[16]) {
                                    // If the value is "Southern", add the corresponding nested array to the filtered array
                                    array_push($final_output, $entry);
                                }
                            }
                        }
                        // if $_POST[17] is set, add the rows in $output with province = $_POST[17] to $final_output
                        if(isset($_POST[17])){
                            // Add the entries in $output with province = $_POST[17] to $final_output
                            foreach ($output as $entry) {
                                if ($entry["BloodBank_Details"]["Province"] == $_POST[17]) {
                                    // If the value is "Eastern", add the corresponding nested array to the filtered array
                                    array_push($final_output, $entry);
                                }
                            }
                        }   
                        // if $_POST[18] is set, add the rows in $output with province = $_POST[18] to $final_output
                        if(isset($_POST[18])){
                            // Add the entries in $output with province = $_POST[17] to $final_output
                            foreach ($output as $entry) {
                                if ($entry["BloodBank_Details"]["Province"] == $_POST[18]) {
                                    // If the value is "Eastern", add the corresponding nested array to the filtered array
                                    array_push($final_output, $entry);
                                }
                            }
                        } 
                        // if $_POST[19] is set, add the rows in $output with province = $_POST[19] to $final_output
                        if(isset($_POST[19])){
                            // Add the entries in $output with province = $_POST[19] to $final_output
                            foreach ($output as $entry) {
                                if ($entry["BloodBank_Details"]["Province"] == $_POST[19]) {
                                    // If the value is "Eastern", add the corresponding nested array to the filtered array
                                    array_push($final_output, $entry);
                                }
                            }
                        } 
                        // if $_POST[20] is set, add the rows in $output with province = $_POST[20] to $final_output
                        if(isset($_POST[20])){
                            // Add the entries in $output with province = $_POST[17] to $final_output
                            foreach ($output as $entry) {
                                if ($entry["BloodBank_Details"]["Province"] == $_POST[20]) {
                                    // If the value is "Eastern", add the corresponding nested array to the filtered array
                                    array_push($final_output, $entry);
                                }
                            }
                        } 
                        // if $_POST[21] is set, add the rows in $output with province = $_POST[21] to $final_output
                        if(isset($_POST[21])){
                            // Add the entries in $output with province = $_POST[17] to $final_output
                            foreach ($output as $entry) {
                                if ($entry["BloodBank_Details"]["Province"] == $_POST[21]) {
                                    // If the value is "Eastern", add the corresponding nested array to the filtered array
                                    array_push($final_output, $entry);
                                }
                            }
                        } 
                        // if $_POST[22] is set, add the rows in $output with province = $_POST[22] to $final_output
                        if(isset($_POST[22])){
                            // Add the entries in $output with province = $_POST[17] to $final_output
                            foreach ($output as $entry) {
                                if ($entry["BloodBank_Details"]["Province"] == $_POST[22]) {
                                    // If the value is "Eastern", add the corresponding nested array to the filtered array
                                    array_push($final_output, $entry);
                                }
                            }
                        } 
                        $_SESSION['reserves'] = $final_output;
                    }
                    // echo "<pre>";
                    // print_r($_SESSION['reserves']);
                    // echo "</pre>";
                }
                // Unset the post data
                //unset($_POST);
                $this->view->render('admin/reserves');
                exit;
            }


            
               
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }     
    }
}

