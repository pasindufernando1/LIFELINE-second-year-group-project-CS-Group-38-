<?php
session_start();

class Viewregistration extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "systemuser") {
                $this->view->render('systemuser/reservation');
                exit;
            } else if ($_SESSION['type'] == "admin") {
                $this->view->render('layout/reservation');
                exit;
            } else if ($_SESSION['type'] == "donor") {
                $_SESSION['upcoming_campaigns'] = $this->model->getAllCampaigns();
                $this->view->render('donor/getcampaign');
                exit;
            } else {
                $this->view->render('layout/reservation');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function getregistration(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "systemuser") {
                $this->view->render('systemuser/reservation');
                exit;
            } else if ($_SESSION['type'] == "admin") {
                $this->view->render('layout/reservation');
                exit;
            } else if ($_SESSION['type'] == "donor") {
                $_SESSION['selected_campid'] = $_GET['camp'];
                $regid = $this->model->getregid($_SESSION['selected_campid'],$_SESSION['$user_ID']);
                $_SESSION['selected_campid'] = $_GET['camp'];
                $_SESSION['reg_info'] = $this->model->getregistrationinfo();
                $this->view->render('donor/getcampaign');
                exit;
            } else {
                $this->view->render('layout/reservation');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function editregistration(){
        if ($_SESSION['type'] == "donor") {
            if (!isset($_POST['edit-reg'])) {
                header("Location: /getcampaign/index");
                exit;
            }

           
            // if($_POST['g1']== "on" ||$_POST['g2']== "on"||$_POST['g3']== "on"||$_POST['g4']== "on"||$_POST['g5']== "on"||$_POST['g6']== "on"||$_POST['g7']== "on"||$_POST['g8']== "on"||$_POST['g9']== "on"||$_POST['g10']== "on"||$_POST['g11']== "on" ){
            //     header("Location: /getcampaign/regtocampaignunsuccessful");
            //     exit;
            // }
            // else{
                $email = $_SESSION['email'];
                $user_ID = $this->model->get_user_id($email);
                $campaign_ID = $_SESSION['selected_campid'];

                if($this->model->ifregistered($user_ID,$campaign_ID)){
                    print_r('already registered');
                }
                else{
                    //get POST data from login page
                    $contno = $_POST['contno'];
                    $emcontno = $_POST['emcontno'];
                    $user_ID = $this->model->get_user_id($email);

                    $inputs = array($user_ID ,$campaign_ID,$contno, $emcontno);

                    // print_r($user_ID);
                    // die();

                    if ($this->model->putregistraion($inputs,$campaign_ID)){
                        header("Location: /getcampaign/regtocampaignsuccessful");
                    }
                }
            // }
        
        }


    }

    function view_campaign(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "donor") {

                $_SESSION['selected_campid'] = $_GET['camp'];
            
                     $campid = $_SESSION['selected_campid'];
                    $camp_info = $this->model->get_campaign_info($campid);
                    $_SESSION['campaign_array'] = $camp_info;
                    $_SESSION['org_name'] = $this->model->get_org_name($_SESSION['campaign_array'][7]);
                
                //Get registration status
                    $email = $_SESSION['email'];
                    $user_ID = $this->model->get_user_id($email);
                    $campaign_ID = $_SESSION['selected_campid'];
                if($this->model->ifregistered($user_ID,$campaign_ID)){
                    // print_r('already registered');
                    // die();
                    $_SESSION['if_registered'] = 1;
                }
                else{
                    $_SESSION['if_registered'] = 0;
                }

               // $this->view->render('donor/viewcampaign');
               $this->view->render('donor/viewcampaign');
                exit;
                
               
            } 
        }
        else{
            $this->view->render('authentication/donorlogin');
        }
    }

    function reg_to_campaign()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "donor") {
               //$campaign_info = $this->model->get_campaign_info();
                $this->view->render('donor/regtocampaign');
                exit;
            } else if ($_SESSION['type'] == "admin") {
                $this->view->render('layout/reservation');
                exit;
            } else if ($_SESSION['type'] == "donor") {
                $this->view->render('systemuser/reservation');
                exit;
            } else {
                $this->view->render('layout/reservation');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        } 
    }   
     function register_to_campaign()
    {
        
        if ($_SESSION['type'] == "donor") {
            if (!isset($_POST['reg-to-campaign'])) {
                header("Location: /getcampaign/index");
                exit;
            }

            //for($i=1;$i<12;$i++){
                //$rdiobtn =strval($i);
            if($_POST['g1']== "on" ||$_POST['g2']== "on"||$_POST['g3']== "on"||$_POST['g4']== "on"||$_POST['g5']== "on"||$_POST['g6']== "on"||$_POST['g7']== "on"||$_POST['g8']== "on"||$_POST['g9']== "on"||$_POST['g10']== "on"||$_POST['g11']== "on" ){
                header("Location: /getcampaign/regtocampaignunsuccessful");
                exit;
            }
            else{
                $email = $_SESSION['email'];
                $user_ID = $this->model->get_user_id($email);
                $campaign_ID = $_SESSION['selected_campid'];

                if($this->model->ifregistered($user_ID,$campaign_ID)){
                    print_r('already registered');
                }
                else{
                    //get POST data from login page
                    $contno = $_POST['contno'];
                    $emcontno = $_POST['emcontno'];
                    $user_ID = $this->model->get_user_id($email);

                    $inputs = array($user_ID ,$campaign_ID,$contno, $emcontno);

                    // print_r($user_ID);
                    // die();

                    if ($this->model->putregistraion($inputs,$campaign_ID)){
                        header("Location: /getcampaign/regtocampaignsuccessful");
                    }
                }
            }
         //}
        
        }

        
    }
     function regtocampaignsuccessful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "donor") {
                $this->view->render('donor/regtocampaign_success');
                exit;
            } else if ($_SESSION['type'] == "admin") {
                $this->view->render('layout/reservation');
                exit;
            }
             else {
                $this->view->render('layout/reservation');
                exit;
            }
        }
        else{
            $this->view->render('authentication/donorlogin');
        }
    }
    function regtocampaignunsuccessful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "donor") {
                $this->view->render('donor/regocampaign_unsuccessful');
                exit;
            }
        }
        else{
            $this->view->render('authentication/donorlogin');
        }
    }

    function get_registration(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "donor") {
                $campid = $_SESSION['selected_campid'];
                $email = $_SESSION['email'];
                $user_ID = $this->model->get_user_id($email);
                $this->model->get_reg_info($campid,$user_ID);
                $this->view->render('donor/regocampaign_unsuccessful');
                exit;
            }
        }
        else{
            $this->view->render('authentication/donorlogin');
        }
    }

    function view_campaign_reg(){
        if(isset($_SESSION['login'])){
            if ($_SESSION['type'] == "donor"){
                $this->view->render('donor/viewregistration');
                exit;
            }
            
        }
        else{
            $this->view->render('authentication/donorlogin');
        }
    }




    
}