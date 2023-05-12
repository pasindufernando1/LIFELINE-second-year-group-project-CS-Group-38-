<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require '../vendor/autoload.php';

class FeedbacksModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    // Function to get all the feedbacks
    public function getAllFeedbacks()
    {
        $data = $this->db->select("*", "organization_feedback" , "INNER JOIN organization_society ON organization_feedback.OrganizationUserID = organization_society.UserID Where Read_status = 0 ORDER BY Date DESC");
        return $data;
    }

    // Function to mark th feedback as read
    public function markread($feedbackid){
        $result = $this->db->update("organization_feedback","Read_status",":Read_status",1,":FeedbackID",$feedbackid,"WHERE FeedbackID = :FeedbackID");
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    //Function to send email to the user
    public function sendemail($feedbackid){
        // Get the organization user id by the feedback id
        $data = $this->db->select("OrganizationUserID", "organization_feedback", "WHERE FeedbackID = :FeedbackID",":FeedbackID",$feedbackid);
        $organizationID = $data[0]['OrganizationUserID'];
        // Get the email of the organization user
        $data = $this->db->select("Email", "user", "WHERE UserID = :UserID",":UserID",$organizationID);
        $email = $data[0]['Email'];

        // Get the feedback message
        // Send the a thanking email to the email obtained using smtp server phpmailer
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                     // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                      // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                              // Enable SMTP authentication
        $mail->Username = 'lifeline.managementservices@gmail.com';
        $mail->Password = 'kelpqmxgangljbqj';

        $mail->From = 'lifeline.managementservices@gmail.com';
        $mail->FromName = 'Life Line';
        $mail->addAddress($email);                           // Add a recipient
        $mail->addReplyTo("noreply@lifeline.com", "Life Line");
        $mail->isHTML(true);                                 // Set email format to HTML
        $mail->Subject = "Feedback received";
        $mail->Body    = "<p>Thank you for your feedback bearing the feedback number : $feedbackid. </p><p>This email is to confirm that we have received your feedback and we will take that into consideration soon.</p>";
        $mail->AltBody = "Thank you for your feedback bearing the feedback number : $feedbackid. </p><p>This email is to confirm that we have received your feedback and we sill take that into consideration soon.";
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
            return true;
        }        


    }

    // Get the feedbacks for a month and year
    public function getFilteredFeedbacksDate($month,$year)
    {
        // The date format is YYYY-MM-DD comparing the month and year components separately
        $columns = array(":Month",":Year");
        $values = array($month,$year);
        $data = $this->db->select("*", "organization_feedback","INNER JOIN organization_society ON organization_feedback.OrganizationUserID = organization_society.UserID WHERE MONTH(Date) = :Month AND YEAR(Date) = :Year AND Read_status = 0 ORDER BY Date DESC",$columns,$values);
        return $data;
    }

    // Get the feedbacks for a month
    public function getFilteredFeedbacksMonth($month)
    {
        $data = $this->db->select("*", "organization_feedback","INNER JOIN organization_society ON organization_feedback.OrganizationUserID = organization_society.UserID WHERE MONTH(Date) = :Month AND Read_status = 0 ORDER BY Date DESC","Month",$month);
        return $data;
    }

    // Get the feedbacks for a year
    public function getFilteredFeedbacksYear($year)
    {
        $data = $this->db->select("*", "organization_feedback","INNER JOIN organization_society ON organization_feedback.OrganizationUserID = organization_society.UserID WHERE YEAR(Date) = :Year AND Read_status = 0 ORDER BY Date DESC","Year",$year);
        return $data;
    }

    


    
}