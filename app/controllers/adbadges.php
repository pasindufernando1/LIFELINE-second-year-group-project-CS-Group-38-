<?php
session_start();

class Adbadges extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $this->view->render('admin/badges');
                exit;
            }
        }    
        else{
            $this->view->render('authentication/login');
        }
    }

    //Get the badge types
    function type()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['badges'] = $this->model->getAllBadgeDetails();
                $this->view->render('admin/badges');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }    
    }

    // Give add badge page
    function add_badge()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['Badgeno'] = $this->model->getNextBadgeNo();
                $this->view->render('admin/add_badge');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }
    }

    // Function to process new badge addition
    function add_badge_done()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {

                $target_dir = "C:/xampp/htdocs/public/img/badges/";
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
                if ($_FILES["fileToUpload"]["size"] > 10000000) {
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
                        $uploadOk = 0;
                    }
                }
                
                // Updating tables
                if (isset($_SESSION['login']) && $uploadOk == 1) {
                    if ($_SESSION['type'] == "Admin") {

                        $Badgename = $_POST['badgename'];
                        $Constraint = $_POST['constraint'];

                        $inputs =array($Badgename,$Constraint,$filename);

                        if($this->model->addBadge($inputs)){
                            $this->view->render('admin/add_badge_success');
                            exit;
                        }
                        
                        
                    }
                }
                else{
                    $this->view->render('authentication/login');
                    
                }
            }
        }
    }    
}

