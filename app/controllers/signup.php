<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';
class signup extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('signup');
    }

    function verify()
    {
        $_SESSION['utype'] = $_GET['utype'];
        $this->view->render('signup/verify_email');
        exit;
    }

    function get_otp()
    {
        $_SESSION['email'] = $_POST['email'];


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
        $mail->Body = "<p>Dear Donor,</p>
            <p>Thank you for registering to LifeLine. To verify your account, we need to verify your email address.
            Use the following OTP to confirm:$num_str </p>
            <p>enter the OTP on the confirmation page to complete the verification process.
            If you didn't request this OTP, please ignore this email.</p>";
        $mail->AltBody = "This is the plain text version of the email content";


        try {
            $mail->send();
            header('Location: /signup/OTP');
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
        if (isset($_SESSION['otp_error'])) {
            unset($_SESSION['otp_error']);
        }
        $this->view->render('signup/verify_email_otp');
        exit;
    }

    function verify_otp()
    {
        // if(!isset($_POST['otp']) ){
        //     print_r
        // }
        if ($_SESSION['token'] == $_POST['otp']) {
            if (isset($_SESSION['otp_error'])) {
                unset($_SESSION['otp_error']);
            }
            header('Location: /signup/signup_page');
        } else {
            $_SESSION['otp_error'] = "OTP is incorrect";
            header('Location: /signup/OTP');
        }
    }

    function signup_page()
    {
        if ($_SESSION['utype'] == 'hospital') {
            $this->view->render('signup/hospitalsignup');
            exit;
        } elseif ($_SESSION['utype'] == 'donor') {
            $this->view->render('signup/donorsignup');
            exit;
        } else {
            $this->view->render('signup/organizationsignup');
            exit;
        }

    }

    function send_donor_signup()
    {
        if (!isset($_POST['signup'])) {
            header("Location: /donor/login");
            exit;
        }
        if (!isset($_POST['g1']) || !isset($_POST['g2']) || !isset($_POST['g3']) || !isset($_POST['g4']) || !isset($_POST['g5'])) {
            header("Location: /signup/donor_regunseccessful");
        }
        if ($_POST['g1'] == "on" || $_POST['g2'] == "on" || $_POST['g3'] == "on" || $_POST['g4'] == "on" || $_POST['g5'] == "on") {
            header("Location: /signup/donor_regunseccessful");
        } else {

            $user_pic = "default.png";

            $target_dir = "C:/xampp/htdocs/public/img/user_pics/";
            $file_upload = false;
            // Checking whether a file is uploaded
            if ($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
                $filename = basename($_FILES["fileToUpload"]["name"]);
                $file_upload = true;
            } else {
                $filename = basename($_FILES["fileToUpload"]["name"]);
            }
            $target_file = $target_dir . $filename;


            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($file_upload) {
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

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000000) {
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
                        $user_pic = $filename;
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

            }
            $email = $_SESSION['email'];
            $password = $_POST['password'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $type = 'Donor';
            $username = $_POST['uname'];
            $user_input = array($email, $hashed_password, $username, $type, $user_pic);

            if ($this->model->insertuser($user_input)) {
                $user_ID = $this->model->get_user_id($email);
                $fullname = $_POST['fname'] . ' ' . $_POST['lname'];
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
                $donor_input = array($user_ID, $fullname, $nic, $dob, $gender, $bloodtype, $number, $lane, $city, $district, $province);
                if ($this->model->insertdonor($donor_input) && $this->model->insertcontact($user_ID, $tellno)) {
                    $this->view->render('signup/donorsignupsuccessful');
                }
            }


        }

    }

    function donor_regunseccessful()
    {
        $this->view->render('signup/donorsignupunsuccessful');
        exit;
    }

    ////////////////////////Hospital/////////////////////////////

    function send_hospital_signup()
    {

        if (!isset($_POST['login'])) {
            header("Location: /hospitals/signup");
            exit;
        }

        $Name = $_POST['name'];
        $Registration_no = $_POST['regno'];
        $Status = 0;
        $Number = $_POST['number'];
        $LaneName = $_POST['lane'];
        $City = $_POST['city'];
        $District = $_POST['district'];
        $Province = $_POST['province'];
        $Email = $_SESSION['email'];
        $ContactNumber = $_POST['tel'];
        $Username = $_POST['uname'];
        $Userpic = 'default_hospital.png';
        $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);


        $inputs1 = array($Email, $Password, $Username, $Userpic, 'Hospital/Medical_Center');
        $inputs2 = array($Registration_no, $Name, $Number, $LaneName, $City, $District, $Province, $Status);
        $inputs3 = array($ContactNumber);


        if ($this->model->signupHospital($inputs1, $inputs2, $inputs3)) {
            $this->view->render('signup/hospitalsignupsuccessful');

        }
    }

    ////////////////////////Organization/////////////////////////////

    function send_organization_signup()
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
        $Email = $_SESSION['email'];
        $ContactNumber = $_POST['tel'];
        $Username = $_POST['uname'];
        $Userpic = 'default-path';
        $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $inputs1 = array($Email, $Password, $Username, $Userpic, 'Organization/Society');
        $inputs2 = array($Registration_no, $Name, $Number, $LaneName, $City, $District, $Province);
        $inputs3 = array($ContactNumber);


        if ($this->model->signupOrganization($inputs1, $inputs2, $inputs3)) {
            $this->view->render('signup/organizationsignupsuccessful');
        }



    }







}