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
            $this->view->render('authentication/adminlogin');
        }
    }


    function adduser()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/addUserTypeSelect');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    function addHosMeduser()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/addHospitalMedicalCenter');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    function addOrgSocuser()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/addOrganizationSociety');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    function addDonoruser()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/addDonor');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

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
            $this->view->render('authentication/adminlogin');
        }
    }

    






    function add()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/usermanage');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }  
    }

        
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
            $Userpic = 'default-path';
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // $inputs = array($Name, $Registration_no, $Status, $Number, $LaneName, $City, $District, $Province, $Email, $ContactNumber, $Username, $UserID, $Password);

            $inputs1 = array($Email, $Password, $Username, $Userpic, 'Hospital/Medical_Center');
            $inputs2 = array($Registration_no, $Name, $Number, $LaneName, $City, $District, $Province, $Status);
            $inputs3 = array($ContactNumber);


            if ($this->model->addHospitalMedCenter($inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/add_hosmed_successful");
            }
            
        }
    }

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
            $Userpic = 'default-path';
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
                header("Location: /usermanage/add_donor_successful");
            }
            
        }
    }

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
            $Userpic = 'default-path';
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


    

    function add_hosmed_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/add_hosmed_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    function add_orgsoc_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/add_orgsoc_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    function add_donor_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/add_donor_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    function add_systemuser_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/add_systemuser_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    function type()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['users'] = $this->model->getAllUsers();
                $this->view->render('admin/usermanage');
                exit;
            }
        }
        else{
            $this->view->render('authentication/adminlogin');
            
        }
            
        
    }

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
                    // print_r($_SESSION['user_details']);die();
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
                    $this->view->render('admin/editDonor');
                    exit;
                }
                elseif($_SESSION['user_type'] == "System User"){
                    $_SESSION['bloodbanks'] = $this->model->getBloodBankName();
                    $_SESSION['user_details'] = $this->model->getSystemUserDetails($user_id);
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
                
            } 
        }
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

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
                    $this->view->render('admin/viewHospitalMedicalCenter');
                    exit;
                }
                elseif($_SESSION['user_type'] == "Organization/Society"){
                    $_SESSION['user_details'] = $this->model->getOrgSocDetails($user_id);
                    // print_r($_SESSION['user_details']);die();
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
                    $this->view->render('admin/viewOrganizationSociety');
                    exit;
                }
                elseif($_SESSION['user_type'] == "Donor"){
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
                    $this->view->render('admin/viewDonor');
                    exit;
                }
                elseif($_SESSION['user_type'] == "System User"){
                    $_SESSION['user_details'] = $this->model->getSystemUserDetails($user_id);
                    $_SESSION['Name'] = $_SESSION['user_details'][0]['Fullname'];
                    $_SESSION['NIC'] = $_SESSION['user_details'][0]['NIC'];
                    $_SESSION['BloodBankID'] = $_SESSION['user_details'][0]['BloodBankID'];
                    $_SESSION['BloodBankName'] = $_SESSION['BloodBankName'][0]['BloodBank_Name'];
                    $_SESSION['Email'] = $_SESSION['user_details'][1]['Email'];
                    $_SESSION['Username'] = $_SESSION['user_details'][1]['Username'];
                    $_SESSION['Password'] = $_SESSION['user_details'][1]['Password'];
                    $_SESSION['Contact_no'] = $_SESSION['user_details'][2]['ContactNumber'];
                    $this->view->render('admin/viewSystemUser');
                    exit;
                }
                // else{
                //     //$_SESSION['user_details'] = $this->model->getDetails($user_id);
                // }
                
            } 
        }
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    function edit_hosmed_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/edit_hosmed_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    function edit_orgsoc_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/edit_orgsoc_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    function edit_donor_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/edit_donor_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/adminlogin');
        }
    }
    
    function edit_systemuser_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/edit_systemuser_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    function editHospitalMedCenter($user_id)
    {

        if ($_SESSION['type'] == "Admin") {
            if (!isset($_POST['update-hosmed'])) {
                header("Location: /usermanage/type?page=1");
                exit;
            }

            $Name = $_POST['name']; //if(empty($Name)){$Name = $_SESSION['Name'];}
            $Registration_no = $_POST['regno']; //if(empty($Registration_no)){$Registration_no = $_SESSION['Registration_no'];}
            $Status = $_POST['status']; //if(empty($Status)){$Status = $_SESSION['Status'];}
            $Number = $_POST['number']; //if(empty($Number)){$Number = $_SESSION['Number'];}
            $LaneName = $_POST['lane']; //if(empty($LaneName)){$LaneName = $_SESSION['LaneName'];}
            $City = $_POST['city']; //if(empty($City)){$City = $_SESSION['City'];}
            $District = $_POST['district']; //if(empty($District)){$District = $_SESSION['District'];}
            $Province = $_POST['province']; //if(empty($Province)){$Province = $_SESSION['Province'];}
            $Email = $_POST['email']; //if(empty($Email)){$Email = $_SESSION['Email'];}
            $ContactNumber = $_POST['contact']; //if(empty($ContactNumber)){$ContactNumber = $_SESSION['Contact_no'];}
            $Username = $_POST['uname']; //if(empty($Username)){$Username = $_SESSION['Username'];}
            $Userpic = 'default-path';
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT); if(empty($Password)){$Password = $_SESSION['Password'];}

            $inputs1 = array($Email, $Password, $Username, $Userpic, 'Hospital/Medical_Center');
            $inputs2 = array($Registration_no, $Name, $Number, $LaneName, $City, $District, $Province, $Status);
            $inputs3 = array($ContactNumber);

            if ($this->model->editHospitalMedCenter($user_id,$inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/edit_hosmed_successful");
            }
            // $inputs = array($blood_group, $storing_constraints, $expiry_constraints);

            // if ($this->model->editReserveTypes($type_id,$inputs)){
            //     header("Location: /reservation/add_reservation_successful");
                
            // }   
        }    
    }

    function editOrganizationSociety($user_id)
    {

        if ($_SESSION['type'] == "Admin") {
            if (!isset($_POST['update-orgsoc'])) {
                header("Location: /usermanage/type?page=1");
                exit;
            }

            $Name = $_POST['name']; //if(empty($Name)){$Name = $_SESSION['Name'];}
            $Registration_no = $_POST['regno']; //if(empty($Registration_no)){$Registration_no = $_SESSION['Registration_no'];}
            $Number = $_POST['number']; //if(empty($Number)){$Number = $_SESSION['Number'];}
            $LaneName = $_POST['lane']; //if(empty($LaneName)){$LaneName = $_SESSION['LaneName'];}
            $City = $_POST['city']; //if(empty($City)){$City = $_SESSION['City'];}
            $District = $_POST['district']; //if(empty($District)){$District = $_SESSION['District'];}
            $Province = $_POST['province']; //if(empty($Province)){$Province = $_SESSION['Province'];}
            $Email = $_POST['email']; //if(empty($Email)){$Email = $_SESSION['Email'];}
            $ContactNumber = $_POST['contact']; //if(empty($ContactNumber)){$ContactNumber = $_SESSION['Contact_no'];}
            $Username = $_POST['uname']; //if(empty($Username)){$Username = $_SESSION['Username'];}
            $Userpic = 'default-path';
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT); if(empty($Password)){$Password = $_SESSION['Password'];}

            $inputs1 = array($Email, $Password, $Username, $Userpic, 'Organization/Society');
            $inputs2 = array($Registration_no, $Name, $Number, $LaneName, $City, $District, $Province);
            $inputs3 = array($ContactNumber);

            if ($this->model->editOrganizationSociety($user_id,$inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/edit_orgsoc_successful");
            }
            // $inputs = array($blood_group, $storing_constraints, $expiry_constraints);

            // if ($this->model->editReserveTypes($type_id,$inputs)){
            //     header("Location: /reservation/add_reservation_successful");
                
            // }   
        }    
    }

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
            $Userpic = 'default-path';
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);if(empty($Password)){$Password = $_SESSION['Password'];}

            $inputs1 = array($Email, $Password, $Username, $Userpic, 'Donor');
            $inputs2 = array($Full_name, $NIC,$Gender,$DOB,$Blood_type, $Number, $LaneName, $City, $District, $Province,$Donor_card);
            $inputs3 = array($ContactNumber);

            if ($this->model->editDonor($user_id,$inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/edit_donor_successful");
            }
            // $inputs = array($blood_group, $storing_constraints, $expiry_constraints);

            // if ($this->model->editReserveTypes($type_id,$inputs)){
            //     header("Location: /reservation/add_reservation_successful");
                
            // }   
        }    
    }

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
            $Userpic = 'default-path';
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);if(empty($Password)){$Password = $_SESSION['Password'];}

            
            $inputs1 = array($Email, $Password, $Username, $Userpic, 'System User');
            $inputs2 = array($Full_name,$NIC,$BloodBankID);
            $inputs3 = array($ContactNumber);

            if ($this->model->editSystemUser($user_id,$inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/edit_systemuser_successful");
            }
             
        }    
    }



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
                }
            } 
        }
        else{
            $this->view->render('authentication/adminlogin');
        }
        
    }



    
}
    