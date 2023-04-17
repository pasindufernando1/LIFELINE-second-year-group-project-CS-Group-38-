<?php
session_start();

class requestBlood extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $this->view->render('hospitals/requestBlood');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/hospitalslogin');
        }
    }
     
    function addbank()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $this->view->render('hospitals/requestBlood');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/hospitalslogin');
        }
    }

    function add_Request()
    {
        if ($_SESSION['type'] == "Hospital/Medical_Center") {
            $this->view->render('hospitals/requestBlood');
        }
        else{
            $this->view->render('authentication/hospitalslogin');
        }
        
    }

    function addRequest()
    {
        if ($_SESSION['type'] == "Hospital/Medical_Center") {
            if (!isset($_POST['request'])) {
                header("Location: /requestBlood/addbank");
                exit;
            }
            
            $Blood_group = $_POST['bloodGroup'];
            $Blood_component = $_POST['bloodComponent'];
            $Quantity = $_POST['quantity'];
            $HospitalID = $_SESSION['User_ID'];
            // Current date 
            $Date_accepted = null;
            
           // $BloodBankID=$_POST['bloodbank'];
            $BloodBankID=$_SESSION['bloodbankid'];
            //print_r($BloodBankID);die();
            //$Status='0';

            $inputs = array($BloodBankID,$HospitalID,$Blood_group, $Blood_component, $Quantity,$Date_accepted);
    
            if ($this->model->addBloodRequest($inputs)){
                header("Location: /requestBlood/add_request_successful");
                
            }
            
        }
        
    }
    function add_request_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $this->view->render('hospitals/add_request_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/hospitalslogin');
        }
    }

    function viewReqBlood()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $_SESSION['bloodBanks'] = $this->model->getAllBloodBanks($_SESSION['Province']);
                $this->view->render('hospitals/reqblood');
                exit;
            
            }
        }
        else{
            $this->view->render('authentication/login');    
        }    
    }

    function viewRequests(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $ReqDet=$this->model->getAllRequests( $_SESSION['User_ID']);
                //print_r($ReqDet);die();
                for($i=0;$i<count($ReqDet);$i++){
                    $BloodBankID=$ReqDet[$i]['BloodBankID'];
                    //print_r($BloodBankID);die();
                    $BloodBankName[$i]=$this->model->getBloodBankName($BloodBankID);
                    //print_r($BloodBankName);die();
                    //$ReqDet[$i][0]=$BloodBankName;
                }
                //$_SESSION['bloodBanks'] = $ReqDet;
                //print_r($BloodBankName);die();
                $data = [];

                for($i=0;$i<count($BloodBankName);$i++){
                    $data[$i]['RequestID'] = $ReqDet[$i]['RequestID'];
                    $data[$i]['Blood_group'] = $ReqDet[$i]['Blood_group'];
                    $data[$i]['Blood_component'] = $ReqDet[$i]['Blood_component'];
                    $data[$i]['Quantity'] = $ReqDet[$i]['Quantity'];
                    $data[$i]['BloodBank_Name'] = $BloodBankName[$i][0]['BloodBank_Name'];
                    //$data[$i]['Date_requested'] = $ReqDet[$i]['Date_requested'];
                    //$data[$i]['Date_accepted'] = $ReqDet[$i]['Date_accepted'];
                    if($ReqDet[$i]['Date_accepted']==null){
                        $data[$i]['Status'] = "Pending";
                    }
                    else{
                        $data[$i]['Status'] = "Accepted";
                    }
                    //$data[$i]['Status'] = $ReqDet[$i]['Status'];
                    //print_r($data);die();
                    /* foreach($reqDet as $r){
                        if($f['DonorID']==$donorName[$i][0]['UserID']){
                            $data[$i]['Feedback'] = $f['Feedback'];
                        }
                    } */
                }
                //print_r($data);die();
                $_SESSION['bloodBanks'] = $data;
                //print_r($ReqDet);die();
                //$_SESSION['bloodBanks'] = $this->model->getAllRequests( $_SESSION['User_ID']);

                //print_r($_SESSION['bloodBanks']);die();
                $this->view->render('hospitals/viewrequests');
                exit;
            
            }
        }
        else{
            $this->view->render('authentication/login');    
        } 
    }

    function viewDetails()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                //print_r($_SESSION['District']);die();
                $_SESSION['bloodBanks'] = $this->model->getAllBloodBanks($_SESSION['District']);
                $this->view->render('hospitals/viewBloodBanks');
                exit;
            
            }
        }
        else{
            $this->view->render('authentication/login');    
        }    
    }

    function deleteRequest()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                
                $requestID = intval($_GET['request']);
                //print_r($_SESSION['RequestID']);die();
                //$_SESSION['RequestID'] = $RequestID;
                if($this->model->dltReq($requestID)){
                    $this->view->render('hospitals/deleteSuccessfully');;
                    exit;
                }
                /* $_SESSION['Request'] = $this->model->dltReq($requestID);
                $this->view->render('hospitals/deleteSuccessfully'); */
                header("Location: /requestblood/type?page=1");
                //print_r("AWA");die();
                exit;
            
            }
        }
        else{
            $this->view->render('authentication/login');    
        }    
    }

    function viewProfile()
    {
        if ($_SESSION['type'] == "Hospital/Medical_Center") {
            
            
            
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
            $_SESSION['UserType'] = $_SESSION['user_details'][1][2];
            $_SESSION['telno'] = $_SESSION['user_details'][2][0]; 
            $_SESSION['password']= $_SESSION['user_details'][1][3];
            $_SESSION['user_pic'] = $_SESSION['user_details'][1][4];
            //print_r($_SESSION['user_pic']);die();
            //print_r($_SESSION['password']);die();
            $this->view->render('hospitals/profile');
        }
        else{
            $this->view->render('authentication/login');
        }
        
    }

    function editProfile()
    {
        if ($_SESSION['type'] == "Hospital/Medical_Center") {
            //print_r($_SESSION['user_pic']);die();
            $user_pic = $this->model->getuserimg($_SESSION['User_ID']);
            $_SESSION['user_pic'] = $user_pic;
            $this->view->render('hospitals/editProfile');

        }
        else{
            $this->view->render('authentication/login');
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

        if ($_SESSION['type'] == "Hospital/Medical_Center") {
            $orgName = $_POST['hosName'];
            $teleNo = $_POST['teleNo'];
            $num = $_POST['num'];
            $laneNme = $_POST['laneNme'];
            $cit = $_POST['cit'];
            $dis = $_POST['dis'];
            $prov = $_POST['prov'];
            $em = $_POST['em'];
            $user_pic = $filename;
            
            //print_r($_SESSION['password']);die();
            $Password = $_POST['newPw'];
            if(empty($Password)){
                $Password = $_SESSION['password'];
            }else{
                $Password = password_hash($_POST['newPw'], PASSWORD_DEFAULT);
            }

            //print_r($user_pic);die();


            $inputs1 = array($em, $Password, $orgName,$user_pic);
            $inputs2 = array( $orgName,$num ,$laneNme,$cit,$dis,$prov);
            $inputs3 = array($teleNo);
            
            if ($this->model->editProfile($_SESSION['User_ID'],$inputs1, $inputs2, $inputs3)) {
                $_SESSION['user_pic'] = $this->model->getuserimg($_SESSION['User_ID']);
                //print_r($_SESSION['user_pic']);die();
                //$_SESSION['username'] = $this->model->getUserName($_SESSION['User_ID']);
                header("Location: /requestBlood/edit_profile_successful");
            }
            

        }
        else{
            $this->view->render('authentication/login');
        }
        
    }

    function edit_profile_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $this->view->render('hospitals/edit_profile_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    
}