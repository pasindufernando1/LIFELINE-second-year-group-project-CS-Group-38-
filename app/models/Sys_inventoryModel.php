<?php

class sys_inventoryModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAllTypes()
    {
        $invTypes = $this->db->select("*","inventory",null);
        return $invTypes;
    }

    public function getBloodBankid($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $bloodbankid = $this->db->select("BloodBankID","system_user","INNER JOIN user on user.userID = system_user.userID WHERE user.email =:email",':email',$email);
            $blood_bank_id = $bloodbankid[0]['BloodBankID'];
            return $blood_bank_id;
        
        } 

    }

public function getAllInventory($id)
{
    $inv = $this->db->select("*","inventory","INNER JOIN bank_inventory_categories on inventory.InventoryID = bank_inventory_categories.InventoryID WHERE bank_inventory_categories.BloodBankID =:id",':id',$id);
    return $inv;
}

    public function getQuantity($id,$BloodBankID)
    {
        $param1 = array(':BloodBankID',':id');
        $inputs1 = array($BloodBankID,$id);
        $quan = $this->db->select("Quantity","bank_inventory_categories"," WHERE bank_inventory_categories.BloodBankID =:BloodBankID AND bank_inventory_categories.InventoryID = :id",$param1,$inputs1);
        return $quan[0]["Quantity"];
    }
    public function addQuantity($id,$BloodBankID,$quantity)
    {
        $columns1 = array('Quantity');
        $param1 = array(':quantity');
        $inputs1 = array($quantity);

        $param2 = array(':id',':BloodBankID');
        $inputs2 = array($id,$BloodBankID);     


        $result1 = $this->db->update("bank_inventory_categories", $columns1, $param1, $inputs1,$param2,$inputs2,"WHERE InventoryID = :id AND BloodBankID =:BloodBankID ");

        if($result1){
            return true;
        }
        else{
            return false;
        };
    }

    public function checkInventory($name,$type)
    {
        $param1 = array(':Name',':Type');
        $inputs1 = array($name,$type);
        if ($this->db->select('count', "inventory", "WHERE Name = :Name AND Type = :Type;", $param1, $inputs1) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function addInventory($name,$type)
    {
        $columns1 = array('Name','Type');
        $param1 = array(':name',':type');
        $inputs1 = array($name,$type);
        $result1 = $this->db->insert("inventory", $columns1, $param1, $inputs1);

        if($result1){
            return true;
        }
        else{
            return false;
        };
    }

    public function getID($name,$type)
    {
        $param1 = array(':Name',':Type');
        $inputs1 = array($name,$type);
        $id = $this->db->select('InventoryID', "inventory", "WHERE Name = :Name AND Type = :Type;", $param1, $inputs1);
        return $id[0]['InventoryID'];
        
    }

    public function addInv($id,$invid,$quan)
    {
        $columns1 = array('BloodBankID','InventoryID','Quantity');
        $param1 = array(':id',':invid',':quan');
        $inputs1 = array($id,$invid,$quan);
        $result1 = $this->db->insert("bank_inventory_categories", $columns1, $param1, $inputs1);

        if($result1){
            return true;
        }
        else{
            return false;
        };
    }

    public function checkInv($id,$BloodBankID)
    {

        $param1 = array(':BloodBankID',':id');
        $inputs1 = array($BloodBankID,$id);
        if ($this->db->select('count', "bank_inventory_categories", "WHERE BloodBankID = :BloodBankID AND InventoryID = :id;", $param1, $inputs1) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }

    public function getAllInvDonation($BloodBankID)
    {
        $invdon = $this->db->select("*","inventory_donation","
        INNER JOIN organization_donations_bloodbank ON inventory_donation.DonationID = inventory_donation.DonationID 
        INNER JOIN organization_society ON organization_society.UserID = organization_donations_bloodbank.OrganizationUserID
        WHERE organization_donations_bloodbank.BloodBankID =:BloodBankID",':BloodBankID',$BloodBankID);
        return $invdon;
    }

    public function getCountVer($BloodBankID)
    {
        $invdon = $this->db->select('count',"inventory_donation","
        INNER JOIN organization_donations_bloodbank ON inventory_donation.DonationID = inventory_donation.DonationID 
        INNER JOIN organization_society ON organization_society.UserID = organization_donations_bloodbank.OrganizationUserID
        WHERE organization_donations_bloodbank.BloodBankID =:BloodBankID AND Accepted_date IS NOT NULL",':BloodBankID',$BloodBankID);
        return $invdon;
    }

    public function getCountVer2($BloodBankID)
    {
        $invdon = $this->db->select('count',"inventory_donation","
        INNER JOIN organization_donations_bloodbank ON inventory_donation.DonationID = inventory_donation.DonationID 
        INNER JOIN organization_society ON organization_society.UserID = organization_donations_bloodbank.OrganizationUserID
        WHERE organization_donations_bloodbank.BloodBankID =:BloodBankID AND Accepted_date IS NULL",':BloodBankID',$BloodBankID);
        return $invdon;
    }

    public function getAllContri($BloodBankID)
    {
        $invdon = $this->db->select("DISTINCT organization_society.Name","inventory_donation","
        INNER JOIN organization_donations_bloodbank ON inventory_donation.DonationID = inventory_donation.DonationID 
        INNER JOIN organization_society ON organization_society.UserID = organization_donations_bloodbank.OrganizationUserID
        WHERE organization_donations_bloodbank.BloodBankID =:BloodBankID",':BloodBankID',$BloodBankID);
        return $invdon;
    }

    public function verifyDonation($id,$date)
    {
        $columns1 = array('Accepted_date');
        $param1 = array(':date');
        $inputs1 = array($date);


        $result1 = $this->db->update("inventory_donation", $columns1, $param1, $inputs1,':id',$id,"WHERE DonationID = :id ");

        if($result1){
            return true;
        }
        else{
            return false;
        };
    }


}