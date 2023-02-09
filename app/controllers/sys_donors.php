<?php
session_start();

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

    function donation()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
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
                $this->view->render('systemuser/donors/donation_add');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
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

    

    

}