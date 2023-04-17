<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require '../vendor/autoload.php';

class NotificationsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }


    public function getUserID($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $ID = $this->db->select("userID","user","WHERE email =:email",':email',$email);
            $orgID = $ID[0];
            /* print_r($orgID);die(); */
            return $orgID;
        } 
    }

    public function getBloodBankID($campid){
        
        $BloodbankID = $this->db->select("BloodBankID","donation_campaign","WHERE CampaignID =:campid",':campid',$campid);
        return $BloodbankID;
        /* $district=$this->db->select("District","bloodbank","WHERE BloodBankID =:BloodbankID",':BloodbankID',$BloodbankID);
        
        $donorsList= $this->db->select("donorID","donor");
        print_r($donorsList);die(); */
    }

    public function getDistrict($BloodbankID){
        $district = $this->db->select("District","bloodbank","WHERE BloodBankID  =:BloodbankID",':BloodbankID',$BloodbankID);
        return $district;
        //print_r($district);die();
    }

    public function getDonorList($district){
        $donor = $this->db->select("UserID","donor","WHERE District  =:district",':district',$district);
        //print_r($donor);die();
        return $donor;
        
    }

    public function sendThankEmail($donorList,$campid){
        //print_r(($donorList[2]['UserID']));die();
        $data=$this->db->select("*", "donation_campaign", "WHERE CampaignID = :CampaignID", "CampaignID", $campid);
        $date=$data[0]['Date'];
        //print_r(($date));die();
        $start=$data[0]['Starting_time'];
        $end=$data[0]['Ending_time'];
        $location=$data[0]['Location'];

        //print_r($donorList);die();
        //print_r($data[0]['Date']);die();
        for($i=0;$i<sizeof($donorList);$i++){
            
            $data = $this->db->select("Email", "user", "WHERE UserID = :UserID", "UserID", $donorList[$i]['UserID']);
            
            $Email=$data[0]['Email'];
            //print_r($Email);die();
            $donor = $this->db->select("Fullname", "donor", "WHERE UserID = :UserID", "UserID", $donorList[$i]['UserID']);
            $name=$donor[0]['Fullname'];
            //print_r($name);die();
            $mail = new PHPMailer(true);
            $mail->isSMTP();                                     // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                      // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                              // Enable SMTP authentication
            $mail->Username = 'lifeline.managementservices@gmail.com';
            $mail->Password = 'kelpqmxgangljbqj';

            $mail->From = 'lifeline.managementservices@gmail.com';
            $mail->FromName = 'Life Line';
            $mail->addAddress($Email);  
            
                                     // Add a recipient
            $mail->addReplyTo("noreply@lifeline.com", "Life Line");
            $mail->isHTML(true);                                 // Set email format to HTML
            $mail->Subject = " Join Our Blood Donation Campaign and Save Lives";
            $mail->Body    = "<p>Dear $name,</p><p>We hope this email finds you in good health and spirits. We are writing to you today to inform you of an upcoming blood donation campaign, and we invite you to join us in making a difference.</p><p>As you may know, donating blood is one of the most selfless and rewarding things a person can do. Your donation could mean the difference between life and death for someone in need. Every year, countless people require blood transfusions due to accidents, surgeries, and medical conditions such as cancer and sickle cell anemia. Without donors like you, many of these people would not survive.</p>
            <p>Our blood donation campaign will take place on $date from $start to $end at $location. We have taken all the necessary precautions to ensure that the donation process is safe and hygienic, and we will strictly adhere to all the Covid-19 protocols.</p>";
            $mail->AltBody = "Thank you for your donation bearing the donation number This email is to confirm that we have received your donation and you have contributed to saving lives.";
             if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
                
            } 
        }

        return true;
        
        
        
        // Send the a thanking email to the email obtained using smtp server phpmailer
        
        
    }
    

}