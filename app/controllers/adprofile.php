<?php
session_start();

class Adprofile extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['user_contact'] = $this->model->getUserContactNo($_SESSION['useremail']);
                $this->view->render('admin/profile');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    function edit()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {

                $_SESSION['user_contact'] = $this->model->getUserContactNo($_SESSION['useremail']);
                $_SESSION['userid'] = $this->model->getUserId($_SESSION['useremail']);
                $this->view->render('admin/edit_adprofile');
                exit;
            }
            } else {
                $this->view->render('authentication/login');
            }
    }

    function update()
    {
        
        

        if ($_SESSION['type'] == "Admin") {
            if (!isset($_POST['update-profile'])) {
                header("Location: /adprofile/edit");
                exit;
            }

            $Name = $_POST['Name'];
            $Email = $_POST['email'];
            $ContactNumber = $_POST['contact'];
            $$Password = $_POST['password'];
            if(empty($Password)){
                $Password = $_SESSION['Password'];
            }else{
                $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }
            
            

            $inputs1 = array($Email, $Password, $Name,$filename);
            $inputs2 = array($ContactNumber);

            

            if ($this->model->editAdmin($_SESSION['userid'],$inputs1, $inputs2)) {
                $_SESSION['user_pic'] = $this->model->getuserimg($_SESSION['userid']);
                $_SESSION['username'] = $this->model->getUserName($_SESSION['userid']);
                header("Location: /adprofile/editadmin_successful");
            }
            
             
        }    
    }

    function editadmin_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/editadmin_successful');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    
    



    
}

