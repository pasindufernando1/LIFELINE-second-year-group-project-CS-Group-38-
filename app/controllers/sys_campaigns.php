<?php
session_start();

class Sys_campaigns extends Controller
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
                $camp = $this ->model -> getCamp($blood_bank_id);
                $_SESSION['camp'] = $camp;

                if(isset($_GET['filtered'])){
                    $_SESSION['camp'] =$_SESSION['filtered_camp'] ;
                }
                
                 if(isset($_POST['filter'])){
                    $start = $_POST['start'];
                    $end = $_POST['end'];
                    $status = $_POST['status'];
                    $output = array();
                    
                    $rows = $this->model->getfiltertype($blood_bank_id,$status,$start,$end);
                    $output = array_merge($output,$rows);
                
                    $_SESSION['camp'] = $output;
                

                }
                $this->view->render('systemuser/campaigns/campaigns');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    

    function view($id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                
                $campaign = $this -> model -> get_camp_info($id);
                $adcount = $this -> model -> get_ad_count($id);
                if($adcount != 0){
                    $adid = $this -> model -> get_ad_id($id);
                    $addet = $this -> model -> get_ad_det($adid);
                    // print_r($addet);die();
                    $_SESSION['addet']= $addet;
                }
                
                //print_r($adcount);die();
                $_SESSION['adcount'] = $adcount;
                $_SESSION['campaign'] = $campaign;
                $this->view->render('systemuser/campaigns/campaigns_view');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }       

    function storead($cid)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']); 
                // print_r($_FILES);die();
                $targetDir = "C:/xampp/htdocs/public/img/adv/"; 
                $allowTypes = array('jpg','png','jpeg','gif'); 
                $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
                $fileNames = array_filter($_FILES['fileimg']['name']);

                $cur_date = date("Y-m-d");
                $des = $_POST['Description'];
                
                $ad_id = $this -> model -> addadvert($cur_date,$des,$blood_bank_id,$fileNames[0]);
                $res = $this -> model ->updatead($cid,$ad_id);
                if(!empty($fileNames)){ 
                    foreach($_FILES['fileimg']['name'] as $key=>$val){ 
                        // File upload path 
                        $fileName = basename($_FILES['fileimg']['name'][$key]); 
                        $targetFilePath = $targetDir . $fileName; 
                        
                        // Check whether file type is valid 
                        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                        if(in_array($fileType, $allowTypes)){ 
                            // Upload file to server 
                            if(move_uploaded_file($_FILES["fileimg"]["tmp_name"][$key], $targetFilePath)){ 
                                // Image db insert sql 
                                $insertValuesSQL .= "('".$fileName."', NOW()),"; 
                            }else{ 
                                $errorUpload .= $_FILES['fileimg']['name'][$key].' | '; 
                            } 
                        }else{ 
                            $errorUploadType .= $_FILES['fileimg']['name'][$key].' | '; 
                        } 
                    } 
            }
            header("Location: /sys_campaigns?page=1");
        }
        else{
            $this->view->render('authentication/login');
        }
    }
    }

    function add_donation()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/campaigns/add_donation');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function store_donation($id)
    {
        
        if ($_SESSION['type'] == "System User") {
            if (!isset($_POST['add-donation'])) {
                header("Location: /sys_campaigns?page=1");
                exit;
            }
            $badges = $this ->model -> getAllBadges();
            $countbadge = count($badges);
            $donationcount = $this-> model -> getDonationCount($_POST['nic']);
            $donationcount = $donationcount +1;
            $donor_id = $this->model->getDonorID($_POST['nic']);

            
            for ($k=0; $k < $countbadge; $k++) { 
                
                if ($donationcount >= $badges[$k]['Donation_Constraint']) {
                    $donorBadgeCount = $this ->model -> getDonorBadgeCount($_POST['nic']);
                    if ($donorBadgeCount == 0) {
                        $res = $this->model->insertDonorBadge($donor_id,$badges[$k]['BadgeID']);
                    }
                    else {
                        $res = $this->model->updateDonorBadge($donor_id,$badges[$k]['BadgeID']);
                    }
            
                }
                
            }
            

            $nic = $_POST['nic'];

            date_default_timezone_set("Asia/Calcutta");
            $date = date('Y-m-d');
            

            if(isset($_POST['comp'])){
                $comp = $_POST['comp'];
            }else
            {
                $comp = "";
            }
            
            $status = 1;

            $bloodtype = $this ->model -> getDonorbloodtype($nic);
            
            
            $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']);
            $donorID = $this ->model -> getDonorID($nic);
            
            $packID = $this ->model -> getMaxID();
            $nextID = $packID +1;

            $subtype = "RBC";
            $bloodtypeid = $this ->model -> getDonorbloodtypeID($bloodtype,$subtype);
            $inputs1 = array($nextID,$subtype,$status, $bloodtypeid,$blood_bank_id);
            $packetID = $this->model->addpacket($inputs1);

            $subtype = "WBC";
            $bloodtypeid = $this ->model -> getDonorbloodtypeID($bloodtype,$subtype);
            $inputs1 = array($nextID,$subtype,$status, $bloodtypeid,$blood_bank_id);
            $packetID = $this->model->addpacket($inputs1);

            $subtype = "Platelet";
            $bloodtypeid = $this ->model -> getDonorbloodtypeID($bloodtype,$subtype);
            $inputs1 = array($nextID,$subtype,$status, $bloodtypeid,$blood_bank_id);
            $packetID = $this->model->addpacket($inputs1);

            $subtype = "Plasma";
            $bloodtypeid = $this ->model -> getDonorbloodtypeID($bloodtype,$subtype);
            $inputs1 = array($nextID,$subtype,$status, $bloodtypeid,$blood_bank_id);
            $packetID = $this->model->addpacket($inputs1);
            
            $inputs2 = array($donorID, $blood_bank_id,$nextID,$date,$comp);
            $inputs3 = array($donorID,$id,$nextID,$date,$comp);
            

            if($this->model->adddonation($inputs2)){
                if ($this->model->adddonationcamp($inputs3)) {
                    header("Location: /sys_campaigns/add_donation/".$id."");
                }
            }
                
            
        }
    }

    function accept($id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $res = $this -> model -> acceptcamp($id);
                if ($res) {
                    header("Location: /sys_campaigns?page=1");
                    exit;
                }
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function deletead($id,$aid)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $res = $this -> model -> deleteadv($id);
                $res2 = $this -> model -> acheiveadv($aid);
                if ($res && $res2) {
                    header("Location: /sys_campaigns/view/".$id."");
                    exit;
                }
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

}