<?php
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

    // Function to get all the inventory details
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
        return $data;
    }

    //Get filtered inventory details
    public function getFilteredInventoryDetails($inventoryname, $bloodbankname)
    {   
        // Get the blood bank id for a given blood bank name
        $bank_id = $this->getBankID($bloodbankname);
        
        // Get the inventory ids for a given inventory name
        $inventory_id = $this->getInventoryTypeID($inventoryname);

        $columns = array(":InventoryID",":BloodBankID");
        $values = array($inventory_id,$bank_id);

        $data = $this->db->select("*", "bank_inventory_categories", "WHERE InventoryID = :InventoryID AND BloodBankID = :BloodBankID",$columns, $values);
        foreach ($data as $key => $value) {
            $data[$key]['BloodBank_Name'] = $this->getBankName($value['BloodBankID']);
        }
        //Take the inventory type name and category for each inventory type id and add it to the array
        foreach ($data as $key => $value) {
            $data[$key]['Inventory_Name'] = $this->getInventoryTypeName($value['InventoryID']);
            $data[$key]['Inventory_Category'] = $this->getInventoryCategoryName($value['InventoryID']);
        }
        return $data;
    }

    // Get the inventory details for a particular blood bank
    public function getFilteredInventoryForBank($bloodbankname)
    {
        // Get the blood bank id for a given blood bank name
        $bank_id = $this->getBankID($bloodbankname);
        $data = $this->db->select("*", "bank_inventory_categories", "WHERE BloodBankID = :BloodBankID", "BloodBankID", $bank_id);
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

    // Get all filtered inventory details for a given inventory name
    public function getAllFilteredInventoryDetails($inventory_name)
    {
        // Get the inventory ids for a given inventory name
        $inventory_id = $this->getInventoryTypeID($inventory_name);
        $data = $this->db->select("*", "bank_inventory_categories", "WHERE InventoryID = :InventoryID", "InventoryID", $inventory_id);
        // Take the blood bank name for each blood bank id and add it to the array
        foreach ($data as $key => $value) {
            $data[$key]['BloodBank_Name'] = $this->getBankName($value['BloodBankID']);
        }
        //Take the inventory type name and category for each inventory type id and add it to the array
        foreach ($data as $key => $value) {
            $data[$key]['Inventory_Name'] = $this->getInventoryTypeName($value['InventoryID']);
            $data[$key]['Inventory_Category'] = $this->getInventoryCategoryName($value['InventoryID']);
        }
        return $data;
    }


    // // Get the inventory names of a given blood bank
    // public function getInventoryofBank($bloodbankname)
    // {
    //     // Get the blood bank id for a given blood bank name
    //     $bank_id = $this->getBankID($bloodbankname);
    //     // Get the inventory ids for a given blood bank id

    // }

    // Get the blooddbank id for a given blood bank name
    public function getBankID($bank_name)
    {
        $data = $this->db->select("BloodBankID", "bloodbank", "WHERE BloodBank_Name = :BloodBank_Name", ":BloodBank_Name", $bank_name);
        return $data[0]['BloodBankID'];
    }

    //Get the current inventory names
    public function getAllInventoryName()
    {
        $data = $this->db->select("Name", "inventory","Null");
        // Get only the inventory names
        foreach ($data as $key => $value) {
            $data[$key] = $value['Name'];
        }
        return $data;
    }

    //Get the current blood bank names
    public function getAllBloodBankName()
    {
        $data = $this->db->select("BloodBank_Name", "bloodbank","Null");
        // Get only the blood bank names
        foreach ($data as $key => $value) {
            $data[$key] = $value['BloodBank_Name'];
        }
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

    // Get the inventory type id for a given inventory name
    public function getInventoryTypeID($inventory_name)
    {
        $data = $this->db->select("InventoryID", "inventory", "WHERE Name = :Name", "Name", $inventory_name);
        return $data[0]['InventoryID'];
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
    public function verifyAcceptance($InvDonationID)
    {
        // Get the inventory quantity based on the donation id
        $data = $this->db->select("Quantity", "inventory_donation", "WHERE InventoryDonationID = :DonationID", "DonationID", $InvDonationID);
        $Quantity = $data[0]['Quantity'];
        // Get the inventory category based on the donation id
        $data = $this->db->select("Inventory_category", "inventory_donation", "WHERE InventoryDonationID = :DonationID", "DonationID", $InvDonationID);

        $Inventory_category = $data[0]['Inventory_category'];
        // Get the inventory type id based on the inventory category
        $data = $this->db->select("InventoryID", "inventory", "WHERE Name = :Name", "Name", $Inventory_category);
        $InventoryID = $data[0]['InventoryID'];
        // Get the DonationID based on the inventory donation id
        $data = $this->db->select("DonationID", "inventory_donation", "WHERE InventoryDonationID = :DonationID", "DonationID", $InvDonationID);
        $DonationID = $data[0]['DonationID'];
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
                $conditionvalues = array($InvDonationID);
                $result_final = $this->db->update("inventory_donation","Admin_verify",":Admin_verify",1,$conditionparams,$conditionvalues,"WHERE InventoryDonationID = :DonationID");
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
                    $conditionvalues = array($InvDonationID);
                    $result_final = $this->db->update("inventory_donation","Admin_verify",":Admin_verify",1,$conditionparams,$conditionvalues,"WHERE InventoryDonationID = :DonationID");
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
    public function sendThankEmail($InvDonationID)
    {
        // Get the OrganizationID based on the donation id
        $data = $this->db->select("Organization_UserID", "inventory_donation", "WHERE InventoryDonationID = :DonationID", ":DonationID", $InvDonationID);
        $OrganizationUserID = $data[0]['Organization_UserID'];
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
        $mail->Body    = "<p>Thank you for your donation bearing the donation number : $InvDonationID. </p><p>This email is to confirm that we have received your donation and you have contributed to saving lives.</p>";
        $mail->AltBody = "Thank you for your donation bearing the donation number : $InvDonationID. This email is to confirm that we have received your donation and you have contributed to saving lives.";
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
            return true;
        }
    }
}