<?php
session_start();
$_SESSION['error'] = '';

class Validation extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function emailValidation()
    {    
        $email = $_POST['email'];
        $result = $this->model->findByEmail($email);
        if ($result) {
            echo "true";
        } else {
            echo "false";
        }
    }

    function regnoValidation()
    {      
        $regno = $_POST['regno'];
        $result = $this->model->findByRegno($regno);
        if ($result) {
            echo "true";
        } else { 
            echo "false";
        }

    }

    function orgregnoValidation(){
        $orgregno = $_POST['regnum'];
        $result = $this->model->findByOrgRegno($orgregno);
        if ($result) {
            echo "true";
        } else {
            echo "false";
        }
    }

}