<?php
session_start();
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
        
        //if already logged in redirect to the admin dashboard
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Organization/Society") {
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
            $_SESSION['login'] = "loggedin";
            $_SESSION['username'] = $this->model->getUserName($uname);
            $this->view->render('organization/dashboard');

            
        }
         else {
            $_SESSION['error'] = 'Incorrect Username or Password';
            header("Location: /organization/login");
        }
    }

    function logout()
    {
        //destroy session variables
        session_unset();
        session_destroy();
        session_regenerate_id(true);
        header("Location: /organization/login");
    }

    function processSignup(){
    
    
        
            if (!isset($_POST['signup'])) {
                header("Location: /organization/signup");
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
            $Email = $_POST['email'];
            $ContactNumber = $_POST['tel'];
            $Username = $_POST['uname'];
            $Userpic = 'default-path';
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // $inputs = array($Name, $Registration_no, $Status, $Number, $LaneName, $City, $District, $Province, $Email, $ContactNumber, $Username, $UserID, $Password);

            $inputs1 = array($Email, $Password, $Username, $Userpic, 'Organization/Society');
            $inputs2 = array($Registration_no, $Name, $Number, $LaneName, $City, $District, $Province, $Status);
            $inputs3 = array($ContactNumber);


            if ($this->model->signupOrganization($inputs1, $inputs2, $inputs3)) {
                header("Location: /usermanage/add_hosmed_successful");
            }
            
        
    
    }

    function forgetPassword()
    {
        $this->view->render('signup/hospitalsignup');
    }
}