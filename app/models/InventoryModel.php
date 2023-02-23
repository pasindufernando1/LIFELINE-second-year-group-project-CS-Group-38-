<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require '../vendor/autoload.php';

class InventoryModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllInventoryDetails()
    {
        $data = $this->db->select("*", "bank_inventory_categories","Null");
        // Take the blood bank name for each blood bank id and add it to the array
        foreach ($data as $key => $value) {
            $data[$key]['BloodBank_Name'] = $this->getBankName($value['BloodBankID']);
        }
        //Take the inventory type name and category for each inventory type id and add it to the array
        foreach ($data as $key => $value) {
            $data[$key]['Inventory_Name'] = $this->getInventoryTypeName($value['InventoryID']);
            $data[$key]['Inventory_Category'] = $this->getInventoryCategoryName($value['InventoryID']);
        }
        // print_r($data);die();
        return $data;
    }

    // Get the blood bank name for a given blood bank id
    public function getBankName($bank_id)
    {
        $data = $this->db->select("BloodBank_Name", "bloodbank", "WHERE BloodBankID = :BloodBankID", "BloodBankID", $bank_id);
        return $data[0]['BloodBank_Name'];
    }

    // Get the inventory type name for a given inventory type id
    public function getInventoryTypeName($inventory_type_id)
    {
        $data = $this->db->select("Name", "inventory", "WHERE InventoryID = :InventoryID", "InventoryID", $inventory_type_id);
        return $data[0]['Name'];
    }

    // Get the inventory category name for a given inventory type id
    public function getInventoryCategoryName($inventory_type_id)
    {
        $data = $this->db->select("Type", "inventory", "WHERE InventoryID = :InventoryID", "InventoryID", $inventory_type_id);
        return $data[0]['Type'];
    }

    public function getAllInventoryDonations()
    {
        
        $data = $this->db->select("*", "inventory_donation","WHERE Admin_verify = :Admin_verify",":Admin_verify",0);

        // print_r($data);die();
        return $data;
    }

    // Get the admin verify value for a given donation id
    public function getAdminVerify($donation_id)
    {
        $data = $this->db->select("Admin_verify", "inventory_donation", "WHERE DonationID = :DonationID", "DonationID", $donation_id);
        return $data[0]['Admin_verify'];
    }

    // Get the inventory category name for a given donation id
    public function getInventoryCatName($donation_id)
    {
        $data = $this->db->select("Inventory_category", "inventory_donation", "WHERE DonationID = :DonationID", "DonationID", $donation_id);
        return $data[0]['Inventory_category'];
    }

    // Get the inventory quantity for a given donation id
    public function getInventoryQuantity($donation_id)
    {
        $data = $this->db->select("Quantity", "inventory_donation", "WHERE DonationID = :DonationID", "DonationID", $donation_id);
        return $data[0]['Quantity'];
    }

    // Get the inventory date for a given donation id
    public function getInventoryDate($donation_id)
    {
        $data = $this->db->select("Accepted_date", "inventory_donation", "WHERE DonationID = :DonationID", "DonationID", $donation_id);
        if($data[0]['Accepted_date'] == NULL)
            return "Pending";
        else
            return "Validated";
    }

    // Function to verify the acceptance of inventory donations
    public function verifyAcceptance($DonationID)
    {
        // Get the inventory quantity based on the donation id
        $data = $this->db->select("Quantity", "inventory_donation", "WHERE DonationID = :DonationID", "DonationID", $DonationID);
        $Quantity = $data[0]['Quantity'];
        // Get the inventory category based on the donation id
        $data = $this->db->select("Inventory_category", "inventory_donation", "WHERE DonationID = :DonationID", "DonationID", $DonationID);

        $Inventory_category = $data[0]['Inventory_category'];
        // Get the inventory type id based on the inventory category
        $data = $this->db->select("InventoryID", "inventory", "WHERE Name = :Name", "Name", $Inventory_category);
        $InventoryID = $data[0]['InventoryID'];
        // Get the blood bank id based on the donation id
        $data = $this->db->select("BloodBankID", "organization_donations_bloodbank", "WHERE DonationID = :DonationID", "DonationID", $DonationID);
        $BloodBankID = $data[0]['BloodBankID'];
        $columns =array(":BloodBankID",":InventoryID");
        $values = array($BloodBankID,$InventoryID);
        // Check if the inventory category already exists in the bank_inventory_categories table
        $data = $this->db->select("*", "bank_inventory_categories", "WHERE BloodBankID = :BloodBankID AND InventoryID = :InventoryID",$columns, $values);
        // If the inventory category exists, update the quantity
        if($data != NULL)
        {
            $data = $this->db->select("Quantity", "bank_inventory_categories", "WHERE BloodBankID = :BloodBankID AND InventoryID = :InventoryID",$columns, $values);
            $Quantity = $Quantity + $data[0]['Quantity'];
            $columns =array("BloodBankID","InventoryID","Quantity");
            $params =array(":BloodBankID",":InventoryID",":Quantity");
            $values = array($BloodBankID,$InventoryID,$Quantity);
            $conditionparams = array(":BloodBankID",":InventoryID");
            $conditionvalues = array($BloodBankID,$InventoryID);
            $result = $this->db->update("bank_inventory_categories","Quantity",":Quantity",$Quantity,$conditionparams,$conditionvalues,"WHERE BloodBankID = :BloodBankID AND InventoryID = :InventoryID");
            if($result == "Success"){
                // Set admin verified to true
                $columns =array("Admin_verify");
                $params =array(":Admin_verify");
                $values = array(1);
                $conditionparams = array(":DonationID");
                $conditionvalues = array($DonationID);
                $result_final = $this->db->update("inventory_donation","Admin_verify",":Admin_verify",1,$conditionparams,$conditionvalues,"WHERE DonationID = :DonationID");
                if($result_final == "Success")
                {    return true;
                }else{
                    print_r($result_final);
                    print_r($result);
                }
            }
            }else{
                // If the inventory category does not exist, insert it into the bank_inventory_categories table
                $columns =array("BloodBankID","InventoryID","Quantity");
                $params =array(":BloodBankID",":InventoryID",":Quantity");
                $values = array($BloodBankID,$InventoryID,$Quantity);
                $result = $this->db->insert("bank_inventory_categories",$columns,$params,$values);
                if($result == "Success"){
                    // Set admin verified to true
                    $columns =array("Admin_verify");
                    $params =array(":Admin_verify");
                    $values = array(1);
                    $conditionparams = array(":DonationID");
                    $conditionvalues = array($DonationID);
                    $result_final = $this->db->update("inventory_donation","Admin_verify",":Admin_verify",1,$conditionparams,$conditionvalues,"WHERE DonationID = :DonationID");
                    if($result_final == "Success")
                    {    return true;
                    }else{
                        print_r($result_final);
                        print_r($result);
                    }
                }
        }

    }

    // Function to send thank emails
    public function sendThankEmail($DonationID)
    {
        // Get the OrganizationID based on the donation id
        $data = $this->db->select("OrganizationUserID", "organization_donations_bloodbank", "WHERE DonationID = :DonationID", "DonationID", $DonationID);
        $OrganizationUserID = $data[0]['OrganizationUserID'];
        // Get the email id based on the OrganizationID
        $data = $this->db->select("Email", "user", "WHERE UserID = :UserID", "UserID", $OrganizationUserID);
        $Email = $data[0]['Email'];
        // Send the a thanking email to the email obtained using smtp server phpmailer
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
        $mail->Subject = "Donation acceptance verification";
        $mail->Body    = "<p>Thank you for your donation bearing the donation number : $DonationID. </p><p>This email is to confirm that we have received your donation and you have contributed to saving lives.</p>";
        $mail->AltBody = "Thank you for your donation bearing the donation number : $DonationID. This email is to confirm that we have received your donation and you have contributed to saving lives.";
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
            return true;
        }
    }
}