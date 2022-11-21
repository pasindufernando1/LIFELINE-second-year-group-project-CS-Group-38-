<?php
session_start();

class Donorsignup extends Controller
{
    function __construct()
    {
        parent::__construct();
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
        if($_POST['g1']== "on" ||$_POST['g2']== "on"||$_POST['g3']== "on"){
            header("Location: /donor/regunseccessful");
        }
        else{
            $email = $_POST['email'];
            if($this->model->ifinsystem($email)){
                print_r('email in use');
            }
            else{
                $password = $_POST['password'];
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $type = 'donor';
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
                    if($this->model->insertdonor($donor_input)){
                        $this->view->render('authentication/donorsignupsuccessful');
                    }
               }

            }
        }

    }

    function regunseccessful(){
        $this->view->render('authentication/donorsignupunsuccessful');
        exit;
    }
}


