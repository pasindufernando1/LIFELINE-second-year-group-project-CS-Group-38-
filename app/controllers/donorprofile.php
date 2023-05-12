<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';

class Donorprofile extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $_SESSION['donor_info'] = $this->model->getdonorinfo(
                    $_SESSION['user_ID']
                );
                $_SESSION['donor_contact'] = $this->model->getdonorcontact(
                    $_SESSION['user_ID']
                );
                $this->view->render('donor/profile');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }
    function editprofile()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                // $_SESSION['']
                $this->view->render('donor/profile_edit');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function update_profile()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                if (!isset($_POST['update'])) {
                    header('Location: /donorprofile');
                    exit();
                }

                // Upload Image
                $target_dir = "C:/xampp/htdocs/public/img/user_pics/";
                $file_upload = false;
                // Checking whether a file is uploaded
                if ($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
                    $filename = basename($_FILES["fileToUpload"]["name"]);
                    $file_upload = true;
                } else {
                    $filename = $_SESSION['user_pic'];
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
                            $_SESSION['user_pic'] = $filename;
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                            die();
                        }
                    }

                }

                // Update User

                $password = $_POST['password'];
                $password = trim($password);
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $username = $_POST['uname'];
                $userpic = $filename;
                //if password is updates
                if (strlen($password) > 0) {
                    $user_input = [$hashed_password, $username, $userpic];
                    $u_wp = $this->model->updateuserp(
                        $user_input,
                        $_SESSION['user_ID']
                    );
                    //if password is not updated
                } else {
                    $user_input = [$username, $userpic];
                    $user_input = [$username, $userpic];
                    $u_p = $this->model->updateuser(
                        $user_input,
                        $_SESSION['user_ID']
                    );
                }

                if ($u_wp || $u_p) {
                    $name = $_POST['name'];
                    $nic = $_POST['nicno'];
                    $dob = $_POST['dob'];
                    $number = $_POST['number'];
                    $lane = $_POST['lane'];
                    $city = $_POST['city'];
                    $district = $_POST['district'];
                    $province = $_POST['province'];
                    $tellno = $_POST['tel'];

                    $donor_input = [
                        $name,
                        $nic,
                        $dob,
                        $number,
                        $lane,
                        $city,
                        $district,
                        $province,
                    ];

                    if (
                        $this->model->updatedonor(
                            $_SESSION['user_ID'],
                            $donor_input
                        ) &&
                        $this->model->updateusercontact(
                            $_SESSION['user_ID'],
                            $tellno
                        )
                    ) {
                        $_SESSION['username'] = $username;
                        $_SESSION['user_pic'] = $filename;
                        $this->view->render('donor/profile_edit_successful');
                    }
                }
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function c_password()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                if (isset($_SESSION['p_error'])) {
                    unset($_SESSION['p_error']);
                }
                $this->view->render('donor/profile_edit_confirm_password');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function confirm_password()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                if (!isset($_POST['confirm'])) {
                    header('Location: /donorprofile');
                    exit();
                }
                $password = $_POST['password'];

                $password = trim($password);
                if ($this->model->check_password($_SESSION['user_ID'], $password)) {
                    $this->view->render('donor/profile');
                    echo '<script>hidealert();</script>';
                    echo '<script>showemail();</script>';
                    if (isset($_SESSION['p_error'])) {
                        unset($_SESSION['p_error']);
                    }
                } else {

                    $_SESSION['p_error'] = "Password is incorrect";
                    $this->view->render('donor/profile');
                    echo '<script>hidealert();</script>';
                    echo '<script>showalert();</script>';
                }
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function get_email()
    {
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
        $mail->Body = "<p>Dear Donor,</p>
            <p>To change your email, we need to verify your new email address.
            Use the following OTP to confirm : $num_str </p>
            <p>enter the OTP on the confirmation page to complete the verification process.
            If you didn't request this OTP, please ignore this email.</p>";
        $mail->AltBody = "This is the plain text version of the email content";


        try {
            $mail->send();
            $this->view->render('donor/profile');
            echo '<script>hidealert();</script>';
            echo '<script>showotp();</script>';
            
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
            if ($_SESSION['type'] == 'Donor') {
                if (isset($_SESSION['otp_error'])) {
                    unset($_SESSION['otp_error']);
                }
                $this->view->render('donor/profile_edit_otp');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function confirm_OTP()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {

                if (!isset($_POST['confirm'])) {
                    header('Location: /donorprofile');
                    exit();
                }
                
                $otp = $_POST['otp'];
            
                if ($otp == $_SESSION['token']) {
                    $email = $_SESSION['email_reset'];

                    if ($this->model->update_email($_SESSION['user_ID'], $email)) {
                        $_SESSION['email'] = $email;
                        $this->view->render('donor/profile_edit_email_successful');
                    } else {
                        echo "error";
                    }

                    if (isset($_SESSION['otp_error'])) {
                        unset($_SESSION['otp_error']);
                    }
                } else {
                    $_SESSION['otp_error'] = "OTP is incorrect";
                    $this->view->render('donor/profile');
                    echo '<script>hidealert();</script>';
                    echo '<script>showotp();</script>';
                }
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function d_confirm_password()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                if (!isset($_POST['confirm'])) {
                    header('Location: /donorprofile');
                    exit();
                }
                $password = $_POST['password1'];

                $password = trim($password);
                if ($this->model->check_password($_SESSION['user_ID'], $password)) {
                    $this->view->render('donor/profile');
                    echo '<script>hidealert();</script>';
                    echo '<script>showConfirm();</script>';
                    if (isset($_SESSION['p_error'])) {
                        unset($_SESSION['p_error']);
                    }
                } else {

                    $_SESSION['p_error'] = "Password is incorrect";
                    $this->view->render('donor/profile');
                    echo '<script>hidealert();</script>';
                    echo '<script>showPassword();</script>';
                }
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function delete_success()
    {
        if(isset($_SESSION['user_ID'])){
            if($this->model->delete_profile($_SESSION['user_ID'])){
                //destroy session variables
                session_unset();
                session_destroy();
                $this->view->render('donor/profile_delete_success');
                }
        }
        else{
            $this->view->render('donor/profile_delete_success');
        }
       
    }

}