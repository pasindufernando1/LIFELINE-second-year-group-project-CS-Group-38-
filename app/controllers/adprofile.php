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
        $target_dir = "C:/xampp/htdocs/public/img/user_pics/";
        $file_upload = false;
        // Checking whether a file is uploaded
        if ($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
            $filename = basename($_FILES["fileToUpload"]["name"]);
            // Get only the filename without the extension
            $filename = pathinfo($filename, PATHINFO_FILENAME);
            // Renaming the filename with the $filename + current timestamp
            $filename = $filename . time();
            // Adding the extension back to the filename
            $filename = $filename . "." . pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION);
            $file_upload = true;
        } else {
            $filename = $_SESSION['user_pic'];
        }
        $target_file = $target_dir . $filename;
        
        
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if($file_upload){
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

        }

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

