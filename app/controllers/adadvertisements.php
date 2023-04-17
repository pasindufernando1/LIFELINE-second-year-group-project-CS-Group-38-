<?php
session_start();

class Adadvertisements extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/advertisements');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    //Get the advertisements
    function type()
    {
        if (isset($_SESSION['login'])) {
            //print_r($_POST);die();
            if ($_SESSION['type'] == "Admin") {
                if(!isset($_POST['filter']))
                {
                    $_SESSION['cash_advertisements'] = $this->model->getAllCashAdvertisementsDetails();
                    $_SESSION['inventory_advertisements'] = $this->model->getAllInventoryAdvertisementsDetails();
                    $this->view->render('admin/advertisements');
                    exit;
                }
                if(isset($_POST['all_type'])){
                    $_SESSION['cash_advertisements'] = $this->model->getAllCashAdvertisementsDetails();
                    $_SESSION['inventory_advertisements'] = $this->model->getAllInventoryAdvertisementsDetails();
                    $this->view->render('admin/advertisements');
                    exit;
                }
                $output_cash = array();
                $output_inventory = array();
                // If both month and year is selected
                if(!empty($_POST['month']) && !empty($_POST['year'])){
                    $rows_cash = $this->model->getFilteredCashAdvertisements($_POST['month'],$_POST['year']);
                    $rows_inventory = $this->model->getFilteredInventoryAdvertisements($_POST['month'],$_POST['year']);
                    $output_cash = array_merge($output_cash,$rows_cash);
                    $output_inventory = array_merge($output_inventory,$rows_inventory);
                }
                // If only a month is selected
                if(!empty($_POST['month']) && empty($_POST['year'])){
                    $rows_cash = $this->model->getFilteredCashAdvertisementsMonth($_POST['month']);
                    $rows_inventory = $this->model->getFilteredInventoryAdvertisementsMonth($_POST['month']);
                    $output_cash = array_merge($output_cash,$rows_cash);
                    $output_inventory = array_merge($output_inventory,$rows_inventory);
                }
                // If only a year is selected
                if(!empty($_POST['year']) && empty($_POST['month'])){
                    $rows_cash = $this->model->getFilteredCashAdvertisementsYear($_POST['year']);
                    $rows_inventory = $this->model->getFilteredInventoryAdvertisementsYear($_POST['year']);
                    $output_cash = array_merge($output_cash,$rows_cash);
                    $output_inventory = array_merge($output_inventory,$rows_inventory);
                }
                $_SESSION['cash_advertisements'] = $output_cash;
                $_SESSION['inventory_advertisements'] = $output_inventory;
                $this->view->render('admin/advertisements');
                exit;
            }

        }
        else{
            $this->view->render('authentication/login');
            
        }    
    }

    // Give add advertisement page
    function add_advertisement()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/ad_type_selection');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }
    }

    function cash_donation()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/add_cash_donation');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }
    }

    function add_cashad_done()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $target_dir = "C:/xampp/htdocs/public/img/advertisements/";
                $filename = basename($_FILES["fileToUpload"]["name"]);
                // Get only the filename without the extension
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                // Renaming the filename with the $filename + current timestamp
                $filename = $filename . time();
                // Adding the extension back to the filename
                $filename = $filename . "." . pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION);
                $target_file = $target_dir . $filename;
                
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                
                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

                

                if (isset($_SESSION['login'])) {
                    if ($_SESSION['type'] == "Admin") {

                        $Description = $_POST['description'];
                        $Total_amt = $_POST['total_amt'];
                        $BloodBankId = $_POST['bloodbankid'];
                        
                        //Get current date
                        $Publisheddate = date("Y-m-d");

                        $Ad_inputs = array($Publisheddate,$Description,$BloodBankId,$filename); 
                        $Donation_input = array($Publisheddate,"Cash",$Total_amt);

                        if($this->model->addCashDonation($Ad_inputs,$Donation_input)){
                            $this->view->render('admin/add_advertisement_success'); 
                            exit;
                        }
                    }
                }
                        
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }
    }

    function inv_donation(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['bloodbanks'] = $this->model->getBloodBankName();
                $this->view->render('admin/add_inv_donation');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }
    }

    function add_invad_done()
    {

        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $target_dir = "C:/xampp/htdocs/public/img/advertisements/";
                $filename = basename($_FILES["fileToUpload"]["name"]);
                // Get only the filename without the extension
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                // Renaming the filename with the $filename + current timestamp
                $filename = $filename . time();
                // Adding the extension back to the filename
                $filename = $filename . "." . pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION);
                $target_file = $target_dir . $filename;
                
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                
                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

                

                if (isset($_SESSION['login'])) {
                    if ($_SESSION['type'] == "Admin") {

                        $Description = $_POST['description'];
                        $Inventory_category = $_POST['inventory_category'];
                        $BloodBankId = $_POST['bloodbankid'];
                        
                        //Get current date
                        $Publisheddate = date("Y-m-d");

                        $Ad_inputs = array($Publisheddate,$Description,$BloodBankId,$filename); 
                        $Donation_input = array($Publisheddate,"Inventory",$Inventory_category);

                        if($this->model->addInvDonation($Ad_inputs,$Donation_input)){
                            $this->view->render('admin/add_advertisement_success'); 
                            exit;
                        }
                    }
                }
                        
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }


        
    }   
    
    // Function to archive an advertisement
    public function archive_add($Ad_id){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->model->archive_ad($Ad_id);
                $this->view->render('admin/ad_archive_success');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }
    }
}

