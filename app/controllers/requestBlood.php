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
            //$acceptedDate='NULL';
            
           // $BloodBankID=$_POST['bloodbank'];
            $BloodBankID=$_SESSION['bloodbankid'];
            $inputs = array($BloodBankID,$HospitalID,$Blood_group, $Blood_component, $Quantity,$acceptedDate);
    
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

    function deleteRequest()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                
                $_SESSION['RequestID'] = $this->model->getRequestID($_SESSION['email']);
                //$_SESSION['RequestID'] = $RequestID;
                
                $_SESSION['Request'] = $this->model->dltReq( $_SESSION['RequestID']);
                $this->view->render('hospitals/deleteSuccessfully');
                header("Location: /requestblood/type?page=1");
                //print_r("AWA");die();
                exit;
            
            }
        }
        else{
            $this->view->render('authentication/login');    
        }    
    }

    function viewProfile()
    {
        if ($_SESSION['type'] == "Hospital/Medical_Center") {
            
            
            
            $_SESSION['user_details'] = $this->model->get_telno($_SESSION['User_ID']);
            //print_r($_SESSION['user_details'][0][2]);die();
            $_SESSION['Name'] = $_SESSION['user_details'][0][2];
            
            $_SESSION['Number'] = $_SESSION['user_details'][0][3];
            $_SESSION['LaneName'] = $_SESSION['user_details'][0][4];
            $_SESSION['City'] = $_SESSION['user_details'][0][5];
            $_SESSION['District'] = $_SESSION['user_details'][0][6];
            $_SESSION['Province'] = $_SESSION['user_details'][0][7];
            $_SESSION['Email'] = $_SESSION['user_details'][1][0];
            $_SESSION['Username'] = $_SESSION['user_details'][1][1];
            $_SESSION['UserType'] = $_SESSION['user_details'][1][2];
            $_SESSION['telno'] = $_SESSION['user_details'][2][0]; 
            $this->view->render('hospitals/profile');
        }
        else{
            $this->view->render('authentication/login');
        }
        
    }

    function editProfile()
    {
        if ($_SESSION['type'] == "Hospital/Medical_Center") {
            
            $this->view->render('hospitals/editProfile');

        }
        else{
            $this->view->render('authentication/login');
        }
        
    }

    function edit_profile()
    {
        if ($_SESSION['type'] == "Hospital/Medical_Center") {
            $orgName = $_POST['hosName'];
            $teleNo = $_POST['teleNo'];
            $num = $_POST['num'];
            $laneNme = $_POST['laneNme'];
            $cit = $_POST['cit'];
            $dis = $_POST['dis'];
            $prov = $_POST['prov'];
            $em = $_POST['em'];

            $inputs1 = array($em, $orgName);
            $inputs2 = array( $orgName,$num ,$laneNme,$cit,$dis,$prov);
            $inputs3 = array($teleNo);
            
            if ($this->model->editProfile($_SESSION['User_ID'],$inputs1, $inputs2, $inputs3)) {
                header("Location: /requestBlood/edit_profile_successful");
            }
            

        }
        else{
            $this->view->render('authentication/login');
        }
        
    }

    function edit_profile_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $this->view->render('hospitals/edit_profile_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    
}