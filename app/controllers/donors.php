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
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['donors'] = $this->model->getAllDonorDetails();
                // print_r($_SESSION['inventory']);die();
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

