<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require '../vendor/autoload.php';
$_SESSION['error'] = '';

class DonorUser extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function dashboard()
    {
        //redirect to login if not logged in or login button is not clicked
        if (!isset($_POST['login']) && !isset($_SESSION['login'])) {
            header('Location: /authentication/donorlogin');
        }

        //if already logged in redirect to the donor dashboard
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                // print_r($_SESSION['type']);
                $this->view->render('donor/dashboard');
                exit();
            }
        }

        //get POST data from login page
        $uname = $_POST['username'];
        $pwd = $_POST['password'];

        //Set Donor Email as Session Variable
        $_SESSION['email'] = $_POST['username'];

        $type = $this->model->gettype($uname);
        $_SESSION['type'] = $type;
        $_SESSION['user_ID'] = $this->model->get_user_id($_SESSION['email']);

        if ($this->model->authenticate($uname, $pwd)) {
            //set session variables
            $_SESSION['login'] = 'loggedin';
            $_SESSION['username'] = $this->model->getUserName($uname);
            $this->view->render('donor/dashboard');
        } else {
            $_SESSION['error'] = 'Incorrect Username or Password';
            header('Location: /donor/login');
        }
    }

    function forgetPassword()
    {
        $this->view->render('donor/forgetpassword');
    }

    function reset()
    {
        if (!isset($_POST['reset'])) {
            header('Location: /donoruser/forgetpassword');
            exit();
        }

        if ($this->model->checkmail($_POST['username'])) {
            $_SESSION['email_reset'] = $_POST['username'];

            $num_str = sprintf('%06d', mt_rand(1, 999999));
            $_SESSION['token'] = $num_str;

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

            $mail->IsSMTP(); // telling the class to use SMTP
            // $mail->SMTPDebug = 2;
            $mail->Mailer = 'smtp';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'lifeline.managementservices@gmail.com';
            $mail->Password = 'pdrnjjddsyfhwywh';
            //From email address and name
            $mail->From = 'lifeline.managementservices@gmail.com';
            $mail->FromName = 'Life Line';

            //To address and name
            $mail->addAddress($_POST['username']); //Recipient name is optional

            //Address to which recipient will reply
            $mail->addReplyTo('noreply@lifeline.com', 'Life Line');

            //Send HTML or Plain Text email
            $mail->isHTML(true);

            $mail->Subject = 'Reset Password';
            $mail->Body = "<p>Reset Your Password With Provided OTP:$num_str </p>";
            $mail->AltBody =
                'This is the plain text version of the email content';

            try {
                $mail->send();
                header('Location: /donoruser/OTP');
            } catch (Exception $e) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        } else {
            $_SESSION['error'] = 'Email is not registered';
            header('Location: /adminuser/forgetpassword');
        }
    }

    function OTP()
    {
        $this->view->render('donor/OTP');
    }

    function update_password()
    {
        if (!isset($_POST['Submit'])) {
            header('Location: /donoruser/forgetpassword');
            exit();
        }

        if ($_POST['OTP'] == $_SESSION['token']) {
            header('Location: /donoruser/new_password');
        } else {
            $_SESSION['error'] = 'Verification failed try again';
            header('Location: /donoruser/OTP');
        }
    }

    function new_password()
    {
        $this->view->render('donor/new_password');
    }

    function password_set()
    {
        if ($_POST['new_pwd'] == $_POST['con_pwd']) {
            if (
                $this->model->updatePassword(
                    $_SESSION['email_reset'],
                    $_POST['new_pwd']
                )
            ) {
                header('Location: /donoruser/logout');
            } else {
                print_r('false');
                die();
            }
        } else {
            $_SESSION['error'] = 'Passwords do not match';
            header('Location: /donoruser/new_password');
        }
    }

    function logout()
    {
        //destroy session variables
        session_unset();
        session_destroy();
        session_regenerate_id(true);
        header('Location: /');
    }
}