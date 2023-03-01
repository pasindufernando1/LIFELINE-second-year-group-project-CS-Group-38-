<?php
session_start();

class requestBlood extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $this->view->render('hospitals/requestBlood');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/hospitalslogin');
        }
    }
     
    function addbank()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $this->view->render('hospitals/requestBlood');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/hospitalslogin');
        }
    }

    function add_Request()
    {
        if ($_SESSION['type'] == "Hospital/Medical_Center") {
            $this->view->render('hospitals/requestBlood');
        }
        else{
            $this->view->render('authentication/hospitalslogin');
        }
        
    }

    function addRequest()
    {
        if ($_SESSION['type'] == "Hospital/Medical_Center") {
            if (!isset($_POST['request'])) {
                header("Location: /requestBlood/addbank");
                exit;
            }
            
            $Blood_group = $_POST['bloodGroup'];
            $Blood_component = $_POST['bloodComponent'];
            $Quantity = $_POST['quantity'];
            $HospitalID = $_SESSION['User_ID'];
<<<<<<< Updated upstream
            
           // $BloodBankID=$_POST['bloodbank'];
            $BloodBankID=$_SESSION['bloodbankid'];
            $inputs = array($BloodBankID,$HospitalID,$Blood_group, $Blood_component, $Quantity);
=======
            // Current date 
            $Date_requested = date("Y-m-d");
            
           // $BloodBankID=$_POST['bloodbank'];
            $BloodBankID=$_SESSION['bloodbankid'];
            $inputs = array($BloodBankID,$HospitalID,$Blood_group, $Blood_component, $Quantity,$Date_requested);
>>>>>>> Stashed changes
    
            if ($this->model->addBloodRequest($inputs)){
                header("Location: /requestBlood/add_request_successful");
                
            }
            
        }
        
    }
    function add_request_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $this->view->render('hospitals/add_request_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/hospitalslogin');
        }
    }

    function viewDetails()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $_SESSION['bloodBanks'] = $this->model->getAllBloodBanks();
                $this->view->render('hospitals/viewBloodBanks');
                exit;
            
            }
        }
        else{
            $this->view->render('authentication/login');    
        }    
    }
    
}