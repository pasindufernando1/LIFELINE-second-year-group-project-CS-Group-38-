<?php
session_start();

class Inventory extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/inventory');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/adminlogin');
        }
    }

    //Get the inventory types
    function type()
    {
        if (isset($_SESSION['login'])) {
            // Inventory category needed for the filtering
            $_SESSION['inventory_names'] = $this->model->getAllInventoryName();
            // Blood bank names needed for the filtering
            $_SESSION['bloodbank_names'] = $this->model->getAllBloodBankName();
            //To check whether a filter is applied
            if(isset($_GET['filter'])){
                $is_filtered = $_GET['filter'];
            }else{
                $is_filtered = false;
            }
            if ($_SESSION['type'] == "Admin") {
                if(!isset($_POST['filter']) && !$is_filtered){
                    $_SESSION['is_filtered'] = false;
                    $_SESSION['inventory'] = $this->model->getAllInventoryDetails();
                    $this->view->render('admin/inventory');
                    exit;
                }
                if(isset($_POST['filter'])){
                    if(isset($_POST['all_type'])){
                        $_SESSION['is_filtered'] = true;
                        $_SESSION['inventory'] = $this->model->getAllInventoryDetails();
                        $this->view->render('admin/inventory');
                        exit;
                    }
                    $output = array();
                    $_SESSION['is_filtered'] = true;
                    if(isset($_POST['blood_bank']) ){
                        $bloodbankname = $_POST['blood_bank'];
                        $Category_flag=0;
                        for($i = 0; $i < count($_SESSION['inventory_names']); $i++){
                            if(isset($_POST[$i])){
                                $Category_flag=1;
                                $rows = $this->model->getFilteredInventoryDetails($_POST[$i], $bloodbankname);
                                $output = array_merge($output, $rows);
                            }
                        }
                        // If the category is not selected
                        if($Category_flag==0){
                            
                            $rows = $this->model->getFilteredInventoryForBank($bloodbankname);
                            $output = array_merge($output, $rows);
                        }
                    }
                    else{
                        for($i = 0; $i < count($_SESSION['inventory_names']); $i++){
                            if(isset($_POST[$i])){
                                $rows = $this->model->getAllFilteredInventoryDetails($_POST[$i]);
                                $output = array_merge($output, $rows);
                            }
                        }
                    }
                    $_SESSION['inventory'] = $output;
                    

                }
                $this->view->render('admin/inventory');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }    
    }

    //Get the inventory donations
    function donations()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['inventory_donations'] = $this->model->getAllInventoryDonations();
                $this->view->render('admin/inventory_donations');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }    
    }

    //Verify acceptance
    function verify_acceptance($InvDonationID)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if($this->model->verifyAcceptance($InvDonationID) && $this->model->sendThankEmail($InvDonationID)){
                    $this->view->render('admin/verify_Invacceptance');
                    exit;
                }
                
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }    
    }

    // Block pending verifications
    function verifyblock()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/verifyblock');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }    
    }
    



    
}

