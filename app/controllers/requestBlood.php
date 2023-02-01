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
            
           // $BloodBankID=$_POST['bloodbank'];
            $BloodBankID=$_SESSION['bloodbankid'];
            $inputs = array($BloodBankID,$HospitalID,$Blood_group, $Blood_component, $Quantity);
    
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

    function viewReqBlood()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $_SESSION['bloodBanks'] = $this->model->getAllBloodBanks();
                $this->view->render('hospitals/reqblood');
                exit;
            
            }
        }
        else{
            $this->view->render('authentication/login');    
        }    
    }

    function viewRequests(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $_SESSION['bloodBanks'] = $this->model->getAllRequests( $_SESSION['User_ID']);
                $this->view->render('hospitals/viewrequests');
                exit;
            
            }
        }
        else{
            $this->view->render('authentication/login');    
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