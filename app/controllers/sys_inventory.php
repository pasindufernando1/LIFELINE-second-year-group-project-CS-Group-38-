<?php
session_start();

class Sys_inventory extends Controller
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
                $_SESSION['inv_types'] = $this ->model-> getAllInvTypes();
                $_SESSION['invtypes'] = $this ->model-> getAllTypes();
                $_SESSION['inv'] = $this ->model-> getAllInventory($BloodBankID);

                if(isset($_GET['filtered'])){
                    $_SESSION['inv'] =$_SESSION['filtered_inv'] ;
                }

                if(isset($_POST['filter'])){
                   
                    $output = array();
                    foreach ($_POST['inv-type'] as $row) {
                        $rows = $this->model->getInv($row,$BloodBankID);
                        $output = array_merge($output,$rows);
                    }
        
                    $_SESSION['inv'] = $output;
                

                }

                $this->view->render('systemuser/inventory/inventory');
                exit;
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
                $this->view->render('systemuser/inventory/inventory_add');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function request()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $BloodBankID = $this ->model -> getBloodBankid($_SESSION['useremail']);
                $_SESSION['invdonation'] = $this ->model-> getAllInvDonation($BloodBankID);
                // print_r($_SESSION['invdonation']);die();
                $_SESSION['count_ver']  = $this ->model-> getCountVer($BloodBankID);
                $_SESSION['count_non_ver']  = $this ->model-> getCountVer2($BloodBankID);
                // print_r($_SESSION['count_ver']);die();
                $_SESSION['contri'] = $this ->model-> getAllContri($BloodBankID);
                
                if(isset($_GET['filtered'])){
                    $_SESSION['invdonation'] =$_SESSION['filtered_invdon'] ;
                }

                if(isset($_POST['filter'])){
                    $start = $_POST['start'];
                    $end = $_POST['end'];
                    $status = $_POST['status'];
                    $output = array();
                    
                    if ($status == 0) {
                        $rows = $this->model->getfilterdoninv($BloodBankID,$start,$end);
                        $output = array_merge($output,$rows);
                    } else {
                        $rows = $this->model->getfilterdoninvf($BloodBankID,$start,$end);
                        $output = array_merge($output,$rows);
                    }
                    
                
                    $_SESSION['invdonation'] = $output;
                

                }
                
                $this->view->render('systemuser/inventory/inventory_request');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }


    function verify($id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $BloodBankID = $this ->model -> getBloodBankid($_SESSION['useremail']);
                $date = date('y-m-d');
                
                $res = $this->model->verifyDonation($id,$date);
                
                if ($res) {
                    header('Location:/sys_inventory/request?page=1');
                }
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
                $this->view->render('systemuser/inventory/inventory_view');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function add_quantity($id) 
    {
         if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $BloodBankID = $this ->model -> getBloodBankid($_SESSION['useremail']);
                $cur_quan = $this ->model -> getQuantity($id,$BloodBankID);
                $added = $cur_quan + $_POST['quantity'];
                $res = $this->model-> addQuantity($id,$BloodBankID,$added);
                if ($res) {
                    header('Location:/sys_inventory?page=1');
                    exit;
                }                       
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function substract_quantity($id) 
    {
         if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $BloodBankID = $this ->model -> getBloodBankid($_SESSION['useremail']);
                $cur_quan = $this ->model -> getQuantity($id,$BloodBankID);
                $added = $cur_quan - $_POST['quantity'];
                $res = $this->model-> addQuantity($id,$BloodBankID,$added);
                if ($res) {
                    header('Location:/sys_inventory?page=1');
                    exit;
                }                       
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function store()
    {
        
        $BloodBankID = $this ->model -> getBloodBankid($_SESSION['useremail']);
        $res = $this-> model-> checkInventory($_POST['name'],$_POST['type']);
        if ($res) {
            $invID = $this-> model-> getID($_POST['name'],$_POST['type']);
           $res1 = $this-> model-> checkInv($BloodBankID,$invID);
           if ($res1) {
                $cur_quan = $this ->model -> getQuantity($invID,$BloodBankID);
                $added = $cur_quan + $_POST['quantity'];
                $res2 = $this->model-> addQuantity($invID,$BloodBankID,$added);
                if ($res2) {
                    header('Location:/sys_inventory?page=1');
                }
           } else {
                $res2 = $this-> model-> addInv($BloodBankID,$invID,$_POST['quantity']);
                if ($res2) {
                    header('Location:/sys_inventory?page=1');
                }
           }
           
        } else {
            $res1 = $this-> model-> addInventory($_POST['name'],$_POST['type']);
            $invID = $this-> model-> getID($_POST['name'],$_POST['type']);
            $res2 = $this-> model-> addInv($BloodBankID,$invID,$_POST['quantity']);

            if ($res1 && $res2) {
               header('Location:/sys_inventory?page=1');
            }
        }
        
    }
}