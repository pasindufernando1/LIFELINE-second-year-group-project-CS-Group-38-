<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require '../vendor/autoload.php';

class Donorsignup extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('signup');
        exit;
    }

    function verify(){
        $this->view->render('authentication/verify_email');
        exit;
    }

    function get_otp(){
        $_SESSION['email'] = $_POST['email'];

        
            $num_str = sprintf("%06d", mt_rand(1, 999999));
            $_SESSION['token'] = $num_str;

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

            $mail->IsSMTP();  // telling the class to use SMTP
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
            $mail->Body = "<p>Dear Donor,</p>
            <p>Thank you for registering to Life Line. To verify your account, we need to verify your email address.
            Use the following OTP to confirm:$num_str </p>
            <p>enter the OTP on the confirmation page to complete the verification process.
            If you didn't request this OTP, please ignore this email.</p>";
            $mail->AltBody = "This is the plain text version of the email content";


            try {
                $mail->send();
                header('Location: /donorsignup/OTP');
                if(isset($_SESSION['e_error'])){
                    unset($_SESSION['e_error']);
                }
            } catch (Exception $e) {
                $_SESSION['e_error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                echo "Mailer Error: " . $mail->ErrorInfo;
            }

    }

    function OTP(){
        if(isset($_SESSION['otp_error'])){
                unset($_SESSION['otp_error']);
            }
        $this->view->render('authentication/verify_email_otp');
        exit;
    }

    function verify_otp(){
        // if(!isset($_POST['otp']) ){
        //     print_r
        // }
        if($_SESSION['token'] == $_POST['otp']){
            if(isset($_SESSION['otp_error'])){
                unset($_SESSION['otp_error']);
            }
            header('Location: /donorsignup/signup');
        }
        else{
            $_SESSION['otp_error'] = "OTP is incorrect";
            header('Location: /donorsignup/OTP');
        }
    }
    
    
    function signup(){
        $this->view->render('authentication/donorsignup');
        exit;
    }

    function send_signup(){
        if (!isset($_POST['signup'])) {
            header("Location: /donor/login");
            exit;
        }
        if(!isset($_POST['g1'])|| !isset($_POST['g2']) || !isset($_POST['g3'])||!isset($_POST['g4'])||!isset($_POST['g5'])){
             header("Location: /donorsignup/regunseccessful");
        }
        if($_POST['g1']== "on" || $_POST['g2']== "on" || $_POST['g3']== "on" || $_POST['g4']== "on"|| $_POST['g5']== "on"){
            header("Location: /donorsignup/regunseccessful");
        }
        else{
            $email = $_SESSION['email'];
            
                $password = $_POST['password'];
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $type = 'Donor';
                $username = $_POST['uname'];
                $user_input = array($email,$hashed_password,$username,$type);

               if($this->model->insertuser($user_input)){
                    $user_ID = $this->model->get_user_id($email);
                    $fullname = $_POST['fname'].' '.$_POST['lname'];
                    $nic = $_POST['nicno'];
                    $bloodtype = $_POST['btype'];
                    $dob = $_POST['dob'];
                    $gender = $_POST['gender'];
                    $number = $_POST['number'];
                    $lane = $_POST['lane'];
                    $city = $_POST['city'];
                    $district = $_POST['district'];
                    $province = $_POST['province'];
                    $tellno = $_POST['tel'];
                    $donor_input = array($user_ID,$fullname, $nic, $dob, $gender, $bloodtype, $number, $lane, $city, $district, $province);
                    if($this->model->insertdonor($donor_input) && $this->model->insertcontact($user_ID,$tellno)){
                        $this->view->render('authentication/donorlogin');
                    }
               }

            
        }

    }

    function regunseccessful(){
        $this->view->render('authentication/donorsignupunsuccessful');
        exit;
    }
}