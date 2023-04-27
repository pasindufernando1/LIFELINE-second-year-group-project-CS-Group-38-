<?php
session_start();
// require_once 'C:/xampp/htdocs/vendor/autoload.php'; 
// use Dompdf\Adapter\CPDF;      
// use \Mpdf\Mpdf;
// use Dompdf\Exception;
// $mpdf = new \Mpdf\Mpdf();

class Sys_donors extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $_SESSION['donors'] = $this->model->getAllDonorDetailsJoin();

                if(isset($_GET['filtered'])){
                    $_SESSION['donors'] =$_SESSION['filtered_donors'] ;
                }

                if(isset($_POST['filter'])){
                            if(isset($_POST['all_type'])){
                                $output = $this->model->getAllDonorDetails();
                                $_SESSION['donors'] = $output;
                                $this->view->render('systemuser/donors/donor');
                                exit;
                            }
                            $output = array();
                            if(!empty($_POST['nic'])){
                                $nic = $_POST['nic'];
                                $rows = $this->model->getFilteredDonorDetailsNIC($nic);
                                $output = array_merge($output, $rows);
                                $_SESSION['donors'] = $output;
                                $this->view->render('systemuser/donors/donor');
                                exit;
                            }

                            $flag_category = 0;
                            $district_flag = 0;
                            //If a district is selected
                            for($i=10;$i<35;$i++){
                                if(isset($_POST[$i])){
                                    $district_flag = 1;
                                    for($j=0;$j<8;$j++){
                                        $flag_category = 1;
                                        if(isset($_POST[$j])){
                                            $rows = $this->model->getFilteredDonorDetails_District_BloodCategory($_POST[$i], $_POST[$j]);
                                            $output = array_merge($output, $rows);
                                        }
                                    }
                                }
                                
                            }
                            $_SESSION['donors'] = $output;
                            
                            //If a single blood category is not selected
                            if($flag_category==0){
                                for($i=10;$i<35;$i++){
                                    if(isset($_POST[$i])){
                                        $rows = $this->model->getFilteredDonorDetails_District($_POST[$i]);
                                        $output = array_merge($output, $rows);
                                    }
                                    
                                }
                                
                            }

                            //If no district is selected
                            if($district_flag==0){
                                for($i=0;$i<8;$i++){
                                    if(isset($_POST[$i])){
                                        $rows = $this->model->getFilteredDonorDetails_BloodCategory($_POST[$i]);
                                        $output = array_merge($output, $rows);
                                    }
                                }
                                
                            }
                            $_SESSION['donors'] = $output;
                            $this->view->render('systemuser/donors/donor');
                           
                            
                        
                        
                        
                    }
                $this->view->render('systemuser/donors/donor');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    
    function add_donor()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/donors/donor_add');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function edit_donor($id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $_SESSION['donor_id'] = $id;
                $_SESSION['donor_det'] = $this ->model -> getDonorDetails($id);
                
                $this->view->render('systemuser/donors/donor_edit');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function storeDonor()
    {
        if ($_SESSION['type'] == "System User") {
            if (!isset($_POST['add-donor'])) {
                header("Location: /sys_donors/add_donor");
                exit;
            }
            
            $Full_name = $_POST['name'];
            $NIC = $_POST['nic'];
            $Gender = $_POST['gender'];
            $DOB = $_POST['dob'];
            $Blood_type = $_POST['bloodtype'];
            $Number = $_POST['number'];
            $LaneName = $_POST['lane'];
            $City = $_POST['city'];
            $District = $_POST['district'];
            $Province = $_POST['province'];
            $Donor_card = 'default_image';
            $Email = $_POST['email'];
            $ContactNumber = $_POST['contact'];
            $Username = $_POST['uname'];
            $Userpic = 'default-path';
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']);
            
            

            // $inputs = array($Name, $Registration_no, $Status, $Number, $LaneName, $City, $District, $Province, $Email, $ContactNumber, $Username, $UserID, $Password);

            $inputs1 = array($Email, $Password, $Username, $Userpic, 'Donor');
            $inputs2 = array($Full_name, $NIC,$DOB,$Gender,$Blood_type, $Number, $LaneName, $City, $District, $Province,$Donor_card,$blood_bank_id);
            $inputs3 = array($ContactNumber);


            if ($this->model->addDonor($inputs1, $inputs2, $inputs3)) {
                header("Location: /reservation/add_reservation_successful");
            }
            
        }
    }

    

    function donation()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $BloodBankID = $this ->model -> getBloodBankid($_SESSION['useremail']);
                $_SESSION['donations'] = $this ->model -> getAllDonations($BloodBankID);
                
                if(isset($_GET['filtered'])){
                    $_SESSION['donations'] =$_SESSION['filtered_donations'] ;
                }

                if(isset($_POST['filter'])){
                    $start = $_POST['start'];
                    $end = $_POST['end'];
                    $output = array();
                    for ($i=0; $i < 8 ; $i++) { 
                        if(isset($_POST[$i])){
                                $rows = $this->model->getfilterdon($_POST[$i],$BloodBankID,$start,$end);
                                $output = array_merge($output,$rows);
                        }
                    }
                
                    $_SESSION['donations'] = $output;
                

                }

                $this->view->render('systemuser/donors/donation');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function add_donation()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $_SESSION['Donor_dets'] = $this->model->getAllDonorDetails();
                $this->view->render('systemuser/donors/donation_add');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }
    
    function store_Donation()
    {
        if ($_SESSION['type'] == "System User") {
            if (!isset($_POST['add-donation'])) {
                header("Location: /sys_donors/add_donation");
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
            

            if($this->model->adddonation($inputs2)){
                header("Location: /sys_donors/donation?page=1");
            }
                
            
        }
    }

    function addDonor()
    {
        if ($_SESSION['type'] == "System User") {
            if (!isset($_POST['add-donor'])) {
                header("Location: /sys_donors/add_donor");
                exit;
            }

            $Full_name = $_POST['name'];
            $NIC = $_POST['nic'];
            $DOB = $_POST['dob'];
            $Blood_type = $_POST['bloodtype'];
            $Number = $_POST['number'];
            $LaneName = $_POST['lane'];
            $City = $_POST['city'];
            $District = $_POST['district'];
            $Province = $_POST['province'];
            $Donor_card = 'default_image';
            $Email = $_POST['email'];
            $ContactNumber = $_POST['contact'];
            $Username = $_POST['uname'];
            $Userpic = 'default-path';
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // $inputs = array($Name, $Registration_no, $Status, $Number, $LaneName, $City, $District, $Province, $Email, $ContactNumber, $Username, $UserID, $Password);

            $inputs1 = array($Email, $Password, $Username, $Userpic, 'Donor');
            $inputs2 = array($Full_name, $NIC,$DOB,$Blood_type, $Number, $LaneName, $City, $District, $Province,$Donor_card);
            $inputs3 = array($ContactNumber);


            if ($this->model->addDonor($inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/add_donor_successful");
            }
            
        }
    }

    function updateDonor($id)
    {
        if ($_SESSION['type'] == "System User") {
            if (!isset($_POST['add-donor'])) {
                header("Location: /sys_donors?page=1");
                exit;
            }
            
            $Full_name = $_POST['name'];
            $NIC = $_POST['nic'];
            $Gender = $_POST['gender'];
            $DOB = $_POST['dob'];
            $Blood_type = $_POST['bloodtype'];
            $Number = $_POST['number'];
            $LaneName = $_POST['lane'];
            $City = $_POST['city'];
            $District = $_POST['district'];
            $Province = $_POST['province'];
            $Donor_card = 'default_image';
            $Email = $_POST['email'];
            $ContactNumber = $_POST['contact'];
        
            
            
            
            
            

            // $inputs = array($Name, $Registration_no, $Status, $Number, $LaneName, $City, $District, $Province, $Email, $ContactNumber, $Username, $UserID, $Password);

            $inputs1 = array($Email);
            $inputs2 = array($Full_name, $NIC,$DOB,$Gender,$Blood_type, $Number, $LaneName, $City, $District, $Province);
            $inputs3 = array($ContactNumber);


            if ($this->model->editDonor($id,$inputs1, $inputs2, $inputs3)) {
                header("Location: /reservation/add_reservation_successful");
            }
            
        }
    }

    function view_donor($donorID)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $_SESSION['Donor_det'] = $this->model->getDonorDetails($donorID);
                $_SESSION['Donor_badge'] = $this->model->getDonorBadge($donorID);
                $_SESSION['Past_donations'] = $this->model->getPastDonations($donorID);
                 //print_r($_SESSION['Past_donations']);die();
                $this->view->render('systemuser/donors/donor_view');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function card_upload()
    {
        $target_dir = "C:/xampp/htdocs/public/img/donor-cards/";
        $file_upload = false;
        $imagedata = base64_decode($_POST['imgdata']);
        $filename = md5(uniqid(rand(), true));
        //path where you want to upload image
        $file = $_SERVER['DOCUMENT_ROOT'] . '/public/img/donor-card/'.$filename.'.png';
        print_r($file);
        file_put_contents($file,$imagedata);

        $img = $filename.'.png';

        $res= $this->model->updateDonorCard($_SESSION['Donor_det'][0]['UserID'],$img);
        
    }
    

    

}