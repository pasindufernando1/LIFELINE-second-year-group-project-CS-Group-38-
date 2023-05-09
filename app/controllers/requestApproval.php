
<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require '../vendor/autoload.php';

class requestApproval extends Controller
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
            $this->view->render('authentication/organizationlogin');
        }
    }
    function typeBloodbank(){
        if(isset($_SESSION['login'])){
            if(isset($_GET['filter'])){
                $is_filtered = $_GET['filter'];
            }
            if($_SESSION['type']=='Organization/Society'){
                if(!isset($_POST['filter']) && !$is_filtered){
                    $_SESSION['is_filtered'] = false;
                    $_SESSION['bloodBanks'] = $this->model->getAllBloodBanks();
                    $this->view->render('organization/viewBloodBanks');
                    exit();
                }
                if(isset($_POST['filter'])){
                    if(isset($_POST['all_type'])){
                        $_SESSION['is_filtered'] = true;
                        $_SESSION['bloodBanks']= $this->model->getAllBloodBanks();
                        $this->view->render('organization/viewBloodBanks');
                        exit();
                    }
                    $output=array();
                    $_SESSION['is_filtered'] = true;
                    if(isset($_POST['district'])){
                        //print_r($_POST['district']);die();
                        $b=$this->model->filter_out_bloodbank($_POST['district']);
                        //print_r($b);die();
                        $output=array_merge($output,$b);
                    }
                    $_SESSION['bloodBanks']=$output;
                }
                
               //print_r($_SESSION['bloodBanks']);die();
                $this->view->render('organization/viewBloodBanks');
            }
        }
    }
    function viewDetails()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $_SESSION['bloodBanks'] = $this->model->getAllBloodBanks();
                $this->view->render('organization/viewBloodBanks');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }
    function chooseHere()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/chooseHere');
            exit();
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function add_Request()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/requestApproval');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }
    function addRequest()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            if (!isset($_POST['request'])) {
                header('Location: /requestBlood/addbank');
                exit();
            }

            $campName = $_POST['campName'];
            $date = $_POST['date'];
            $startTime = $_POST['startTime'];
            $endTime = $_POST['endTime'];
            $location = $_POST['location'];
            
            $beds = $_POST['beds'];
            $donors = $_POST['donors'];
            $BloodBankID = $_SESSION['bloodbankID'];
            $orgID = $_SESSION['User_ID'];
            //$advertisementID = 'NULL';
            $Status = '0';

            //$BloodBankID=$_POST['bloodbank'];

            $inputs = [
                
                $campName,
                $location,
                $beds,
                $date,
                $startTime,
                $endTime,
                $donors,
                $advertisementID,
                $orgID,
                $Status,
                $BloodBankID,
            ];

            if ($this->model->addApprovalRequest($inputs)) {
                header('Location: /requestApproval/add_request_successful');
            }
        }
    }

    function add_request_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/add_request_successful');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function type()
    {
        if (isset($_SESSION['login'])) {
            
            if ($_SESSION['type'] == 'Organization/Society') {
                
                if (isset($_POST['all_type'])) {
                    
                    //print_r("awa");die();
                    header('Location: /requestApproval/viewCampaigns');
                    
                }
                //var_dump($_POST);die();
                if (!empty($_POST['1'])) {
                    
                    $date = $_POST['1'];
                    //print_r("awa");die();
                    
                    $_SESSION['campaigns'] = $this->model->getCampaignsOfDate($date, $_SESSION['User_ID']);
                    //print_r($_SESSION['campaigns']);die();

                    if (!empty($_POST['district'])) {
                        $district = $_POST['district'];
                        $_SESSION['campaigns']=$this->model->getCampaignsOfDateAndDistrict($date, $_SESSION['User_ID'],$district);
                        /* $_SESSION['campaigns'] = array_merge($_SESSION['campaigns'],$campaigsofdistrict); */
                         //print_r($_SESSION['campaigns']);die();
                    }

                } 

                elseif (!empty($_POST['district'])) {
                        // print_r("Hello");die();
                        $district = $_POST["district"];
                        // print_r("awa");die();
                        $_SESSION['campaigns'] = $this->model->Campaignsofdistrict($district, $_SESSION['User_ID']);
                }
                //print_r($_SESSION['campaigns']);die();
                //$_SESSION['campaigns'] = $this->model->getCampaigns($_SESSION['User_ID'] );
                //print_r($_SESSION['campaigns']);die();
                $_SESSION['rowCount'] = count($_SESSION['campaigns']);
                $this->view->render('organization/viewCampaigns');
                exit();
            }
            
            
        }
            
         else {
            $this->view->render('authentication/organizationlogin');
        }
        
    }

    function viewCampaigns()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $_SESSION['campaigns'] = $this->model->getCampaigns($_SESSION['User_ID']);
                $this->view->render('organization/viewCampaigns');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    
    function typeRating(){
        //print_r("awa");die();
        if(isset($_SESSION['login'])){
            if(isset($_GET['filter'])){
                $is_filtered = $_GET['filter'];
            }
            //print_r("awa");die();
            if($_SESSION['type']=='Organization/Society'){
                if(!isset($_POST['filter']) && !$is_filtered){
                    $_SESSION['is_filtered'] = false;
                    header('Location: /requestApproval/view_feedbacks?campaign='.$_SESSION['campaignID']);
                    this->view->render('organization/viewFeedbacks');
                    exit();
                }
                if(isset($_POST['filter'])){
                    if(isset($_POST['all_type'])){
                        $_SESSION['is_filtered'] = true;
                        header('Location: /requestApproval/view_feedbacks?campaign='.$_SESSION['campaignID']);
                        this->view->render('organization/viewFeedbacks');
                        exit();
                    }
                    $output = array();
                    $_SESSION['is_filtered'] = true;
                    if(isset($_POST['0'])){
                        $rating = $_POST['0'];
                        $campid=$_SESSION['campaignID'];
                        $feedbackDet=$this->model->getfeedbackInfoRating($campid,$rating);
                        if(empty($feedbackDet)){
                            $_SESSION['rowCount'] = 0;
                            $_SESSION['feedbacks'] = $output;
                            $this->view->render('organization/viewFeedbacks');
                            exit();
                        }
                        else{
                            $donorIds = [];
                        foreach ($feedbackDet as $feedback) {
                            $donorIds[] = $feedback['DonorID'];
                        }
                        $donorName=$this->model->getdonorName($donorIds);
                        for($i=0;$i<count($donorName);$i++){
                            $data[$i]['Fullname'] = $donorName[$i][0]['Fullname'];
                            $data[$i]['UserID'] = $donorName[$i][0]['UserID'];
                            
                            foreach($feedbackDet as $f){
                                if($f['DonorID']==$donorName[$i][0]['UserID']){
                                    $data[$i]['Feedback'] = $f['Feedback'];
                                    $data[$i]['Date'] = $f['Date'];
                                    $data[$i]['Rating']=$f['Rating'];
                                }
                            }
                        }
                        $feedbackDet = $data;
                        }
                        //print_r($feedbackDet);die();
                        if(empty($feedbackDet)){
                            $_SESSION['feedbacks'] = $feedbackDet;
                            header('Location: /requestApproval/view_feedbacks?campaign='.$_SESSION['campaignID']);
                            this->view->render('organization/viewFeedbacks');
                            exit();
                        }
                        foreach($feedbackDet as $row){
                            $output[] = $row;
                        }
                    }
                    $_SESSION['feedbacks'] = $output;
                    $this->view->render('organization/viewFeedbacks');
                    exit();
                }
            }
        }
        else{
            $this->view->render('authentication/organizationlogin');
        }
    }

               /*  //print_r($_POST);die();

                // var_dump($_POST);die();
                
                if(!empty($_POST["all_type"])){
                    
                    //call the controller function view_feedbacks()
                    header('Location: /requestApproval/view_feedbacks?campaign='.$_SESSION['campaignID']);
                    exit();
                    
                }
            if(isset($_POST['0'])){
                
                $rating = $_POST['0'];
                //$campid=$_GET['campaign'];
                //print_r($campid);die();
                 //$_SESSION['campaignID']=$campid;
                 //print_r($_SESSION['campaignID']);die();
                 $campid=$_SESSION['campaignID'];
                $feedbackDet=$this->model->getfeedbackInfoRating($campid,$rating);
                //print_r($feedbackDet);die();
                $feedbackDet = array_filter($feedbackDet, function($item) {
                    return $item['Feedback'] !== null;
                });
                if(empty($feedbackDet)){
                    $_SESSION['rowCount'] = 0;
                }
                else{
                    $donorIds = [];
                foreach ($feedbackDet as $feedback) {
                    $donorIds[] = $feedback['DonorID'];
                }
                $donorName=$this->model->getdonorName($donorIds);
                for($i=0;$i<count($donorName);$i++){
                    $data[$i]['Fullname'] = $donorName[$i][0]['Fullname'];
                    $data[$i]['UserID'] = $donorName[$i][0]['UserID'];
                    
                    foreach($feedbackDet as $f){
                        if($f['DonorID']==$donorName[$i][0]['UserID']){
                            $data[$i]['Feedback'] = $f['Feedback'];
                            $data[$i]['Date'] = $f['Date'];
                            $data[$i]['Rating']=$f['Rating'];
                        }
                    }
                }
                if(count($donorName)>0){
                    $_SESSION['feedbacks'] = $data;
                   /*  $_SESSION['rowCount'] = count($data); */
               /* }
                 else{
                    $_SESSION['rowCount'] = 0;
                    $_SESSION['feedbacks'] = [];
                } 
                
            }
            $this->view->render('organization/viewFeedbacks');
                exit();
        }

            
        }
        }
        else{
            $this->view->render('authentication/organizationlogin');
        }
    }
 */
    function view_feedbacks()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                //print_r($_GET['campaign']);die();
                // if(isset($_GET['campaign'])){
                $campid = $_GET['campaign'];
                $_SESSION['campaignID'] = $campid;
                $data = [];
                // }
                 //print_r($campid);die();
                $feedbackDet=$this->model->getfeedbackInfo($campid);
                
                //print_r($feedbackDet);die();
                
                $feedbackDet = array_filter($feedbackDet, function($item) {
                    return $item['Feedback'] !== null;
                });
                /* for ($i = 0; $i < sizeof($feedbackDet); $i++) {
                    if ($feedbackDet[$i]['Feedback'] == null) {
                        unset($feedbackDet[$i]);
                        $i--; // decrement the index to revisit the same index
                    }
                } */
                
                
                //print_r($count);die();
                //print_r($feedbackDet);die();
                //$_SESSION['feedbacks']= $this->model->getfeedbackInfo($campid);
                //print_r($_SESSION['feedbacks']);die();
                if(!empty($feedbackDet)){
                    
                    $donorIds = [];
                    foreach ($feedbackDet as $feedback) {
                        $donorIds[] = $feedback['DonorID'];
                    }
                 //print_r($donorIds);die();
                //print_r($feedbackDet)[0];die();
                $donorName=$this->model->getdonorName($donorIds);
                // print_r($feedbackDet);
                 //print_r($donorName);die();
                

                for($i=0;$i<count($donorName);$i++){
                    $data[$i]['Fullname'] = $donorName[$i][0]['Fullname'];
                    $data[$i]['UserID'] = $donorName[$i][0]['UserID'];
                    
                    foreach($feedbackDet as $f){
                        if($f['DonorID']==$donorName[$i][0]['UserID']){
                            $data[$i]['Feedback'] = $f['Feedback'];
                            $data[$i]['Date'] = $f['Date'];
                            $data[$i]['Rating']=$f['Rating'];
                        }
                    }
                }
                
                
                }
                //print_r($data);die();
                $_SESSION['feedbacks']=$data;
                
                // print_r($_SESSION['feedbacks']);die();
                
                //print_r($data);die();
                //print_r($_SESSION['feedbacks']);die();
                $this->view->render('organization/viewFeedbacks');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function view_Timeslots()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $campid = $_GET['campaign'];
                $camp_info = $this->model->get_campaign_info($campid);
                $_SESSION['campaign_array'] = $camp_info;

                $_SESSION['Timeslots'] = $this->model->getSlotIDs($campid);
                $_SESSION['slots'] = $this->model->getSlotDetails(
                    $_SESSION['Timeslots']
                );

                $this->view->render('organization/viewTimeslots');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function viewDonorsofTimeslot()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                // $slotid = $_GET['slot'];
                // $_SESSION['donors'] = $this->model->getDonors($slotid);
                $this->view->render('organization/donors_of_Timeslot');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function viewAcceptedCampaigns()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                
                $today=date("Y-m-d H:i:s");

                $_SESSION['accepted_campaigns'] = $this->model->getAcceptedCampaigns($_SESSION['User_ID'],$today);
                //print_r($_SESSION['accepted_campaigns']);die();
                $_SESSION['past_campaigns'] = $this->model->getPastCampaigns($_SESSION['accepted_campaigns'],$today);
                //print_r($_SESSION['past_campaigns']);die();
                $this->view->render('organization/viewAcceptedCampaigns');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function viewAcceptedCamps()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $_SESSION[
                    'accepted_campaigns'
                ] = $this->model->getAcceptedCampaigns($_SESSION['User_ID']);
                $this->view->render('organization/viewAcceptedCamps');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function chooseHere_scheduleTime()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/chooseHere_scheduleTime');
            exit();
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function scheduleTimeslots()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $campid = $_GET['campaign'];
            $_SESSION['campaignId']=$campid;
            //print_r($_SESSION['campaignId']);die();
            //echo $campid;
            $_SESSION['allTimeslots']=$this->model->getAllTimeslots();
            
            //$_SESSION['rowCount']=count($allTimeslots);
            //remove the timeslots that are already scheduled 
            $scheduledTimeslots=$this->model->getScheduledTimeslots($campid);
            //print_r($scheduledTimeslots);die();
            //set status =1 to the timeslots that are already scheduled
            if(!empty($scheduledTimeslots)){
                for($i=0;$i<count($_SESSION['allTimeslots']);$i++){
                    for($j=0;$j<count($scheduledTimeslots);$j++){
                        if($_SESSION['allTimeslots'][$i]['SlotID']==$scheduledTimeslots[$j]['SlotID']){
                            $_SESSION['allTimeslots'][$i]['Status']=1;
                            break;
                        }
                        else{
                            $_SESSION['allTimeslots'][$i]['Status']=0;
                        }
                    }
                }
            }
            else{
                for($i=0;$i<count($_SESSION['allTimeslots']);$i++){
                    $_SESSION['allTimeslots'][$i]['Status']=0;
                }
            }
            
                //print_r($temp);die();
            if(empty($_SESSION['allTimeslots'])){
                $_SESSION['rowCount']=0;
            }
            else{
                $_SESSION['rowCount']=count($_SESSION['allTimeslots']);
            }
               
            $this->view->render('organization/scheduleTimeslots');
        } else {
            $this->view->render('authentication/organizationlogin');
        } 
    }
    function addTimeslot($TimeslotID)
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            //print_r($_SESSION['campaignId']);die();
            $campid=$_SESSION['campaignId'];
            if ($this->model->addSlot($TimeslotID,$_SESSION['campaignId'])) {
                header('Location: /requestApproval/scheduleTimeslots?campaign='.$campid.'');
            }
        }
        else{
            $this->view->render('authentication/login');
        }

        
    }

    function add_slot_successfully(){
        //print_r('awa');die();
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $campid=$_GET['campaign'];
                // print_r($campid);die();
                // print_r($_SESSION['campaignId']);die();
                $_SESSION['campaignId']=$campid;
                $this->view->render('organization/add_slot_successfully');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }


    function viewTimeslots()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $campid = $_GET['campaign'];
                $camp_info = $this->model->get_campaign_info($campid);
                //print_r($camp_info);die();
                $_SESSION['campaign_array'] = $camp_info;
                $slotids = $this->model->getSlotIDs($campid);
                //print_r($slotids);die();
                $x=sizeof($slotids);
                //print_r($x);die();
                if($x==0){
                    $_SESSION['rowCount']=0;
                    $_SESSION['timeslots']=null;
                }
                else{
                    $_SESSION['rowCount']=$x;
                    for($i=0;$i<$x;$i++){
                        $slotid=$slotids[$i]['SlotID'];
    
                        //print($slotid);
                        $_SESSION['timeslots'][$i]=$this->model->getSlotDetails($slotid);
                        
                    }
                }
                 
                
                $this->view->render('organization/camps_view_Timeslots');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function removeTimeslot(){
        if ($_SESSION['type'] == 'Organization/Society') {
            
            $_SESSION['slotid']=intval($_GET['timeSlot']);
           //print_r("awa");die();

        }
        
        if($this->model->removeSlot($_SESSION['slotid'],$_SESSION['campaign_array'][0])){
            $data=$this->model->getSlots($_SESSION['campaign_array'][0]);
            //print_r($data);die();
            
            if(empty($data)){
                $_SESSION['rowCount']=0;
            }
            else{
                $_SESSION['rowCount']=count($data);
            }
            $_SESSION['Scheduled_timeslots']=$data;
            //print_r($_SESSION['rowCount']);die();

            header('Location: /requestApproval/view_viewTimeslots?campaign='.$_SESSION['campaign_array'][0].'');
        
        }
        
     }

     function remove_slot_successfully(){
        //print_r('awa');die();
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/remove_slot_successfully');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
     }

    function view_donors(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $campid = $_SESSION['campaign_array'][0];
                
                
                


                $slotid=intval($_GET['slot']);
                //print_r($_GET['slot']);die();
                //print_r($campid);die();
                $donorDetails=$this->model->getDonorList($campid,$slotid);
                    /* print_r($res);die();
                    for($i=0;$i<sizeof($res);$i++){
                        $_SESSION['donorList'][$i]=$res[$i]['Fullname'];
                    }
                     */
                    //print_r($donorDetails[0]['UserID']);die();
                   // $donorList=$res[0]['Fullname'];
                   if($donorDetails==null){
                    $_SESSION['donorList']=[];
                    $_SESSION['rowCount']=0;
                   }
                   else{
                    for($i=0;$i<sizeof($donorDetails);$i++){
                        $donorID[$i]=$donorDetails[$i]['UserID'];
                        
                      }
                        //print_r(sizeof($donorID));die();
                        for($i=0;$i<sizeof($donorID);$i++){
                            $donorContact[$i]=$this->model->getDonorContact($donorID[$i]);
                        }
                    
                        //print_r($donorContact);die();
                        for($i=0;$i<sizeof($donorContact);$i++){
                            $donorList[$i]['Fullname']=$donorDetails[$i]['Fullname'];
                            $donorList[$i]['Contact']=$donorContact[$i][0]['ContactNumber'];
                            $donorList[$i]['NIC']=$donorDetails[$i]['NIC'];
                        }
                        //print_r($donorList);die();
                        $_SESSION['donorList']=$donorList;
                        $_SESSION['rowCount']=sizeof($donorList);
                   }
                    
                    //print_r($_SESSION['donorList']);die();
                    $this->view->render('organization/viewDonorsList');
                    exit();
                  
                
            }
        }
    
    }

    function view_viewAcceptedCamps()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $today=date("Y-m-d H:i:s");
                //print_r($_SESSION['campaign_array']);die;
                $_SESSION['accepted_campaigns'] = $this->model->getAcceptedCampaigns($_SESSION['User_ID'],$today);
                $_SESSION['upcoming_campaigns'] = $this->model->getUpcomingCampaigns($_SESSION['accepted_campaigns'],$today);
                //print_r($_SESSION['upcoming_campaigns']);die();
                $this->view->render('organization/view_viewAcceptedCamps');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function view_viewTimeslots()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $campid = $_GET['campaign'];
                $camp_info = $this->model->get_campaign_info($campid); 
                $_SESSION['campaign_array'] = $camp_info; 
                $slotids = $this->model->getSlotIDs($campid);
                //print_r($slotids);die();
                $x=sizeof($slotids);
                //print_r($x);die();
                
                if(!empty($slotids)){
                    for($i=0;$i<$x;$i++){
                        $slotid=$slotids[$i]['SlotID'];
                        //print_r($slotid);die();
                        
                        $_SESSION['Scheduled_timeslots'][$i]=$this->model->getSlotDetails($slotid);
                       
                    } 
                    
                    $_SESSION['rowCount']=count($_SESSION['Scheduled_timeslots']);
                    //print_r($_SESSION['timeslots']);die();
                }
                else{
                    $_SESSION['Scheduled_timeslots']=[];
                    $_SESSION['rowCount']=0;
                }

                //print_r($_SESSION['Scheduled_timeslots']);die();
                $this->view->render('organization/view_viewTimeslots');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    
    function getAcceptedCamps()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $todaysDate = date('Y-m-d H:i:s');
                
                $_SESSION['accepted_campaigns'] = $this->model->getAcceptedCampaigns($_SESSION['User_ID']);
                $_SESSION['upcoming_campaigns'] = $this->model->getUpcomingCampaigns($_SESSION['accepted_campaigns'] , $todaysDate);
                $this->view->render('organization/notifi_viewAcceptedCamps');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }
    function sendNotifications()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render(
                    'organization/send_notifications_successful'
                );
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function viewAdvertisements()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $AdID = $this->model->getadvertisementIDs();
                
                
                $x=sizeof($AdID);
                
                for($i=0;$i<$x;$i++){
                    $adid=$AdID[$i]['AdvertisementID'];
                    $AdDetails[$i]=$this->model->getAdvertisements($adid);
                }
                for($i=0;$i<$x;$i++){
                    $adid=$AdID[$i]['AdvertisementID'];
                    
                    $inventoryCat[$i]=$this->model->getInventoryCatToAd($adid);
                    
                }
                
                $x=sizeof($AdID);
                
                for($i=0;$i<$x;$i++){
                    $adid=$AdID[$i]['AdvertisementID'];
                    $total_received[$i]=$this->model->getTotalReceived($adid);
                    
                }
                
                
                //print_r($donationID);die();
                foreach ($AdDetails as $details) {
                    $bloodbankIds[] = $details[0]['BloodBankID'];
                  }
                  //print_r($AdDetails);die();
                  //print_r($bloodbankIds[0]);die();
                    $x=sizeof($bloodbankIds);
                  for($i=0;$i<$x;$i++){
                    $bloodbankName[$i]=$this->model->getBloodbankNames($bloodbankIds[$i]);
                    //print_r($bloodbankName[$i]);die();
                  }
                  $data=[];
                //$bloodbankName=$this->model->getBloodbankNames($bloodbankIds);
                //print_r($bloodbankName);die();
                for($i=0;$i<count($bloodbankName);$i++){
                    //$data[$i]['BloodBank_Name'] = $bloodbankName[$i][0]['BloodBank_Name'];
                    $data[$i]['Advertisement_pic'] = $AdDetails[$i][0]['Advertisement_pic'];
                    $data[$i]['Description'] = $AdDetails[$i][0]['Description'];
                    $data[$i]['InventoryCategory'] = $inventoryCat[$i][0]['InventoryCategory'];
                    $data[$i]['AdvertisementID'] = $AdID[$i]['AdvertisementID'];
                    //$data[$i]['$Total_amount']=$AdID[$i]['Total_amount'];
                    /* foreach($AdDetails as $f){
                        //if($f['BloodBankID']==$bloodbankIds[$i]){
                        
                            $data[$i]['advertisements'] = $f['advertisements'];
                        //}
                    } */
                }
                //print_r($data);die();
                $_SESSION['advertisements'] = $data;
                //print_r($_SESSION['advertisements']);die();
                $this->view->render('organization/viewAdvertisements');
                
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function viewInstructions()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/instructions');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }
    function viewBloodbanks()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $_SESSION['bloodBanks'] = $this->model->getAllBloodBanks();
                $this->view->render('organization/inventory_bloodbanks');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function add_InventoryRequest()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/inventoryItems');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function accommodation()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/accommodation');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function quantity()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/quantity');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function addInvenReq()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                if ($_SESSION['type'] == 'Organization/Society') {
                    if (!isset($_POST['request'])) {
                        header('Location: /requestBlood/addbank');
                        exit();
                    }
                    

                    $quantity = $_POST['quant'];
                    
                    $AdvertisementID = $_SESSION['AdvertisementID'];
                    //print_r($AdvertisementID);die();
                    $donID=$this->model->getDonationID($AdvertisementID);
                    $donationID=$donID[0]['DonationID'];
                    //print_r($donationID);die();
                    //$today=date("Y-m-d");
                    //print_r($today);die();
                    //$donationType='Inventory';
                    //print_r($donationType);die();
                    $inventorycategory=$this->model->getInventoryCat($AdvertisementID);
                    //$inventorycategory=$_SESSION['advertisements'][0]['InventoryCategory'];
                    //print_r($inventorycategory);die();
                    //print_r($AdvertisementID);die();
                   //$acceptedDate='NULL';
                   
                   $adminVerify='0';

                   //$donationID=$_SESSION['advertisements'][0]['DonationID'];
                   //print_r($donationID);die();
                    //$BloodBankID=$_POST['bloodbank'];
        
                    $inputs = [
                        $donationID,
                        $inventorycategory,
                        $quantity,
                        $acceptedDate,
                        $adminVerify,
                        
                    ];
        
                    if ($this->model->addinventoryItem($inputs)) {
                        //header('Location: /requestApproval/add_inventory_successful');
                        $this->view->render('organization/add_inventory_successful');
                    }
                }
                
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function stationaryItems()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/stationaryItems');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function medicalAppliance()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/medicalAppliance');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function viewProfile()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $_SESSION['user_details'] = $this->model->get_telno(
                $_SESSION['User_ID']
            );
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
            $this->view->render('organization/profile');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function editDetails()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $_SESSION['user_details'] = $this->model->get_telno($_SESSION['User_ID'] );
            //print_r( $_SESSION['user_details'][2]['ContactNumber']);die();
            $_SESSION['user_Name'] = $_SESSION['user_details'][0]['Name'];
            $_SESSION['user_Number'] = $_SESSION['user_details'][0]['Number'];
            $_SESSION['user_LaneName'] = $_SESSION['user_details'][0]['LaneName'];
            $_SESSION['user_City'] = $_SESSION['user_details'][0]['City'];
            $_SESSION['user_District'] = $_SESSION['user_details'][0]['District'];
            $_SESSION['user_Province'] = $_SESSION['user_details'][0]['Province'];
            $_SESSION['user_telno']= $_SESSION['user_details'][2]['ContactNumber'];
            $_SESSION['user_username'] = $_SESSION['user_details'][1]['Username'];
            $_SESSION['user_userType'] = $_SESSION['user_details'][1]['UserType'];
            $_SESSION['user_user_pic'] = $_SESSION['user_details'][1]['Userpic'];
            $_SESSION['password'] = $_SESSION['user_details'][1]['Password'];


            $this->view->render('organization/editProfile');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function edit_profile()
    {
        $target_dir = "C:/xampp/htdocs/public/img/user_pics/";
        $file_upload = false;
        // Checking whether a file is uploaded
        if ($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
            $filename = basename($_FILES["fileToUpload"]["name"]);
            //print_r($filename);die();
            $file_upload = true;
        } else {
            $filename = $_SESSION['user_pic'];
        }
        $target_file = $target_dir . $filename;
        
        
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if($file_upload){
                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    //print_r($check);die();
                    if ($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                        //print_r($uploadOk);die();
                        
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

        }
        if ($_SESSION['type'] == 'Organization/Society') {
            $orgName = $_POST['orgName'];
            $teleNo = $_POST['teleNo'];
            $num = $_POST['num'];
            $laneNme = $_POST['laneNme'];
            $cit = $_POST['cit'];
            $dis = $_POST['dis'];
            $prov = $_POST['prov'];
            
            $Password = $_POST['newPw'];
            $user_pic = $filename;
            //print_r($_SESSION['password']);die();
            if(empty($Password)){
                $Password = $_SESSION['password'];
            }else{
                $Password = password_hash($_POST['newPw'], PASSWORD_DEFAULT);
            }

            $inputs1 = [$Password, $orgName,$user_pic];
            $inputs2 = [$orgName, $num, $laneNme, $cit, $dis, $prov];
            $inputs3 = [$teleNo];

            if ($this->model->editProfile($_SESSION['User_ID'], $inputs1, $inputs2,$inputs3)){
                $_SESSION['user_pic'] = $this->model->getuserimg($_SESSION['User_ID']);
                //print_r($_SESSION['user_pic']);die();
                header('Location: /requestApproval/edit_profile_successful');
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function edit_profile_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/edit_profile_successful');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }


    function schedule_viewAcceptedCamps()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $today=date("Y-m-d H:i:s");
                
                $_SESSION['accepted_campaigns'] = $this->model->getAcceptedCampaigns($_SESSION['User_ID'],$today);
                $_SESSION['upcoming_campaigns'] = $this->model->getUpcomingCampaigns($_SESSION['accepted_campaigns'],$today);
                //print_r($_SESSION['upcoming_campaigns']);die();
                $this->view->render('organization/viewAcceptedCamps');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    //donate begin

    function donateCash()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                // list($_SESSION['cash_ads'],$_SESSION['cash_amounts'])=$this->model->getcashads();
                $_SESSION['cash_ads'] = $this->model->getcashads();
                $_SESSION['cash_adpics'] = $this->model->getcashadpics($_SESSION['cash_ads']);
                $_SESSION['cash_bbs'] = $this->model->getcashbbs($_SESSION['cash_adpics']);
                $_SESSION['cash_received_amounts'] = $this->model->getreceivedcashamounts($_SESSION['cash_ads']);
                $this->view->render('organization/donateAds');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function donationPage()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $_SESSION['donationID'] = $_GET['donationID'];
                $this->view->render('organization/donateToday');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function donate()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/paymentDetails');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function donateNow()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/payment_successful');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function donatesuccess()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $today = date("Y-m-d H:i:s");	
                $dbconned = $this->model->insertDonation($_SESSION['donationID'], $_SESSION['donating_amount'] / 100,$_SESSION['User_ID'],$today);
                unset($_SESSION['donating_amount']);
                $this->view->render('organization/paymentDone');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    //donate end

    function addFeedback(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/feedback');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function add_Feedback()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            if (!isset($_POST['request'])) {
                header('Location: /requestApproval/addbank');
                exit();
            }
            $date=date("Y-m-d");
            $feedback = $_POST['feedback'];
            $userid=$_SESSION['User_ID'];
            $inputs=[$userid,$feedback,$date];
            //$BloodBankID=$_POST['bloodbank'];

            

            if ($this->model->addFeedback($inputs)) {
                //print_r('awa');die();
                header('Location: /requestApproval/add_feedback_successfully');
            }
        }
    }
    function add_feedback_successfully(){
        //print_r('awa');die();
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/add_feedback_successful');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function confirm_password()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                if (!isset($_POST['confirm'])) {
                    // print_r('not working');
                    // die();
                    header('Location: /requestApproval/viewProfile');
                    exit();
                }
                $password = $_POST['password'];
                //print_r($password);die();
                $password = trim($password);
                if ($this->model->check_password($_SESSION['User_ID'], $password)) {
                    // header('Location: /donorprofile');
                    $this->view->render('organization/profile');
                    echo '<script>hidealert();</script>';
                    echo '<script>showemail();</script>';
                    if (isset($_SESSION['p_error'])) {
                        unset($_SESSION['p_error']);
                    }
                } else {

                    $_SESSION['p_error'] = "Password is incorrect";
                    $this->view->render('organization/profile');
                    echo '<script>hidealert();</script>';
                    echo '<script>showalert();</script>';
                    // $this->view->render('donor/profile_edit_confirm_password');
                }
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function get_email()
    {
        if (!isset($_POST['confirm'])) {
            /* print_r('not working');
            die(); */
            header('Location: /requestApproval/viewProfile');
            exit();
        }
        $_SESSION['email_reset'] = $_POST['email'];


        $num_str = sprintf("%06d", mt_rand(1, 999999));
        $_SESSION['token'] = $num_str;

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

        $mail->IsSMTP(); // telling the class to use SMTP
        // $mail->SMTPDebug = 2;
        $mail->Mailer = "smtp";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'lifeline.managementservices@gmail.com';
        $mail->Password = 'kelpqmxgangljbqj';
        //From email address and name
        $mail->From = "lifeline.managementservices@gmail.com";
        $mail->FromName = "Life Line";

        //To address and name
        $mail->addAddress($_POST['email']); //Recipient name is optional                                                                                         

        //Address to which recipient will reply
        $mail->addReplyTo("noreply@lifeline.com", "Life Line");


        //Send HTML or Plain Text email
        $mail->isHTML(true);

        $mail->Subject = "Verify Your Email Address";
        $mail->Body = "<p>Dear User,</p>
            <p>To change your email, we need to verify your new email address.
            Use the following OTP to confirm:$num_str </p>
            <p>enter the OTP on the confirmation page to complete the verification process.
            If you didn't request this OTP, please ignore this email.</p>";
        $mail->AltBody = "This is the plain text version of the email content";


        try {
            $mail->send();
            $this->view->render('organization/profile');
            echo '<script>hidealert();</script>';
            echo '<script>showotp();</script>';
            //print_r("awa");die();
            // header('Location: /donorprofile/OTP');
            if (isset($_SESSION['e_error'])) {
                unset($_SESSION['e_error']);
            }
        } catch (Exception $e) {
            $_SESSION['e_error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }

    function OTP()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                if (isset($_SESSION['otp_error'])) {
                    unset($_SESSION['otp_error']);
                }
                $this->view->render('organization/profile_edit_otp');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function confirm_OTP()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {

                if (!isset($_POST['confirm'])) {
                    // print_r('coming');
                    // die();
                    header('Location: /requestApproval/viewProfile');
                    exit();
                }
                // print_r('coming');
                // die();
                $otp = $_POST['otp'];
                // print_r($_SESSION['token']);
                // var_dump($otp);
                // die();
                if ($otp == $_SESSION['token']) {
                    $email = $_SESSION['email_reset'];

                    if ($this->model->update_email($_SESSION['User_ID'], $email)) {
                        $_SESSION['email'] = $email;
                        //print_r($_SESSION['email']);die();
                        $this->view->render('organization/profile_edit_email_successful');
                    } else {
                        echo "error";
                    }

                    if (isset($_SESSION['otp_error'])) {
                        unset($_SESSION['otp_error']);
                    }
                } else {
                    $_SESSION['otp_error'] = "OTP is incorrect";
                    $this->view->render('/requestApproval/viewProfile');
                    echo '<script>hidealert();</script>';
                    echo '<script>showotp();</script>';
                    // $this->view->render('donor/profile_edit_otp');
                }
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

}