<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require '../vendor/autoload.php';

class Systemuser extends Controller
{

    function __construct()
    {
        parent::__construct();
    }
    function header(){
        $this->view->render('systemuser/layout/sidebar');
    }
    
    function login()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                header("Location: /systemuser/dashboard");
                $this->view->render('systemuser/layout/header');
                exit;
            } else if ($_SESSION['type'] == "Admin") {
                header("Location: /user/dashboard");
                $this->view->render('layout/navigation');
                exit;
            } else if ($_SESSION['type'] == "Donor") {
                header("Location: /user/dashboard");
                $this->view->render('systemuser/dashboard');
                exit;
            } else {
                header("Location: /user/dashboard");
                $this->view->render('systemuser/dashboard');
                exit;
            }
        }
        else{
            $this->view->render('systemuser/login');
        }
    }

    function dashboard()
    {
        
        //redirect to login if not logged in or login button in not clicked
        if (!isset($_POST['login']) && !isset($_SESSION['login'])) {
            header("Location: /systemuser/login");
        }
        
        //if already logged in redirect according to user types
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {

                $_SESSION['month_donations'] = $this->model->getMonthlyDonation($_SESSION['blood_bank_id']);
               
                $_SESSION['no_of_donors'] = $this->model->getdonorcomposition();

                date_default_timezone_set("Asia/Calcutta");
                $date = date('Y-m-d');
                $_SESSION['donation_today'] =$this->model->getTodayDonation($_SESSION['blood_bank_id'],$date);
                $_SESSION['cards_issued'] =$this->model->getCardIssued();
                $_SESSION['ads_count'] =$this->model->getAdCount($_SESSION['blood_bank_id']);
                $_SESSION['camp_req_count'] =$this->model->getCampReqCount($_SESSION['blood_bank_id']);
                $_SESSION['month_donations'] = $this->model->getMonthlyDonation($_SESSION['blood_bank_id']);
                $_SESSION['no_of_donors'] = $this->model->getdonorcomposition();
                

                //  print_r($_SESSION['cards_issued']);die();
                
                
                $this->view->render('systemuser/dashboard');
                exit;
            } else if ($_SESSION['type'] == "Admin") {
                $this->view->render('layout/navigation');
                exit;
            } else if ($_SESSION['type'] == "Donor") {
                $this->view->render('systemuser/dashboard');
                exit;
            } else {
                $this->view->render('systemuser/dashboard');
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


        
        if ($this->model->authenticate($uname, $pwd)) {

            $_SESSION['useremail'] = $_POST['username'];
            //set session variables
            $_SESSION['login'] = "loggedin";
            $_SESSION['username'] = $this->model->getUserName($uname);
            $_SESSION['bloodbankname'] = $this->model->getBloodBankName($uname);
            $_SESSION['packets'] = $this->model->getAllPackets($_SESSION['blood_bank_id']);
                $_SESSION['month_donations'] = $this->model->getMonthlyDonation($_SESSION['blood_bank_id']);
                $_SESSION['no_of_donors'] = $this->model->getdonorcomposition();

                date_default_timezone_set("Asia/Calcutta");
                $date = date('Y-m-d');
                $_SESSION['donation_today'] =$this->model->getTodayDonation($_SESSION['blood_bank_id'],$date);

                $_SESSION['cards_issued'] =$this->model->getCardIssued();

                $_SESSION['ads_count'] =$this->model->getAdCount($_SESSION['blood_bank_id']);

                $_SESSION['camp_req_count'] =$this->model->getCampReqCount($_SESSION['blood_bank_id']);



                $this->view->render('systemuser/dashboard');

            
        }
         else {
            $_SESSION['error'] = 'Incorrect Username or Password';
            header("Location: /systemuser/login");
        }
    }

    function logout()
    {
        //destroy session variables
        session_unset();
        session_destroy();
        session_regenerate_id(true);
        header("Location: /login ");
    }

    function sendmail()
    {
        if (!isset($_POST['login']) && !isset($_SESSION['login'])) {
            header("Location: /systemuser/login");
        }
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {

                date_default_timezone_set("Asia/Calcutta");
                $cur_date = date('Y-m-d');
                $dateinsec = strtotime($cur_date);

                $diff = 10520000;

                $all_donors = $this->model->getAllDonorDetailsJoin();  
                

                $output = array();
                $number_of_results = count($all_donors);
                for ($i=0; $i < $number_of_results; $i++) { 
                    $last_date = strtotime($all_donors[$i]['lastdate']);
                    
                    if ($all_donors[$i]['District'] == $_POST['district'] && $dateinsec - $last_date >= $diff && $all_donors[$i]['BloodType']= $_POST['bloodtype']) {
                        $output = array_merge($output,$all_donors[$i]);
                        $email = $all_donors[$i]['Email'];
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
                    $mail->addAddress($email); //Recipient name is optional                                                                                         

                    //Address to which recipient will reply
                    $mail->addReplyTo("noreply@lifeline.com", "Life Line");


                    //Send HTML or Plain Text email
                    $mail->isHTML(true);

                    $mail->Subject = "Kind Information On Shortage Of Blood";
                    $mail->Body = "<p>There is a need for the bloodgroup of ".$all_donors[$i]['BloodType']." at this moment in bloodbank. Kindly ass with all your comfort, Visit bloodbank to donate blood and to be part of a helping service. </p>";
                    $mail->AltBody = "This is the plain text version of the email content";

                    try {
                        $mail->send();
                    } catch (Exception $e) {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    }

                
                    }
                    
                }

                 header("Location: /systemuser/dashboard?mail=sent");
                    exit;
                }else {
                    header("Location: /systemuser/login");
                }
        }
        

    }

    
}