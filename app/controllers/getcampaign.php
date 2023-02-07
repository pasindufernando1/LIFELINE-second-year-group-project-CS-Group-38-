<?php
session_start();

class Getcampaign extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Donor") {
                $_SESSION['today'] = date("Y-m-d H:i:s");
                $_SESSION['user_ID'] = $this->model->get_user_id($_SESSION['email']);
                $_SESSION['registrations'] = $this->model->campregistraions($_SESSION['user_ID'],$_SESSION['today']);
                $_SESSION['upcoming_campaigns'] = $this->model->getAllCampaigns($_SESSION['today']);
                $this->view->render('donor/getcampaign');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function view_campaign(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Donor") {
                $_SESSION['selected_campid'] = $_GET['camp'];

                    $campid = $_GET['camp'];
                    $camp_info = $this->model->get_campaign_info($campid);
                    $_SESSION['campaign_array'] = $camp_info;
                    $_SESSION['org_name'] = $this->model->get_org_name($_SESSION['campaign_array'][9]);

                // print_r(gettype($_SESSION['campaign_array'][5]));
                $stime = substr($_SESSION['campaign_array'][5], 0, 2);
                $etime = substr($_SESSION['campaign_array'][6], 0, 2);
                // print_r($result);
                $stimeval=intval($stime);
                $etimeval=intval($etime);
                // print_r( $num);
                // die();

                    if($etimeval > 12){
                        $et = $etime - 12;
                        $_SESSION['campaign_array'][6] =  strval($et). ' PM';
                    }
                    else{

                        $_SESSION['campaign_array'][6] = strval($etimeval) . ' AM';
                    }

                    if($stimeval > 12){
                        $st = 24 - $stime;
                        $_SESSION['campaign_array'][5] =  strval($st). ' PM';
                    }
                    else{

                        $_SESSION['campaign_array'][5] = strval($stimeval) . ' AM';
                    }

                //     print_r($_SESSION['campaign_array'][5]);
                //     print_r($_SESSION['campaign_array'][6]);
                // die();

                
                    //Get registration status
                    $campaign_ID = $_SESSION['selected_campid'];
                    if($this->model->ifregistered($_SESSION['user_ID'],$campaign_ID)){
                    // print_r('already registered');
                    // die();
                    $_SESSION['reg_info']= $this->model->get_campreg_info($_SESSION['user_ID']);
                    $_SESSION['if_registered'] = 1;
                    $this->view->render('donor/viewcampaign');
                    exit;
                    // print_r($_SESSION['if_registered']);
                    // die();
                }
                else{
                    $_SESSION['if_registered'] = 0;
                    // print_r($_SESSION['if_registered']);
                    // die();
                    $this->view->render('donor/viewcampaign');
                    exit;
                }

               // $this->view->render('donor/viewcampaign');
               
                
               
            } 
        }
        else{
            $this->view->render('authentication/donorlogin');
        }
    }

    function reg_to_campaign()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Donor") {
                // $_SESSION['today'] = date("Y-m-d H:i:s");
                // $this->model->iftimeokay($_SESSION['user_ID'],$_SESSION['selected_campid']);
               //$campaign_info = $this->model->get_campaign_info();
                $_SESSION['contno'] = $this->model->getcontno($_SESSION['user_ID']);
                if(isset($_SESSION['contno'])){
                    // print_r($_SESSION['user_ID']);
                    // print_r($_SESSION['contno']);
                    // die();
                $this->view->render('donor/regtocampaign');

                }
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
        } 
    }   
     function register_to_campaign()
    {
        
        if ($_SESSION['type'] == "Donor") {
            
            if (!isset($_POST['reg-to-campaign'])) {
                // print_r("awa");
                // die();
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
                $campaign_ID = $_SESSION['selected_campid'];


                if($this->model->ifregistered($_SESSION['user_ID'],$campaign_ID)){
                    print_r('already registered');
                }
                else{
                    //get POST data from login page
                    $contno = $_POST['contno'];
                    $emcontno = $_POST['emcontno'];
                    $inputs = array($_SESSION['user_ID'],$campaign_ID,$emcontno);
                    
                    // print_r($user_ID);
                    // die();

                    if ($this->model->putregistraion($inputs,$contno,$_SESSION['user_ID'])){
                        // print_r($inputs);
                        // die();
                        header("Location: /getcampaign/regtocampaignsuccessful");
                    }
                    else{
                        print_r($inputs);
                    die();
                    }
                }
            }
         //}
        
        }

        
    }
     function regtocampaignsuccessful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Donor") {
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
            if ($_SESSION['type'] == "Donor") {
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
            if ($_SESSION['type'] == "Donor") {
                $campid = $_SESSION['selected_campid'];
                $this->model->get_reg_info($campid,$_SESSION['user_ID']);
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
            if ($_SESSION['type'] == "Donor"){
                $this->view->render('donor/viewregistration');
                exit;
            }
            
        }
        else{
            $this->view->render('authentication/donorlogin');
        }
    }




    
}