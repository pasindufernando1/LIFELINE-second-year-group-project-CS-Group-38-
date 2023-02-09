<?php
session_start();

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

                $email = $_POST['email'];
                $password = $_POST['password'];
                // print_r('password:');
                // print_r(strlen($password));
                // print_r('Ends of password');
                // die();
                $password = trim($password);
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $username = $_POST['uname'];

                if (strlen($password) > 0) {
                    $user_input = [$email, $hashed_password, $username];
                    $u_wp = $this->model->updateuserp(
                        $user_input,
                        $_SESSION['user_ID']
                    );
                } else {
                    $user_input = [$email, $username];
                    $u_p = $this->model->updateuser(
                        $user_input,
                        $_SESSION['user_ID']
                    );
                }

                if ($u_wp || $u_p) {
                    // $user_ID = $this->model->get_user_id($email);
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
                        $this->view->render('donor/profile_edit_successful');
                    }
                }
            }
        } else {
            $this->view->render('authentication/login');
        }
    }
}
