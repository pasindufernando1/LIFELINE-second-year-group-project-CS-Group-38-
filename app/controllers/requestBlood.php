<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require '../vendor/autoload.php';

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
            $Date_requested = date("Y-m-d");
            $date_accepted = null;
           // $BloodBankID=$_POST['bloodbank'];
            $BloodBankID=$_SESSION['bloodbankid'];
            $inputs = array($BloodBankID,$HospitalID,$Blood_group, $Blood_component, $Quantity,$Date_requested,$date_accepted);
    
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
                $_SESSION['bloodBanks'] = $this->model->getAllBloodBanks($_SESSION['District']);
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
            if(isset($_GET['filter'])){
                $is_filtered = $_GET['filter'];
            }
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                if(!isset($_POST['filter']) && !$is_filtered){
                    $_SESSION['is_filtered'] = false;
                    $ReqDet=$this->model->getAllRequests( $_SESSION['User_ID']);
                //print_r($ReqDet[1][6]['Date_requested']);die();
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
                        /* $data[$i]['Date_requested']=$reqDet[$i]['Date_requested']; */ 
                        $data[$i]['Date_requested'] = $ReqDet[$i]['Date_requested'];
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
                if(isset($_POST['filter'])){
                    if(isset($_POST['all_type'])){
                        $_SESSION['is_filtered'] = true;
                        $ReqDet=$this->model->getAllRequests( $_SESSION['User_ID']);
                //print_r($ReqDet[1][6]['Date_requested']);die();
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
                            /* $data[$i]['Date_requested']=$reqDet[$i]['Date_requested']; */ 
                            $data[$i]['Date_requested'] = $ReqDet[$i]['Date_requested'];
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
                    $output=array();
                    $_SESSION['is_filtered']=true;
                    for($i=0;$i<8;$i++){
                        if(isset($_POST[$i])){
                            if(!isset($_POST[10]) && !isset($_POST[11]) && !isset($_POST[12]) && !isset($_POST[13])){
                                $rows = $this->model->filter_out($_POST[$i]);
                                $output = array_merge($output,$rows);
                            }
                            else{
                                if(isset($_POST[10])){
                                    $rows = $this->model->filter_out_subtypes($_POST[$i],$_POST[10]);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[11])){
                                    $rows = $this->model->filter_out_subtypes($_POST[$i],$_POST[11]);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[12])){
                                    $rows = $this->model->filter_out_subtypes($_POST[$i],$_POST[12]);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[13])){
                                    $rows = $this->model->filter_out_subtypes($_POST[$i],$_POST[13]);
                                    $output = array_merge($output,$rows);
                                }
                            }
                            
                        }
                    }
                    $_SESSION['bloodBanks'] =$output;
                    
                        
                    
                    // echo "<pre>";
                    // print_r($_SESSION['reserves']);
                    // echo "</pre>";
                }
                // Unset the post data
                //unset($_POST);
                $this->view->render('hospitals/viewRequests');
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
            $this->view->render('hospitals/profile');
        }
        else{
            $this->view->render('authentication/login');
        }
        
    }

    function editProfile()
    {
        if ($_SESSION['type'] == "Hospital/Medical_Center") {
            $_SESSION['user_details'] = $this->model->get_telno($_SESSION['User_ID'] );
           // print_r( $_SESSION['user_details'][1]['Password']);die();
            $_SESSION['user_Name'] = $_SESSION['user_details'][0]['Name'];
            $_SESSION['user_Number'] = $_SESSION['user_details'][0]['Number'];
            $_SESSION['user_LaneName'] = $_SESSION['user_details'][0]['LaneName'];
            $_SESSION['user_City'] = $_SESSION['user_details'][0]['City'];
            $_SESSION['user_District'] = $_SESSION['user_details'][0]['District'];
            $_SESSION['user_Province'] = $_SESSION['user_details'][0]['Province'];
            $_SESSION['user_telno']= $_SESSION['user_details'][2]['ContactNumber'];
            $_SESSION['user_username'] = $_SESSION['user_details'][1]['Username'];
            $_SESSION['user_userType'] = $_SESSION['user_details'][1]['UserType'];
            $_SESSION['user_user_pic'] = $_SESSION['user_details'][1]['Userpic'];
            $_SESSION['password']= $_SESSION['user_details'][1]['Password'];
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
            $Password = $_POST['newPw'];
            $user_pic = $filename;
            
             if(empty($Password)){
                $Password = $_SESSION['password'];
            }else{
                $Password = password_hash($_POST['newPw'], PASSWORD_DEFAULT);
            } 

            $inputs1 = [$Password, $orgName,$user_pic];
            $inputs2 = [$orgName, $num, $laneNme, $cit, $dis, $prov];
            $inputs3 = [$teleNo];

            if ($this->model->editProfile($_SESSION['User_ID'], $inputs1, $inputs2, $inputs3)){
                //print_r("AWA");die();
                $_SESSION['user_pic'] = $this->model->getuserimg($_SESSION['User_ID']);
                //print_r($_SESSION['user_pic']);die();
                header('Location: /requestBlood/edit_profile_successful');
            }
        } else {
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

    function confirm_password()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Hospital/Medical_Center') {
                if (!isset($_POST['confirm'])) {
                    // print_r('not working');
                    // die();
                    header('Location: /requestBlood/viewProfile');
                    exit();
                }
                $password = $_POST['password'];
                //print_r($password);die();
                $password = trim($password);
                if ($this->model->check_password($_SESSION['User_ID'], $password)) {
                    // header('Location: /donorprofile');
                    $this->view->render('hospitals/profile');
                    echo '<script>hidealert();</script>';
                    echo '<script>showemail();</script>';
                    if (isset($_SESSION['p_error'])) {
                        unset($_SESSION['p_error']);
                    }
                } else {

                    $_SESSION['p_error'] = "Password is incorrect";
                    $this->view->render('hospitals/profile');
                    echo '<script>hidealert();</script>';
                    echo '<script>showalert();</script>';
                    // $this->view->render('donor/profile_edit_confirm_password');
                }
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function get_email()
    {
        if (!isset($_POST['confirm'])) {
            /* print_r('not working');
            die(); */
            header('Location: /requestBlood/viewProfile');
            exit();
        }
        $_SESSION['email_reset'] = $_POST['email'];


        $num_str = sprintf("%06d", mt_rand(1, 999999));
        $_SESSION['token'] = $num_str;

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

        $mail->IsSMTP(); // telling the class to use SMTP
        // $mail->SMTPDebug = 2;
        $mail->Mailer = "smtp";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'lifeline.managementservices@gmail.com';
        $mail->Password = 'kelpqmxgangljbqj';
        //From email address and name
        $mail->From = "lifeline.managementservices@gmail.com";
        $mail->FromName = "Life Line";

        //To address and name
        $mail->addAddress($_POST['email']); //Recipient name is optional                                                                                         

        //Address to which recipient will reply
        $mail->addReplyTo("noreply@lifeline.com", "Life Line");


        //Send HTML or Plain Text email
        $mail->isHTML(true);

        $mail->Subject = "Verify Your Email Address";
        $mail->Body = "<p>Dear User,</p>
            <p>To change your email, we need to verify your new email address.
            Use the following OTP to confirm:$num_str </p>
            <p>enter the OTP on the confirmation page to complete the verification process.
            If you didn't request this OTP, please ignore this email.</p>";
        $mail->AltBody = "This is the plain text version of the email content";


        try {
            $mail->send();
            $this->view->render('hospitals/profile');
            echo '<script>hidealert();</script>';
            echo '<script>showotp();</script>';
            //print_r("awa");die();
            // header('Location: /donorprofile/OTP');
            if (isset($_SESSION['e_error'])) {
                unset($_SESSION['e_error']);
            }
        } catch (Exception $e) {
            $_SESSION['e_error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }

    function OTP()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Hospital/Medical_Center') {
                if (isset($_SESSION['otp_error'])) {
                    unset($_SESSION['otp_error']);
                }
                $this->view->render('hospitals/profile_edit_otp');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function confirm_OTP()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Hospital/Medical_Center') {

                if (!isset($_POST['confirm'])) {
                    // print_r('coming');
                    // die();
                    header('Location: /requestBlood/viewProfile');
                    exit();
                }
                // print_r('coming');
                // die();
                $otp = $_POST['otp'];
                // print_r($_SESSION['token']);
                // var_dump($otp);
                // die();
                if ($otp == $_SESSION['token']) {
                    $email = $_SESSION['email_reset'];

                    if ($this->model->update_email($_SESSION['User_ID'], $email)) {
                        $_SESSION['email'] = $email;
                        //print_r($_SESSION['email']);die();
                        $this->view->render('hospitals/profile_edit_email_successful');
                    } else {
                        echo "error";
                    }

                    if (isset($_SESSION['otp_error'])) {
                        unset($_SESSION['otp_error']);
                    }
                } else {
                    $_SESSION['otp_error'] = "OTP is incorrect";
                    $this->view->render('/requestBlood/viewProfile');
                    echo '<script>hidealert();</script>';
                    echo '<script>showotp();</script>';
                    // $this->view->render('donor/profile_edit_otp');
                }
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    
}