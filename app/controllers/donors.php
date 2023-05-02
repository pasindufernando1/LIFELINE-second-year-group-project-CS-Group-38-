<?php
session_start();

class Donors extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/donors');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    //Get the  donors
    function type()
    {
        if (isset($_SESSION['login'])) {
            //To check whether a filter is applied
            if(isset($_GET['filter'])){
                $is_filtered = $_GET['filter'];
            }else{
                $is_filtered = false;
            }
            if ($_SESSION['type'] == "Admin") {
                if(!isset($_POST['filter']) && !$is_filtered){
                    $_SESSION['is_filtered'] = false;
                    $_SESSION['donors'] = $this->model->getAllDonorDetails();
                    $this->view->render('admin/donors');
                    exit;
                }
                if(isset($_POST['filter'])){
                    if(isset($_POST['all_type'])){
                        
                        $_SESSION['is_filtered'] = true;
                        $_SESSION['donors'] = $this->model->getAllDonorDetails();
                        $this->view->render('admin/donors');
                        exit;
                    }
                    $output = array();
                    $_SESSION['is_filtered'] = true;
                    if(!empty($_POST['nic'])){
                        $nic = $_POST['nic'];
                        $rows = $this->model->getFilteredDonorDetailsNIC($nic);
                        $output = array_merge($output, $rows);
                        $_SESSION['donors'] = $output;
                        $this->view->render('admin/donors');
                        exit;
                    }

                    $flag_category = 0;
                    $district_flag = 0;
                    //If a district is selected
                    for($i=10;$i<35;$i++){
                        if(isset($_POST[$i])){
                            $district_flag = 1;
                            for($j=0;$j<8;$j++){
                                if(isset($_POST[$j])){
                                    $flag_category = 1;
                                    $rows = $this->model->getFilteredDonorDetails_District_BloodCategory($_POST[$i], $_POST[$j]);
                                    $output = array_merge($output, $rows);
                                }
                            }
                        }
                        
                    }
                    
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
                    elseif($district_flag==0){
                        for($i=0;$i<8;$i++){
                            if(isset($_POST[$i])){
                                $rows = $this->model->getFilteredDonorDetails_BloodCategory($_POST[$i]);
                                $output = array_merge($output, $rows);
                            }
                        }
                        
                    }
                    $_SESSION['donors'] = $output;
                    
                }
                $this->view->render('admin/donors');
                exit;
                
                
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }    
    }

    function addDonoruser()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/addnewDonor');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    function addDonor()
    {
        if ($_SESSION['type'] == "Admin") {
            if (!isset($_POST['add-donor'])) {
                header("Location: /usermanage/addDonoruser");
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

            // $inputs = array($Name, $Registration_no, $Status, $Number, $LaneName, $City, $District, $Province, $Email, $ContactNumber, $Username, $UserID, $Password);

            $inputs1 = array($Email, $Password, $Username, $Userpic, 'Donor');
            $inputs2 = array($Full_name, $NIC,$Gender,$DOB,$Blood_type, $Number, $LaneName, $City, $District, $Province,$Donor_card);
            $inputs3 = array($ContactNumber);


            if ($this->model->addDonor($inputs1, $inputs2, $inputs3)) {
                header("Location: /donors/add_donor_successful");
            }
            
        }
    }

    function add_donor_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/add_donor_successful_donor');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    function view_user($user_id){
        if (isset($_SESSION['login'])) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_details'] = $this->model->getDonorDetails($user_id);
                $_SESSION['Name'] = $_SESSION['user_details'][0]['Fullname'];
                $_SESSION['NIC'] = $_SESSION['user_details'][0]['NIC'];
                $_SESSION['Gender'] = $_SESSION['user_details'][0]['Gender'];
                $_SESSION['DOB'] = $_SESSION['user_details'][0]['DOB'];
                $_SESSION['Bloodtype'] = $_SESSION['user_details'][0]['BloodType'];
                $_SESSION['Number'] = $_SESSION['user_details'][0]['Number'];
                $_SESSION['LaneName'] = $_SESSION['user_details'][0]['LaneName'];
                $_SESSION['City'] = $_SESSION['user_details'][0]['City'];
                $_SESSION['District'] = $_SESSION['user_details'][0]['District'];
                $_SESSION['Province'] = $_SESSION['user_details'][0]['Province'];
                $_SESSION['Donorcard'] = $_SESSION['user_details'][0]['DonorCard_Img'];
                $_SESSION['SlotID'] = $_SESSION['user_details'][0]['SlotID'];
                $_SESSION['CampaignID'] = $_SESSION['user_details'][0]['CampaignID'];
                $_SESSION['Email'] = $_SESSION['user_details'][1]['Email'];
                $_SESSION['Username'] = $_SESSION['user_details'][1]['Username'];
                $_SESSION['Password'] = $_SESSION['user_details'][1]['Password'];
                $_SESSION['Contact_no'] = $_SESSION['user_details'][2]['ContactNumber'];
                $this->view->render('admin/viewDonor_donor');
                exit;
            
        }
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    
    



    
}

