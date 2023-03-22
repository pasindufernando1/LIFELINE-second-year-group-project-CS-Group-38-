<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require '../vendor/autoload.php';

class Blood_requests extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $BloodBankID = $this ->model -> getBloodBankid($_SESSION['useremail']);
                $_SESSION['requests'] = $this->model->getAllRequests($BloodBankID);
                // print_r($_SESSION['requests']);die();
                $this->view->render('systemuser/donorcards/donorcards');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function view()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $BloodBankID = $this ->model -> getBloodBankid($_SESSION['useremail']);
                $this->view->render('systemuser/donorcards/donorcards_view');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function request_view($id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $BloodBankID = $this ->model -> getBloodBankid($_SESSION['useremail']);
                $_SESSION['request'] = $this->model->getRequest($id);
                $group = $_SESSION['request'][0]['Blood_group'];
                $component = $_SESSION['request'][0]['Blood_component'];
                $_SESSION['quantity'] = $this->model->getQuantity($group,$component);
                $this->view->render('systemuser/donorcards/donorcards_view');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function accept($id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $req = $this->model->getRequest($id);
                $group = $req[0]['Blood_group'];
                $component = $req[0]['Blood_component'];
                $packs = $this->model->getAllPacks($group,$component);

                $Quantity = $req[0]['Quantity'];
                $i = 0;
                while ($Quantity > 0) {
                    $this->model->changeStatus($packs[$i]['PacketID'],$req[0]['Blood_component']);
                    $Quantity = $Quantity - $packs[$i]['Quantity'];
                    $i = $i +1;
                }
                date_default_timezone_set("Asia/Calcutta");
                $date = date('Y-m-d');
                $res = $this->model->changeDate($id,$date);

                if($res){
                    //Create an instance; passing `true` enables exceptions

        
                    $email = "shinthujeni@gmail.com";
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

                    $mail->Subject = "Blood Request Accepted";
                    $mail->Body = "<p>We have accepted your request. Kindly let us know the comfortable time to take your packets. </p>";
                    $mail->AltBody = "This is the plain text version of the email content";

                    try {
                        $mail->send();
                        header('Location: /blood_requests/request_view/'.$id.'?status=accepted');
                    } catch (Exception $e) {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    }

                   


                    
                }
                else {
                    echo $res;
                }
                
                
                 
                
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function reject($id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $req = $this->model->getRequest($id);
                
                
                $res = $this->model->changeStatusR($id);

                if($res){
                    $email = "shinthujeni@gmail.com";
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

                   $mail->Subject = "Blood Request Rejected";
                    $mail->Body = "<p>We have rejected your request for some reasons. Kindly contact us for further information. </p>";
                    $mail->AltBody = "This is the plain text version of the email content";

                    try {
                        $mail->send();
                        header('Location: /blood_requests/request_view/'.$id.'?status=rejected');
                    } catch (Exception $e) {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    }
                    

                }
                else {
                    echo $res;
                }
                
                
                 
                
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function add()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/donorcards/donorcards_add');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }
}