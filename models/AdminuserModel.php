<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require '../vendor/autoload.php';


class AdminuserModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function authenticate($email, $pwd)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $hashed = $this->db->select("password", "user", "WHERE email = :email ;", ':email', $email);

            if (password_verify($pwd, $hashed[0]['password'])) {
                return true;
            } else return false;
        
        } else return false;
    
    }

    public function getHospitals(){
        $hospitals = $this->db->select(array("UserID","Name","District","Status"),"hospital_medicalcenter", "WHERE Status = :Status ;", ':Status', 0);
        return $hospitals;
    }

    public function getUserName($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $user_name = $this->db->select("username","user","WHERE email =:email",':email',$email);
            $name_user = $user_name[0]['username'];
            return $name_user;

        
        } 

    }

    public function getpassword($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $user_password = $this->db->select("Password","user","WHERE email =:email",':email',$email);
            $password_user = $user_password[0]['Password'];
            return $password_user;
        
        } 
    }

    public function getuserimg($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $type = $this->db->select("userpic","user","WHERE email =:email",':email',$email);
            $user_pic = $type[0]['userpic'];
            return $user_pic;
        } 
    }

    public function gettype($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $type = $this->db->select("usertype","user","WHERE email =:email",':email',$email);
            $type_of_user = $type[0]['usertype'];
            return $type_of_user;
        
        } 
    }

    public function checkMail($email)
    {
        $res = ($this->db->select('userID', "user", "WHERE email = :email;", ':email', $email));
        if(!empty($res)){
            return true;
        }
        else{
            return false;
        }

    }

    public function updatePassword($email, $pwd)
    {
        $passw = password_hash($pwd, PASSWORD_DEFAULT);
        $result = $this->db->update("user", "password", ":password", $passw, ':email', $email, "WHERE email = :email");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    public function getUserId($email)
    {
        if ($this->db->select('UserID', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $user_ID = $this->db->select("UserID","user","WHERE email =:email",':email',$email);
            $user_ID = $user_ID[0]['user_ID'];
            return $user_ID;

        
        } 

    }
    
    public function insertToken($email)
    {
        if ($this->db->select('UserID', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $user_ID = $this->db->select("UserID","user","WHERE email =:email",':email',$email);
            $user_ID = $user_ID[0]['user_ID'];
            return $user_ID;

        
        } 

    }

    //Function to get the type of the user when user id is passed
    public function getUserType($user_id)
    {     
        $data = $this->db->select("UserType", "user", "WHERE UserID = :user_id",':user_id',$user_id);
        return $data[0]['UserType'];
    }
    
    //Function to get the details of the hospital/medical center when user id is passed
    public function getHosMedDetails($user_id)
    {
        $data1 = $this->db->select("*", "hospital_medicalcenter", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select Email,Username,Password from user table
        $data2 = $this->db->select("Email,Username,Password", "user", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select ContactNumber from usercontactnumber table
        $data3 = $this->db->select("ContactNumber", "usercontactnumber", "WHERE UserID = :user_id",':user_id',$user_id);
        $data = array_merge($data1,$data2,$data3);
        //Return data as a single array
        return $data;

    }

    // Function to validate the user when the user id is passed
    public function validate_user($user_id)
    {
        $result = $this->db->update("hospital_medicalcenter", "Status", ":status", 1, ':user_id', $user_id, "WHERE UserID = :user_id");
        if($result == "Success")
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //Function to send the email to the hospital/medical center
    public function validate_user_email($user_id)
    {
        // Get the email id based on the Hospital/Medical Center user id
        $data = $this->db->select("Email", "user", "WHERE UserID = :UserID", "UserID", $user_id);
        $Email = $data[0]['Email'];
        // Send the validation acceptance email
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                     // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                      // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                              // Enable SMTP authentication
        $mail->Username = 'lifeline.managementservices@gmail.com';
        $mail->Password = 'kelpqmxgangljbqj';

        $mail->From = 'lifeline.managementservices@gmail.com';
        $mail->FromName = 'Life Line';
        $mail->addAddress($Email);                           // Add a recipient
        $mail->addReplyTo("noreply@lifeline.com", "Life Line");
        $mail->isHTML(true);                                 // Set email format to HTML
        $mail->Subject = "Registration acceptance verification";
        $mail->Body    = "<p>This email is to confirm that your registration has been approved for 'LIFELINE' blood banks and donation management system. <br>Now you can use login to the system and stay in connect with us.</p>";
        $mail->AltBody = "This email is to confirm that your registration has been approved for 'LIFELINE' blood banks and donation management system. <br>Now you can use login to the system and stay in connect with us.";
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
            return true;
        }
    }

    
}
