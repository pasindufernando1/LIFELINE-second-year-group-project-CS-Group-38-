<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';
$_SESSION['error'] = '';

class OrganizationUser extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function dashboard()
    {

        //redirect to login if not logged in or login button is not clicked
        if (!isset($_POST['login']) && !isset($_SESSION['login'])) {
            header("Location: /authentication/organizationlogin");
        }

        //if already logged in redirect to the organization dashboard
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Organization/Society") {
                // $camp_info = $this->model->view_campaign_info();

                $_SESSION['campaignsList'] = $this->model->view_campaign_info();
                $this->view->render('organization/dashboard');
                exit;
            }
        }

        //get POST data from login page
        $uname = $_POST['username'];
        $pwd = $_POST['password'];


        $type = $this->model->gettype($uname);
        $_SESSION['type'] = $type;

        if ($this->model->authenticate($uname, $pwd)) {

            //set session variables
            $_SESSION['campaignsList'] = $this->model->view_campaign_info();

            $_SESSION['login'] = "loggedin";
            $_SESSION['username'] = $this->model->getUserName($uname);
            $_SESSION['User_ID'] = $this->model->getUserID($uname);
            $this->view->render('organization/dashboard');


        } else {
            $_SESSION['error'] = 'Incorrect Username or Password';
            header("Location: /organization/login");
        }
    }

    function logout()
    {
        //destroy session v ariables
        session_unset();
        session_destroy();
        session_regenerate_id(true);
        header("Location: /");
    }

    function processSignup()
    {



        if (!isset($_POST['signup'])) {
            header("Location: /organization/signup");
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
        $ContactNumber = $_POST['tel'];
        $Username = $_POST['uname'];
        $Userpic = 'default-path';
        $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // $inputs = array($Name, $Registration_no, $Status, $Number, $LaneName, $City, $District, $Province, $Email, $ContactNumber, $Username, $UserID, $Password);

        $inputs1 = array($Email, $Password, $Username, $Userpic, 'Organization/Society');
        $inputs2 = array($Registration_no, $Name, $Number, $LaneName, $City, $District, $Province);
        $inputs3 = array($ContactNumber);


        if ($this->model->signupOrganization($inputs1, $inputs2, $inputs3)) {
            header("Location: /organization/login");
        }



    }

    function forgetPassword()
    {
        $this->view->render('organization/forgetpassword');
    }

    function reset()
    {


        if (!isset($_POST['Reset'])) {
            header("Location: organizationuser/forgetpassword");
            exit;
        }
        if ($this->model->checkmail($_POST['username'])) {

            $_SESSION['email_reset'] = $_POST['username'];


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
            $mail->Username = 'shinthujeni@gmail.com';
            $mail->Password = 'avejkffjglzhpioe';
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
                header('Location: /organizationuser/OTP');
            } catch (Exception $e) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            }
        } else {
            $_SESSION['error'] = 'Email is not registered';
            header('Location: organizationuser/forgetpassword');
        }
    }

    function OTP()
    {
        $this->view->render('organization/OTP');
    }

    function update_password()
    {
        if (!isset($_POST['Submit'])) {
            header("Location: hospitaluser/forgetpassword");
            exit;
        }


        if ($_POST['OTP'] == $_SESSION['token']) {
            header('Location: /organizationuser/new_password');

        } else {
            $_SESSION['error'] = 'Verification failed try again';
            header('Location: /organizationuser/OTP');
        }

    }

    function new_password()
    {
        $this->view->render('organization/newpassword');
    }

    function password_set()
    {
        if ($_POST['new_pwd'] == $_POST['con_pwd']) {
            if ($this->model->updatePassword($_SESSION['email_reset'], $_POST['new_pwd'])) {
                header('Location: /organizationuser/logout');
            } else {
                print_r('false');
                die();
            }
            ;
        } else {
            $_SESSION['error'] = 'Passwords dont match';
            header('Location: /organizationuser/new_password');
        }


    }



}