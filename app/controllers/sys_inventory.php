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
                $_SESSION['invtypes'] = $this ->model-> getAllTypes();
                $_SESSION['inv'] = $this ->model-> getAllInventory($BloodBankID);
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
                $this->view->render('systemuser/inventory/inventory_request');
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