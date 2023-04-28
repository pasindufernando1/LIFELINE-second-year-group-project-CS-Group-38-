<?php
session_start();

class Hospitals extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    

    function login()
    {
        
        if (isset($_SESSION['login'])) {  
            
            if ($_SESSION['type'] == "Hospital/Medical_Center") { 
                $user_pic = $this->model->getuserimg($uname);
                $_SESSION['user_pic'] = $user_pic;

                
                header("Location: /hospitaluser/dashboard");
                
    
                exit;
            }
        }
        else{
            $this->view->render('authentication/hospitalslogin');
        }
        
    }

    function signup(){
        // header("Location: /organizationuser/signuppage/");
        $this->view->render('signup/hospitalsignup');        
    }

    function hospitalsignupsuccessful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Hospital/Medical_Center") {
                $this->view->render('hospitals/add_request_successful');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/hospitalslogin');
        }
    }

}
