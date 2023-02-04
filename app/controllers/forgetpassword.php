<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require '../vendor/autoload.php';


class ForgetPassword extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('systemuser/forgetpassword');
    }

    function reset()
    {
            

        if (!isset($_POST['Reset'])) {
            header("Location: /forgetpassword");
            exit;
        }
        if($this ->model->checkmail($_POST['username'])){

            $_SESSION['email_reset'] = $_POST['username'];

        
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
            $mail->From = "shinthujeni@gmail.com";
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
                header('Location: /forgetpassword/OTP');
            } catch (Exception $e) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            }
        }
        else {
            $_SESSION['error'] = 'Email is not registered';
            header('Location: /forgetpassword');
        }
    }

    function OTP()
    {
        $this->view->render('systemuser/OTP');
    }

    function update_password(){
        if (!isset($_POST['Submit'])) {
            header("Location: /forgetpassword");
            exit;
        }


        if($_POST['OTP'] == $_SESSION['token']){
            header('Location: /forgetpassword/new_password');

        }
        else {
            $_SESSION['error'] = 'Verification failed try again';
            header('Location: /forgetpassword/OTP');
        }

    }

    function new_password(){
        $this->view->render('systemuser/newpassword'); 
    }

    function password_set() {
        if ($_POST['new_pwd'] == $_POST['con_pwd']) {
            if( $this -> model -> updatePassword($_SESSION['email_reset'],$_POST['new_pwd']) ){
                header('Location: /systemuser/logout');
            }
            else{
                print_r('false');die();
            };
        }
        else{
            $_SESSION['error'] = 'Passwords dont match';
            header('Location: /forgetpassword/new_password');
        }
        
        
    }


}
