<?php
session_start();

class Usermanage extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/usermanage');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render add blood bank page
    function addbloodbank()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/addBloodBank');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }
    
    // Function to render adduser type select page
    function adduser()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/addUserTypeSelect');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render add Hospital/Medical Center page
    function addHosMeduser()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/addHospitalMedicalCenter');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render add Organization/Society page
    function addOrgSocuser()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/addOrganizationSociety');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render add Donor page
    function addDonoruser()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/addDonor');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render add System User page
    function addSysuser()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['bloodbanks']  = $this->model->getBloodBankName();
                //print_r($_SESSION['bloodbanks']['BloodBankID']);die();
                $this->view->render('admin/addSystemUser');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render add Admin User page
    function addAdminUser()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/addAdminUser');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render user manage page
    function add()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/usermanage');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }  
    }

    //Function to handle adding Hospital/Medical Center 
    function addHospitalMedCenter()
    {
        if ($_SESSION['type'] == "Admin") {
            if (!isset($_POST['add-hosmed'])) {
                header("Location: /usermanage/addHosMeduser");
                exit;
            }

            $Name = $_POST['name'];
            $Registration_no = $_POST['regno'];
            $Status = $_POST['status'];
            $Number = $_POST['number'];
            $LaneName = $_POST['lane'];
            $City = $_POST['city'];
            $District = $_POST['district'];
            $Province = $_POST['province'];
            $Email = $_POST['email'];
            $ContactNumber = $_POST['contact'];
            $Username = $_POST['uname'];
            $Userpic = 'default_hospital.png';
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);


            $inputs1 = array($Email, $Password, $Username, $Userpic, 'Hospital/Medical_Center');
            $inputs2 = array($Registration_no, $Name, $Number, $LaneName, $City, $District, $Province, $Status);
            $inputs3 = array($ContactNumber);


            if ($this->model->addHospitalMedCenter($inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/add_hosmed_successful");
            }
            
        }
    }

    //Function to handle adding Organization/Society
    function addOrganizationSociety()
    {
        if ($_SESSION['type'] == "Admin") {
            if (!isset($_POST['add-orgsoc'])) {
                header("Location: /usermanage/addOrgSocuser");
                exit;
            }

            $Name = $_POST['name'];
            $Registration_no = $_POST['regno'];
            $Number = $_POST['number'];
            $LaneName = $_POST['lane'];
            $City = $_POST['city'];
            $District = $_POST['district'];
            $Province = $_POST['province'];
            $Email = $_POST['email'];
            $ContactNumber = $_POST['contact'];
            $Username = $_POST['uname'];
            $Userpic = 'default_orgsoc.png';
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // $inputs = array($Name, $Registration_no, $Status, $Number, $LaneName, $City, $District, $Province, $Email, $ContactNumber, $Username, $UserID, $Password);

            $inputs1 = array($Email, $Password, $Username, $Userpic, 'Organization/Society');
            $inputs2 = array($Registration_no, $Name, $Number, $LaneName, $City, $District, $Province);
            $inputs3 = array($ContactNumber);


            if ($this->model->addOrganizationSociety($inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/add_orgsoc_successful");
            }
            
        }
    }

    //Function to handle adding Donor
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
            $Userpic = 'default_donor.png';
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // $inputs = array($Name, $Registration_no, $Status, $Number, $LaneName, $City, $District, $Province, $Email, $ContactNumber, $Username, $UserID, $Password);

            $inputs1 = array($Email, $Password, $Username, $Userpic, 'Donor');
            $inputs2 = array($Full_name, $NIC,$Gender,$DOB,$Blood_type, $Number, $LaneName, $City, $District, $Province,$Donor_card);
            $inputs3 = array($ContactNumber);


            if ($this->model->addDonor($inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/add_donor_successful");
            }
            
        }
    }

    //Function to handle adding System User
    function addSystemUser()
    {
        if ($_SESSION['type'] == "Admin") {
            if (!isset($_POST['add-systemuser'])) {
                header("Location: /usermanage/addSysuser");
                exit;
            }

            $BloodBankID = $_POST['bloodbankid'];
            $NIC = $_POST['nic'];
            $Full_name = $_POST['fullname'];
            $Email = $_POST['email'];
            $ContactNumber = $_POST['contact'];
            $Username = $_POST['uname'];
            $Userpic = 'default_user.png';
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // $inputs = array($Name, $Registration_no, $Status, $Number, $LaneName, $City, $District, $Province, $Email, $ContactNumber, $Username, $UserID, $Password);

            $inputs1 = array($Email, $Password, $Username, $Userpic, 'System User');
            $inputs2 = array($Full_name,$NIC,$BloodBankID);
            $inputs3 = array($ContactNumber);


            if ($this->model->addSystemUser($inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/add_systemuser_successful");
            }
            
        }
    }

    //Function to handle adding Admin
    function addnewAdmin()
    {
        if ($_SESSION['type'] == "Admin") {
            if (!isset($_POST['add-admin'])) {
                header("Location: /usermanage/addAdminUser");
                exit;
            }

            $Full_name = $_POST['fullname'];
            $Email = $_POST['email'];
            $ContactNumber = $_POST['contact'];
            $Username = $_POST['uname'];
            $Userpic = 'default_user.png';
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);


            $inputs1 = array($Email, $Password, $Username, $Userpic, 'Admin');
            $inputs2 = array($Full_name);
            $inputs3 = array($ContactNumber);

            if ($this->model->addAdmin($inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/add_admin_successful");
            }
        }
    }

    // Function to render add hospital/medical center successful page
    function add_hosmed_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/add_hosmed_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render add organization/society successful page
    function add_orgsoc_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/add_orgsoc_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render add donor successful page
    function add_donor_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/add_donor_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render add system user successful page
    function add_systemuser_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/add_systemuser_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render add admin successful page
    function add_admin_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/add_admin_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render the default all users page
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
                // If no filter is applied, get all users
                if(!isset($_POST['filter']) && !$is_filtered){
                    $_SESSION['is_filtered_user'] = false;
                    $_SESSION['users'] = $this->model->getAllUsers();
                    $this->view->render('admin/usermanage');
                    exit;
                }
                // If filter is applied, get filtered users
                if(isset($_POST['filter'])){
                    // If all the filtrations are removed, get all users
                    if(isset($_POST['all_type'])){
                        $_SESSION['is_filtered_user'] = true;
                        $_SESSION['users'] = $this->model->getAllUsers();
                        $this->view->render('admin/usermanage');
                        exit;
                    }
                    $output = array();
                    $_SESSION['is_filtered_user'] = true;
                    // checking if the user type is selected
                    for($i=0;$i<5;$i++){
                        if(isset($_POST[$i])){
                            $rows = $this->model->getFilteredUsers($_POST[$i]);
                            $output = array_merge($output,$rows);
                        }
                        
                    }
                    $_SESSION['users'] = $output;
                }
                $this->view->render('admin/usermanage');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }
            
        
    }

    //Blood banks manage
    function bloodbanks(){
        if (isset($_SESSION['login'])) {
            //To check whether a filter is applied
            if(isset($_GET['filter'])){
                $is_filtered = $_GET['filter'];
            }else{
                $is_filtered = false;
            }
            if ($_SESSION['type'] == "Admin") {
                // If no filter is applied, get all users
                if(!isset($_POST['filter']) && !$is_filtered){
                    $_SESSION['is_filtered_bank'] = false;
                    $_SESSION['bloodbanks'] = $this->model->getBloodBanks();
                    $this->view->render('admin/bloodbankmanage');
                    exit;
                }
                // If filter is applied, get filtered users
                if(isset($_POST['filter'])){
                    if(isset($_POST['all_type'])){
                        $_SESSION['is_filtered_bank'] = true;
                        $_SESSION['bloodbanks'] = $this->model->getBloodBanks();
                        $this->view->render('admin/bloodbankmanage');
                        exit;
                    }
                    $output = array();
                    $_SESSION['is_filtered_bank'] = true;
                    // checking if the province is selected
                    for($i=0;$i<9;$i++){
                        if(isset($_POST[$i])){
                            $rows = $this->model->getFilteredBanks($_POST[$i]);
                            $output = array_merge($output,$rows);
                        }
                        
                    }
                    $_SESSION['bloodbanks'] = $output;
                }
                $this->view->render('admin/bloodbankmanage');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }


    }

    // Deactivated users
    function deactivated_users(){
        if (isset($_SESSION['login'])) {
            //To check whether a filter is applied
            if(isset($_GET['filter'])){
                $is_filtered = $_GET['filter'];
            }else{
                $is_filtered = false;
            }
            if ($_SESSION['type'] == "Admin") {
                // If no filter is applied, get all users
                if(!isset($_POST['filter']) && !$is_filtered){
                    $_SESSION['is_filtered_user'] = false;
                    $_SESSION['users'] = $this->model->getDeactivatedUsers();
                    $this->view->render('admin/deactivated_usermanage');
                    exit;
                }
                // If filter is applied, get filtered users
                if(isset($_POST['filter'])){
                    // If all the filtrations are removed, get all users
                    if(isset($_POST['all_type'])){
                        $_SESSION['is_filtered_user'] = true;
                        $_SESSION['users'] = $this->model->getDeactivatedUsers();
                        $this->view->render('admin/deactivated_usermanage');
                        exit;
                    }
                    $output = array();
                    $_SESSION['is_filtered_user'] = true;
                    // checking if the user type is selected
                    for($i=0;$i<5;$i++){
                        if(isset($_POST[$i])){
                            $rows = $this->model->getFilteredDeactivatedUsers($_POST[$i]);
                            $output = array_merge($output,$rows);
                        }
                        
                    }
                    $_SESSION['users'] = $output;
                }
                $this->view->render('admin/deactivated_usermanage');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');  
        }
    }

    // Function to edit the user details
    function edit_user($user_id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_type'] = $this->model->getUserType($user_id);
                if($_SESSION['user_type'] == "Hospital/Medical_Center"){
                    $_SESSION['user_details'] = $this->model->getHosMedDetails($user_id);
                    //Get the hosmed details to variables
                    $_SESSION['Registration_no'] = $_SESSION['user_details'][0][1];
                    $_SESSION['Name'] = $_SESSION['user_details'][0][2];
                    $_SESSION['Number'] = $_SESSION['user_details'][0][3];
                    $_SESSION['LaneName'] = $_SESSION['user_details'][0][4];
                    $_SESSION['City'] = $_SESSION['user_details'][0][5];
                    $_SESSION['District'] = $_SESSION['user_details'][0][6];
                    $_SESSION['Province'] = $_SESSION['user_details'][0][7];
                    $_SESSION['Status'] = $_SESSION['user_details'][0][8];
                    $_SESSION['Email'] = $_SESSION['user_details'][1][0];
                    $_SESSION['Username'] = $_SESSION['user_details'][1][1];
                    $_SESSION['Password'] = $_SESSION['user_details'][1][2];
                    $_SESSION['Contact_no'] = $_SESSION['user_details'][2][0];
                    $this->view->render('admin/editHospitalMedicalCenter');
                    exit;
                }
                elseif($_SESSION['user_type'] == "Organization/Society"){
                    $_SESSION['user_details'] = $this->model->getOrgSocDetails($user_id);
                    // Get the orgsoc details to variables
                    $_SESSION['Registration_no'] = $_SESSION['user_details'][0]['Registration_no'];
                    $_SESSION['Name'] = $_SESSION['user_details'][0]['Name'];
                    $_SESSION['Number'] = $_SESSION['user_details'][0]['Number'];
                    $_SESSION['LaneName'] = $_SESSION['user_details'][0]['LaneName'];
                    $_SESSION['City'] = $_SESSION['user_details'][0]['City'];
                    $_SESSION['District'] = $_SESSION['user_details'][0]['District'];
                    $_SESSION['Province'] = $_SESSION['user_details'][0]['Province'];
                    $_SESSION['Email'] = $_SESSION['user_details'][1]['Email'];
                    $_SESSION['Username'] = $_SESSION['user_details'][1]['Username'];
                    $_SESSION['Password'] = $_SESSION['user_details'][1]['Password'];
                    $_SESSION['Contact_no'] = $_SESSION['user_details'][2]['ContactNumber'];
                    $this->view->render('admin/editOrganizationSociety');
                    exit;
                }
                elseif($_SESSION['user_type'] == "Donor"){
                    $_SESSION['user_details'] = $this->model->getDonorDetails($user_id);
                    // Get the donor details to variables
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
                    $_SESSION['Email'] = $_SESSION['user_details'][1]['Email'];
                    $_SESSION['Username'] = $_SESSION['user_details'][1]['Username'];
                    $_SESSION['Password'] = $_SESSION['user_details'][1]['Password'];
                    $_SESSION['Contact_no'] = $_SESSION['user_details'][2]['ContactNumber'];
                    $this->view->render('admin/editDonor');
                    exit;
                }
                elseif($_SESSION['user_type'] == "System User"){
                    $_SESSION['bloodbanks'] = $this->model->getBloodBankName();
                    $_SESSION['user_details'] = $this->model->getSystemUserDetails($user_id);
                    // Get the system user details to variables
                    $_SESSION['Name'] = $_SESSION['user_details'][0]['Fullname'];
                    $_SESSION['NIC'] = $_SESSION['user_details'][0]['NIC'];
                    $_SESSION['BloodBankID'] = $_SESSION['user_details'][0]['BloodBankID'];
                    $_SESSION['Email'] = $_SESSION['user_details'][1]['Email'];
                    $_SESSION['Username'] = $_SESSION['user_details'][1]['Username'];
                    $_SESSION['Password'] = $_SESSION['user_details'][1]['Password'];
                    $_SESSION['Contact_no'] = $_SESSION['user_details'][2]['ContactNumber'];
                    $this->view->render('admin/editSystemUser');
                    exit;
                }
                elseif($_SESSION['user_type'] == "Admin"){
                    $_SESSION['user_details'] = $this->model->getAdminDetails($user_id);
                    // Get the admin details to variables
                    $_SESSION['Name'] = $_SESSION['user_details'][0]['Fullname'];
                    $_SESSION['Email'] = $_SESSION['user_details'][1]['Email'];
                    $_SESSION['Username'] = $_SESSION['user_details'][1]['Username'];
                    $_SESSION['Password'] = $_SESSION['user_details'][1]['Password'];
                    $_SESSION['Contact_no'] = $_SESSION['user_details'][2]['ContactNumber'];
                    $this->view->render('admin/editAdmin');
                    exit;
                }
                
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to view the user details
    function view_user($user_id){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_type'] = $this->model->getUserType($user_id);
                if($_SESSION['user_type'] == "Hospital/Medical_Center"){
                    $_SESSION['user_details'] = $this->model->getHosMedDetails($user_id);
                    //Get the hosmed details to variables
                    $_SESSION['Registration_no'] = $_SESSION['user_details'][0][1];
                    $_SESSION['Name'] = $_SESSION['user_details'][0][2];
                    $_SESSION['Number'] = $_SESSION['user_details'][0][3];
                    $_SESSION['LaneName'] = $_SESSION['user_details'][0][4];
                    $_SESSION['City'] = $_SESSION['user_details'][0][5];
                    $_SESSION['District'] = $_SESSION['user_details'][0][6];
                    $_SESSION['Province'] = $_SESSION['user_details'][0][7];
                    $_SESSION['Status'] = $_SESSION['user_details'][0][8];
                    $_SESSION['Email'] = $_SESSION['user_details'][1][0];
                    $_SESSION['Username'] = $_SESSION['user_details'][1][1];
                    $_SESSION['Password'] = $_SESSION['user_details'][1][2];
                    $_SESSION['Contact_no'] = $_SESSION['user_details'][2][0];
                    $_SESSION['Userpic'] = $_SESSION['user_details'][1][3];
                    $this->view->render('admin/viewHospitalMedicalCenter');
                    exit;
                }
                elseif($_SESSION['user_type'] == "Organization/Society"){
                    $_SESSION['user_details'] = $this->model->getOrgSocDetails($user_id);
                    //Get the orgsoc details to variables
                    $_SESSION['Registration_no'] = $_SESSION['user_details'][0]['Registration_no'];
                    $_SESSION['Name'] = $_SESSION['user_details'][0]['Name'];
                    $_SESSION['Number'] = $_SESSION['user_details'][0]['Number'];
                    $_SESSION['LaneName'] = $_SESSION['user_details'][0]['LaneName'];
                    $_SESSION['City'] = $_SESSION['user_details'][0]['City'];
                    $_SESSION['District'] = $_SESSION['user_details'][0]['District'];
                    $_SESSION['Province'] = $_SESSION['user_details'][0]['Province'];
                    $_SESSION['Email'] = $_SESSION['user_details'][1]['Email'];
                    $_SESSION['Username'] = $_SESSION['user_details'][1]['Username'];
                    $_SESSION['Password'] = $_SESSION['user_details'][1]['Password'];
                    $_SESSION['Contact_no'] = $_SESSION['user_details'][2]['ContactNumber'];
                    $_SESSION['Userpic'] = $_SESSION['user_details'][1][3];
                    $this->view->render('admin/viewOrganizationSociety');
                    exit;
                }
                elseif($_SESSION['user_type'] == "Donor"){
                    $_SESSION['user_details'] = $this->model->getDonorDetails($user_id);
                    // Get the donor details to variables
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
                    $_SESSION['Email'] = $_SESSION['user_details'][1]['Email'];
                    $_SESSION['Username'] = $_SESSION['user_details'][1]['Username'];
                    $_SESSION['Password'] = $_SESSION['user_details'][1]['Password'];
                    $_SESSION['Contact_no'] = $_SESSION['user_details'][2]['ContactNumber'];
                    $_SESSION['Userpic'] = $_SESSION['user_details'][1][3];
                    $this->view->render('admin/viewDonor');
                    exit;
                }
                elseif($_SESSION['user_type'] == "System User"){
                    $_SESSION['user_details'] = $this->model->getSystemUserDetails($user_id);
                    // Get the system user details to variables
                    $_SESSION['Name'] = $_SESSION['user_details'][0]['Fullname'];
                    $_SESSION['NIC'] = $_SESSION['user_details'][0]['NIC'];
                    $_SESSION['BloodBankID'] = $_SESSION['user_details'][0]['BloodBankID'];
                    $_SESSION['BloodBankName'] = $_SESSION['BloodBankName'][0]['BloodBank_Name'];
                    $_SESSION['Email'] = $_SESSION['user_details'][1]['Email'];
                    $_SESSION['Username'] = $_SESSION['user_details'][1]['Username'];
                    $_SESSION['Password'] = $_SESSION['user_details'][1]['Password'];
                    $_SESSION['Contact_no'] = $_SESSION['user_details'][2]['ContactNumber'];
                    $_SESSION['Userpic'] = $_SESSION['user_details'][1][3];
                    $this->view->render('admin/viewSystemUser');
                    exit;
                }
                elseif($_SESSION['user_type'] == "Admin"){
                    $_SESSION['user_details'] = $this->model->getAdminDetails($user_id);
                    // Get the admin details to variables
                    $_SESSION['Name'] = $_SESSION['user_details'][0]['Fullname'];
                    $_SESSION['Email'] = $_SESSION['user_details'][1]['Email'];
                    $_SESSION['Username'] = $_SESSION['user_details'][1]['Username'];
                    $_SESSION['Password'] = $_SESSION['user_details'][1]['Password'];
                    $_SESSION['Contact_no'] = $_SESSION['user_details'][2]['ContactNumber'];
                    $_SESSION['Userpic'] = $_SESSION['user_details'][1][3];
                    $this->view->render('admin/viewAdmin');
                    exit;
                }
                
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render edit hospital/medical center successful page
    function edit_hosmed_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/edit_hosmed_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render edit orgsoc successful page
    function edit_orgsoc_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/edit_orgsoc_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render edit donor successful page
    function edit_donor_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/edit_donor_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }
    
    // Function to render edit system user successful page
    function edit_systemuser_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/edit_systemuser_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to render edit admin successful page
    function edit_admin_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/edit_admin_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to edit hospital/medical center
    function editHospitalMedCenter($user_id)
    {

        if ($_SESSION['type'] == "Admin") {
            if (!isset($_POST['update-hosmed'])) {
                header("Location: /usermanage/type?page=1");
                exit;
            }

            $Name = $_POST['name'];
            $Registration_no = $_POST['regno']; 
            $Status = $_POST['status']; 
            $Number = $_POST['number']; 
            $LaneName = $_POST['lane']; 
            $City = $_POST['city']; 
            $District = $_POST['district']; 
            $Province = $_POST['province']; 
            $Email = $_POST['email']; 
            $ContactNumber = $_POST['contact']; 
            $Username = $_POST['uname']; 
            $Password = $_POST['password'];
            if(empty($Password)){
                $Password = $_SESSION['Password'];
            }else{
                $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }
            $inputs1 = array($Email, $Password, $Username,'Hospital/Medical_Center');
            $inputs2 = array($Registration_no, $Name, $Number, $LaneName, $City, $District, $Province, $Status);
            $inputs3 = array($ContactNumber);

            if ($this->model->editHospitalMedCenter($user_id,$inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/edit_hosmed_successful");
            }
              
        }    
    }

    // Function to edit organization/society
    function editOrganizationSociety($user_id)
    {

        if ($_SESSION['type'] == "Admin") {
            if (!isset($_POST['update-orgsoc'])) {
                header("Location: /usermanage/type?page=1");
                exit;
            }

            $Name = $_POST['name']; 
            $Registration_no = $_POST['regno']; 
            $Number = $_POST['number']; 
            $LaneName = $_POST['lane']; 
            $City = $_POST['city']; 
            $District = $_POST['district']; 
            $Province = $_POST['province']; 
            $Email = $_POST['email']; 
            $ContactNumber = $_POST['contact']; 
            $Username = $_POST['uname']; 
            $Password = $_POST['password'];
            if(empty($Password)){
                $Password = $_SESSION['Password'];
            }else{
                $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }
            $inputs1 = array($Email, $Password, $Username,'Organization/Society');
            $inputs2 = array($Registration_no, $Name, $Number, $LaneName, $City, $District, $Province);
            $inputs3 = array($ContactNumber);

            if ($this->model->editOrganizationSociety($user_id,$inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/edit_orgsoc_successful");
            }
              
        }    
    }

    // Function to edit donor
    function editDonor($user_id)
    {

        if ($_SESSION['type'] == "Admin") {
            if (!isset($_POST['update-donor'])) {
                header("Location: /usermanage/type?page=1");
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
            $Password = $_POST['password'];
            if(empty($Password)){
                $Password = $_SESSION['Password'];
            }else{
                $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }
            $inputs1 = array($Email, $Password, $Username,'Donor');
            $inputs2 = array($Full_name, $NIC,$Gender,$DOB,$Blood_type, $Number, $LaneName, $City, $District, $Province,$Donor_card);
            $inputs3 = array($ContactNumber);

            if ($this->model->editDonor($user_id,$inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/edit_donor_successful");
            }   
        }    
    }

    // Function to edit system user
    function editSystemUser($user_id)
    {

        if ($_SESSION['type'] == "Admin") {
            if (!isset($_POST['edit-systemuser'])) {
                header("Location: /usermanage/type?page=1");
                exit;
            }

            $BloodBankID = $_POST['bloodbankid'];
            $NIC = $_POST['nic'];
            $Full_name = $_POST['fullname'];
            $Email = $_POST['email'];
            $ContactNumber = $_POST['contact'];
            $Username = $_POST['uname'];
            $Password = $_POST['password'];
            if(empty($Password)){
                $Password = $_SESSION['Password'];
            }else{
                $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }
            
            $inputs1 = array($Email, $Password, $Username,'System User');
            $inputs2 = array($Full_name,$NIC,$BloodBankID);
            $inputs3 = array($ContactNumber);

            if ($this->model->editSystemUser($user_id,$inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/edit_systemuser_successful");
            }
             
        }    
    }

    // Function to edit admin
    function editAdmin($user_id)
    {

        if ($_SESSION['type'] == "Admin") {
            if (!isset($_POST['edit-admin'])) {
                header("Location: /usermanage/type?page=1");
                exit;
            }

            $Full_name = $_POST['fullname'];
            $Email = $_POST['email'];
            $ContactNumber = $_POST['contact'];
            $Username = $_POST['uname'];
            $Password = $_POST['password'];
            if(empty($Password)){
                $Password = $_SESSION['Password'];
            }else{
                $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }

            $inputs1 = array($Email, $Password, $Username,'Admin');
            $inputs2 = array($Full_name);
            $inputs3 = array($ContactNumber);

            if ($this->model->editAdmin($user_id,$inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/edit_admin_successful");
            }
             
        }    
    }

    // Function to delete user
    function delete_user($user_id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_type'] = $this->model->getUserType($user_id);
                if($_SESSION['user_type'] == "Hospital/Medical_Center"){
                    if($this->model->deleteHosMedDetails($user_id)){
                        $this->view->render('admin/delete_hosmed_successful');
                        exit;
                    }
                    
                }
                elseif($_SESSION['user_type'] == "Organization/Society"){
                    if($this->model->deleteOrgSocDetails($user_id)){
                        $this->view->render('admin/delete_orgsoc_successful');
                        exit;
                    }
                }
                elseif($_SESSION['user_type'] == "System User"){
                    if($this->model->deleteSysUserDetails($user_id)){
                        $this->view->render('admin/delete_sysuser_successful');
                        exit;
                    }
                }
                elseif($_SESSION['user_type'] == "Donor"){
                    if($this->model->deleteDonorDetails($user_id)){
                        $this->view->render('admin/delete_donor_successful');
                        exit;
                    }
                }elseif($_SESSION['user_type'] == "Admin"){
                    if($this->model->deleteAdminDetails($user_id)){
                        $this->view->render('admin/delete_admin_successful');
                        exit;
                    }
                }
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
        
    }

    // Function to reactivate user
    function reactivate_user($user_id){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if($this->model->reactivateUser($user_id)){
                    $this->view->render('admin/reactivate_successful');
                    exit;
                }
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    // Function to add blood bank
    function addbloodbank_done()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $target_dir = "C:/xampp/htdocs/public/img/bloodbanks/";
                $file_upload = false;
                //Checking if the file is uploaded
                if ($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
                    $filename = basename($_FILES["fileToUpload"]["name"]);

                    // Get only the filename without the extension
                    $filename = pathinfo($filename, PATHINFO_FILENAME);
                    // Renaming the filename with the $filename + current timestamp
                    $filename = $filename . time();
                    // Adding the extension back to the filename
                    $filename = $filename . "." . pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION);
                    $file_upload = true;
                } else {
                    $filename = 'bloodbank.png';
                }

                $target_file = $target_dir . $filename;
                
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                
                if($file_upload){
                    // Check if image file is a actual image or fake image
                    if (isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                        if ($check !== false) {
                            echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
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
                    if ($_FILES["fileToUpload"]["size"] > 10000000) {
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

                
                $BankName = $_POST['bank-name'];
                $Email = $_POST['email'];
                $Number = $_POST['number'];
                $LaneName = $_POST['lane'];
                $City = $_POST['city'];
                $District = $_POST['district'];
                $Province = $_POST['province'];
                $ContactNumber = $_POST['contact'];
                $Bloodbank_pic = $filename;

                $input1 =array($BankName,$Number, $LaneName, $City, $District, $Province, $Email, $Bloodbank_pic);
                $input2 =array($ContactNumber);

                if($this->model->addBloodBank($input1, $input2)){
                    $this->view->render('admin/add_bloodbank_success');
                    exit;
                }   
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }    
}


    