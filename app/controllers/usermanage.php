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
                // else{
                //     //$_SESSION['user_details'] = $this->model->getDetails($user_id);
                // }
                
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
                // else{
                //     //$_SESSION['user_details'] = $this->model->getDetails($user_id);
                // }
                
            } 
        }
        else{
            $this->view->render('authentication/adminlogin');
        }
        
    }



    
}
    // function type()
    // {
    //     if (isset($_SESSION['login'])) {
    //         if ($_SESSION['type'] == "systemuser") {
    //             $_SESSION['bloodtypes'] = $this->model->getAllTypes();
    //             $this->view->render('systemuser/reservation_type');
    //             exit;
    //         } else if ($_SESSION['type'] == "admin") {
    //             $this->view->render('layout/reservation');
    //             exit;
    //         } else if ($_SESSION['type'] == "donor") {
    //             $this->view->render('systemuser/reservation');
    //             exit;
    //         } else {
    //             $this->view->render('layout/reservation');
    //             exit;
    //         }
    //     }
    //     else{
    //         $this->view->render('authentication/login');
            
    //     }
            
        
    // }

    // function add_type()
    // {
    //     if (isset($_SESSION['login'])) {
    //         if ($_SESSION['type'] == "systemuser") {
    //             $maxtypeid = $this->model->getMaxTypeId();
    //             $_SESSION['MaxTypeID'] = $maxtypeid;
    //             $this->view->render('systemuser/reservation_add_type');
    //             exit;
    //         } else if ($_SESSION['type'] == "admin") {
    //             $this->view->render('layout/reservation');
    //             exit;
    //         } else if ($_SESSION['type'] == "donor") {
    //             $this->view->render('systemuser/reservation');
    //             exit;
    //         } else {
    //             $this->view->render('layout/reservation');
    //             exit;
    //         }
    //     }
    //     else{
    //         $this->view->render('authentication/login');
            
    //     }
            
        
    // }

        
    // function add_reserve()
    // {
    //     if ($_SESSION['type'] == "systemuser") {
    //         if (!isset($_POST['add-reservation'])) {
    //             header("Location: /reservation/add");
    //             exit;
    //         }
            
    //         $blood_group = $_POST['blood_group'];
    //         $quantity = $_POST['quantity'];
    //         $expiry_constraints = $_POST['expiry_constraints'];

    //         $inputs = array($blood_group, $quantity, $expiry_constraints);

    //         if ($this->model->addReserve($inputs)){
    //             header("Location: /reservation/add_reservation_successful");
                
    //         }
            
    //     }
    // }

    // function add_reserve_type()
    // {
    //     if ($_SESSION['type'] == "systemuser") {
    //         if (!isset($_POST['add-reservation-type'])) {
    //             header("Location: /reservation/add_type");
    //             exit;
    //         }
            
    //         $blood_group = $_POST['blood_group'];
    //         $storing_constraints = $_POST['Storing_Constraints'];
    //         $expiry_constraints = $_POST['expiry_constraints'];

    //         $inputs = array($blood_group, $storing_constraints, $expiry_constraints);

    //         if ($this->model->addReserveTypes($inputs)){
    //             header("Location: /reservation/add_reservation_successful");
                
    //         }
            
    //     }
    // }

    // function add_reservation_successful()
    // {
    //     if (isset($_SESSION['login'])) {
    //         if ($_SESSION['type'] == "systemuser") {
    //             $this->view->render('systemuser/reservation_add_successful');
    //             exit;
    //         } else if ($_SESSION['type'] == "admin") {
    //             $this->view->render('layout/reservation');
    //             exit;
    //         } else if ($_SESSION['type'] == "donor") {
    //             $this->view->render('systemuser/reservation');
    //             exit;
    //         } else {
    //             $this->view->render('layout/reservation');
    //             exit;
    //         }
    //     }
    //     else{
    //         $this->view->render('authentication/login');
    //     }
    // }

    // function delete_types($type_id)
    // {
    //     if (isset($_SESSION['login'])) {
    //         if ($_SESSION['type'] == "systemuser") {
    //             $this->model->deleteReserveTypes($type_id);
    //             header("Location: /reservation/type?page=1");
    //             exit;
    //         } else if ($_SESSION['type'] == "admin") {
    //             $this->view->render('layout/reservation');
    //             exit;
    //         } else if ($_SESSION['type'] == "donor") {
    //             $this->view->render('systemuser/reservation');
    //             exit;
    //         } else {
    //             $this->view->render('layout/reservation');
    //             exit;
    //         }
    //     }
    //     else{
    //         $this->view->render('authentication/login');
    //     }
        
    // }
