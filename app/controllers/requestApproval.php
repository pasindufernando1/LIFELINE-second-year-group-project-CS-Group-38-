<?php
session_start();

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
                $this->view->render('organization/requestApproval');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
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

    function view_feedbacks()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $campid = $_GET['campaign'];
                 //print_r($campid);die();
                $feedbackDet=$this->model->getfeedbackInfo($campid);
                //print_r($feedbackDet);die();
                for($i=0;$i<sizeof($feedbackDet);$i++){
                    if($feedbackDet[$i]['Feedback']==null){
                        unset($feedbackDet[$i]);
                    }
                }
                //print_r($feedbackDet);die();
                //$_SESSION['feedbacks']= $this->model->getfeedbackInfo($campid);
                //print_r($_SESSION['feedbacks']);die();
                foreach ($feedbackDet as $feedback) {
                    $donorIds[] = $feedback['DonorID'];
                  }
                 //print_r($donorIds);die();
                //print_r($feedbackDet)[0];die();
                $donorName=$this->model->getdonorName($donorIds);
                // print_r($feedbackDet);
                // print_r($donorName);die();
                $data = [];

                for($i=0;$i<count($donorName);$i++){
                    $data[$i]['Fullname'] = $donorName[$i][0]['Fullname'];
                    $data[$i]['UserID'] = $donorName[$i][0]['UserID'];
                    
                    foreach($feedbackDet as $f){
                        if($f['DonorID']==$donorName[$i][0]['UserID']){
                            $data[$i]['Feedback'] = $f['Feedback'];
                            $data[$i]['Date'] = $f['Date'];
                        }
                    }
                }

                $_SESSION['feedbacks'] = $data;
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

                $_SESSION['timeslots'] = $this->model->getSlotIDs($campid);
                $_SESSION['slots'] = $this->model->getSlotDetails( $_SESSION['timeslots']);
                //print_r($_SESSION['slots']);die();
                $_SESSION['rowCount']=count($_SESSION['slots']);
                
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
            //echo $campid;
            $allTimeslots=$this->model->getAllTimeslots();
            //print_r($allTimeslots);die();
            $_SESSION['rowCount']=count($allTimeslots);
            //remove the timeslots that are already scheduled 
            $scheduledTimeslots=$this->model->getScheduledTimeslots($campid);
            //print_r($scheduledTimeslots);die();
            
            //print_r($allTimeslots);die();
            $temp=$allTimeslots;
            if(!empty($scheduledTimeslots)){
                //print_r("awa");die();
                for($i=0;$i<count($scheduledTimeslots);$i++){
                    for($j=0;$j<count($allTimeslots);$j++){
                        
                        if($scheduledTimeslots[$i]['SlotID']==$allTimeslots[$j]['SlotID']){
                            unset($temp[$j]);
                            //unset($_SESSION['allTimeslots'][$j]);
                           // print_r($allTimeslots);
                        }
                    }
                }
            }
            //print_r($temp);die();
            
                //print_r($temp);die();
                $_SESSION['allTimeslots']=$temp;
            if(empty($_SESSION['allTimeslots'])){
                $_SESSION['rowCount']=0;
            }
            else{
                $_SESSION['rowCount']=count($_SESSION['allTimeslots']);
            }
                //print_r($_SESSION['allTimeslots']);die();
                //$_SESSION['rowCount']=count($temp);
            
            //unset($_SESSION['allTimeslots']);
            //print_r($temp);die();
           
                //$_SESSION['allTimeslots']=$temp;
              
            
            
            //print_r($_SESSION['allTimeslots']);die();

            
            $this->view->render('organization/scheduleTimeslots');
        } else {
            $this->view->render('authentication/organizationlogin');
        } 
    } 

    
    
    

    function add_timeslot_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/add_timeslot_successful');
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
                        //print_r($_SESSION['timeslots']);die();
                        /* $Start_time=$slotDet[0]['Start_time'];
                        print_r($Start_time);die();
                        $End_time=$slotDet[0]['End_time'];
                        print_r($End_time);die(); */
                    }
                }
                 
                //print_r($_SESSION['timeslots']);die();
                
                

            
                
                //print_r($End_time);die();
                //$_SESSION['timeslots']=$this->model->getSlotDetails($_SESSION['timeslots']);
                
                //print_r($_SESSION['timeslots']);die();
                
                    
                
                
                
                $this->view->render('organization/camps_view_Timeslots');
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
                //print_r($camp_info);die(); 
                $_SESSION['campaign_array'] = $camp_info; 
                $slotids = $this->model->getSlotIDs($campid);
                //print_r($slotids);die();
                $x=sizeof($slotids);
                //print_r($x);die();
                if(!empty($slotids)){
                    for($i=0;$i<$x;$i++){
                        $slotid=$slotids[$i]['SlotID'];
    
                        //print($slotid);
                        $_SESSION['timeslots'][$i]=$this->model->getSlotDetails($slotid);
                        //print_r($_SESSION['timeslots']);die();
                        /* $Start_time=$slotDet[0]['Start_time'];
                        print_r($Start_time);die();
                        $End_time=$slotDet[0]['End_time'];
                        print_r($End_time);die(); */
                    } 
                    $_SESSION['rowCount']=count($_SESSION['timeslots']);
                }
                else{
                    $_SESSION['timeslots']=null;
                    $_SESSION['rowCount']=0;
                }
                /*for($i=0;$i<$x;$i++){
                    $slotid=$slotids[$i]['SlotID'];

                    //print($slotid);die();
                    $data[$i]=$this->model->getSlotDetails($slotid);
                    //print_r($_SESSION['timeslots']);die();
                    /* $Start_time=$slotDet[0]['Start_time'];
                    print_r($Start_time);die();
                    $End_time=$slotDet[0]['End_time'];
                    print_r($End_time);die(); */
                
                //print_r($_SESSION['timeslots']);die();
                
                

            
                
                //print_r($End_time);die();
                //$_SESSION['timeslots']=$this->model->getSlotDetails($_SESSION['timeslots']);
                
                //print_r($_SESSION['timeslots']);die();
                
                    
                
                
                //$_SESSION['timeslots']=$data;
                //print_r(sizeof($_SESSION['timeslots']));die();
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

    function viewInstructions()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/instructions');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }
    function viewAdvertisements()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $AdID = $this->model->getadvertisementIDs();
                //$inventoryCat=$this->model->getInventoryCat();
                //print_r($AdID);die();
                //get all details from advertisement table from $_SESSION['AdID']
                $x=sizeof($AdID);
                //print_r($x);die();
                for($i=0;$i<$x;$i++){
                    $adid=$AdID[$i]['AdvertisementID'];
                    
                    //print_r($adid);
                    //print_r($i);
                    $AdDetails[$i]=$this->model->getAdvertisements($adid);
                    //$bloodbankName[$i]=$this->model->getBloodbankName($AdDetails);
                    //print_r($_SESSION['advertisements']);die();
                }
                for($i=0;$i<$x;$i++){
                    $adid=$AdID[$i]['AdvertisementID'];
                    
                    //print_r($adid);
                    //print_r($i);
                    $inventoryCat[$i]=$this->model->getInventoryCatToAd($adid);
                    //$bloodbankName[$i]=$this->model->getBloodbankName($AdDetails);
                    //print_r($_SESSION['advertisements']);die();
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
                    $data[$i]['BloodBank_Name'] = $bloodbankName[$i][0]['BloodBank_Name'];
                    $data[$i]['Advertisement_pic'] = $AdDetails[$i][0]['Advertisement_pic'];
                    $data[$i]['InventoryCategory'] = $inventoryCat[$i][0]['InventoryCategory'];
                    $data[$i]['AdvertisementID'] = $AdID[$i]['AdvertisementID'];
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

    function add_InventoryRequest()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/inventoryItems');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    /* function accommodation()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $itemType = 'Accommodation';
            $_SESSION['items'] = $this->model->getAccommodationItems($itemType);
            $this->view->render('organization/accommodation');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    } */

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

    /* function stationaryItems()
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
    } */

    function viewProfile()
    {
          
        if ($_SESSION['type'] == 'Organization/Society') {
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
            //print_r($_SESSION['Username']);die();
            $_SESSION['UserType'] = $_SESSION['user_details'][1][2];
            //print_r($_SESSION['UserType']);die();
            $_SESSION['user_pic'] = $_SESSION['user_details'][1][3];
            //print_r($_SESSION['user_pic']);die();
            $_SESSION['password'] = $_SESSION['user_details'][1][4];
            //print_r($_SESSION['password']);die();
            
            $_SESSION['telno'] = $_SESSION['user_details'][2][0];
            $this->view->render('organization/profile');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function editDetails()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $user_pic = $this->model->getuserimg($_SESSION['User_ID']);
            $_SESSION['user_pic'] = $user_pic;
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
            $em = $_POST['em'];
            $Password = $_POST['newPw'];
            $user_pic = $filename;
            
            if(empty($Password)){
                $Password = $_SESSION['password'];
            }else{
                $Password = password_hash($_POST['newPw'], PASSWORD_DEFAULT);
            }

            $inputs1 = [$em, $Password, $orgName,$user_pic];
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

    function donateCash()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
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
    

    function view_donors(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $campid = $_SESSION['campaign_array'][0];
                
                
                


                $slotid=intval($_GET['slot']);
                //print_r($_GET['slot']);die();
                //print_r($campid);die();
                $_SESSION['donorList']=$this->model->getDonorList($campid,$slotid);
                    /* print_r($res);die();
                    for($i=0;$i<sizeof($res);$i++){
                        $_SESSION['donorList'][$i]=$res[$i]['Fullname'];
                    }
                     */
                   // $donorList=$res[0]['Fullname'];
                   //print_r($_SESSION['donorList']);die();
                    $this->view->render('organization/viewDonorsList');
                    
                    exit;
                
            }
        }
    
    }

    function addTimeslot(){
        if ($_SESSION['type'] == 'Organization/Society') {
            
            $_SESSION['slotid']=intval($_GET['timeSlot']);
            //print_r($_SESSION['slotid']);die();

        }

        if ($this->model->addSlot($_SESSION['slotid'],$_SESSION['campaignId'])) {
            //print_r('awa');die();

            header('Location: /requestApproval/add_slot_successfully');
        }
    }

    function add_slot_successfully(){
        //print_r('awa');die();
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/add_slot_successfully');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    /* function removeTimeslot(){
       $_SESSION['slotid']=intval($_GET['timeSlot']);
            //print_r($_SESSION['slotid']);die();
        //$_SESSION['campaignId']=intval($_GET['campaignId']);
            //print_r($_SESSION['slotid']);die();
            $_SESSION['campaignSlots']=$this->model->getSlots($_SESSION['campaignId']);
        if ($this->model->removeSlot($_SESSION['campaignSlots'])) {
            //print_r('awa');die();

            header('Location: /requestApproval/remove_slot_successfully');
        }
    } */
    function removeTimeslot(){
        if ($_SESSION['type'] == 'Organization/Society') {
            
            $_SESSION['slotid']=intval($_GET['timeSlot']);
            //print_r($_SESSION['slotid']);die();
            

        }
        //print_r($_SESSION['campaign_array'][0]);die();
        $this->model->removeSlot($_SESSION['slotid'],$_SESSION['campaign_array'][0]);
        $data=$this->model->getSlots($_SESSION['campaign_array'][0]);

            //print_r('awa');die();
            //print_r(count($data));die();
            //print_r(count($data));die();
            $_SESSION['rowCount']=count($data);
            //print_r($_SESSION['rowCount']);die();

            header('Location: /requestApproval/remove_slot_successfully');
        
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
    

}

?>
