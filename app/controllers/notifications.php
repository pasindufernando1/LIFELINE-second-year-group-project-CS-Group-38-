<?php
session_start();

class notifications extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                //$_SESSION['UserID'] = $this->model->getUserID($_SESSION['email']);
                $this->view->render('organizations/requestApproval');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function sendNotifications(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $campid = $_GET['campaign'];
                //print_r($campid);die();
                    $res=$this->model->getBloodBankID($campid);
                    
                    // print_r($res[0]);die();
                    $district=$this->model->getDistrict($res[0]['BloodBankID']);
                    //print_r($district[0]['District']);die();
                    $donorList = $this->model->getDonorList($district[0]['District']);
                    //print_r($donorList);die();
                    //echo $donorList[1]['UserID']; die();
                    if($this->model->sendThankEmail($donorList,$campid)){
                        $this->view->render('organization/mail_send_successfully');                        
                        exit;
                    }
                    
                    exit;
                
            }
        }else{
            $this->view->render('authentication/login');
        }
    }
}