<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require '../vendor/autoload.php';
$_SESSION['error'] = '';

class AdminUser extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    // Function for redirecting to the dashboard
    function dashboard()
    {
        
        //redirect to login if not logged in or login button is not clicked
        if (!isset($_POST['login']) && !isset($_SESSION['login'])) {
            header("Location: /login");
        }
        
        //if already logged in redirect to the admin dashboard
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['hospitals'] = $this->model->getHospitals();
                $this->view->render('admin/dashboard');
                exit;
            }
        }

        //get POST data from login page
        $uname = $_POST['username'];
        $pwd = $_POST['password'];

        $type = $this->model->gettype($uname);
        $_SESSION['type'] = $type;

        $user_pic = $this->model->getuserimg($uname);
        $_SESSION['user_pic'] = $user_pic;

        $password = $this->model->getpassword($uname);
        $_SESSION['Password'] = $password;


        // Authenticating
        if ($this->model->authenticate($uname, $pwd)) {
            $_SESSION['useremail'] = $_POST['username'];
            //set session variables
            $_SESSION['login'] = "loggedin";
            $_SESSION['username'] = $this->model->getUserName($uname);
            $_SESSION['hospitals'] = $this->model->getHospitals();
            $this->view->render('admin/dashboard');
        }
         else {
            $_SESSION['error'] = 'Incorrect Username or Password';
            header("Location: /login");
        }
    }

    // Logging out
    function logout()
    {
        //destroy session variables
        session_unset();
        session_destroy();
        session_regenerate_id(true);
        header("Location: /");
    }

    function forgetPassword(){        
        $this->view->render('admin/forgetpassword');
    }

    // Function to reset the password
    function reset()
    {
        if (!isset($_POST['reset'])) {
            header("Location: /adminuser/forgetpassword");
            exit;
        }

        if($this ->model->checkmail($_POST['username'])){

            $_SESSION['email_reset'] = $_POST['username'];

        
            $num_str = sprintf("%06d", mt_rand(1, 999999));
            $_SESSION['token'] = $num_str;

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

            $mail->IsSMTP();  // telling the class to use SMTP
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
            $mail->addAddress($_POST['username']); //Recipient name is optional                                                                                         

            //Address to which recipient will reply
            $mail->addReplyTo("noreply@lifeline.com", "Life Line");


            //Send HTML or Plain Text email
            $mail->isHTML(true);

            $mail->Subject = "Reset Password";
            $mail->Body = "<p>Reset Your Password With Provided OTP:$num_str </p>";
            $mail->AltBody = "This is the plain text version of the email content";


            try {
                $mail->send();
                header('Location: /adminuser/OTP');
            } catch (Exception $e) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            }
        }
        else {
            $_SESSION['pw_error'] = 'Email is not registered';
            header('Location: /adminuser/forgetpassword');
        }
    }

    function OTP()
    {
        $this->view->render('admin/OTP');
    }

    // Function to update the password
    function update_password(){
        if (!isset($_POST['Submit'])) {
            header("Location: /adminuser/forgetpassword");
            exit;
        }

        if($_POST['OTP'] == $_SESSION['token']){
            header('Location: /adminuser/new_password');

        }
        else {
            $_SESSION['pw_error'] = 'Verification failed try again';
            header('Location: /adminuser/OTP');
        }

    }

    function new_password(){
        $this->view->render('admin/new_password'); 
    }

    // Function to set the password
    function password_set() {
        if ($_POST['new_pwd'] == $_POST['con_pwd']) {
            if( $this -> model -> updatePassword($_SESSION['email_reset'],$_POST['new_pwd']) ){
                header('Location: /adminuser/logout');
            }
            else{
                print_r('false');die();
            };
        }
        else{
            $_SESSION['pw_error'] = 'Passwords do not match';
            header('Location: /adminuser/new_password');
        }
         
    }

    // Function to view the hospital
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
                    $this->view->render('admin/viewHospitalMedicalCenter_Dashboard');
                    exit;
                } 
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    //Function to validate the hospital/medical center
    function validate_user($user_id){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if($this->model->validate_user($user_id) && $this->model->validate_user_email($user_id)){
                    $this->view->render('admin/validation_successful');
                }
            }
            else{
                $this->view->render('authentication/login');
            }
        }
    }

    

}
