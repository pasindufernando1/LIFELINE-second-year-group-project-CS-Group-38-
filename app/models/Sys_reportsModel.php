<?php

class sys_reportsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getBloodBankid($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $bloodbankid = $this->db->select("BloodBankID","system_user","INNER JOIN user on user.userID = system_user.userID WHERE user.email =:email",':email',$email);
            $blood_bank_id = $bloodbankid[0]['BloodBankID'];
            return $blood_bank_id;
        
        } 

    }

    public function getAllReportDetails($bloodbankID)
    {
       $reports = $this->db->select("*","Report","WHERE SystemUserID =:bloodbankID",':bloodbankID',$bloodbankID);
        return $reports;
    }
    
    public function getfilterrep($bloodbankID,$start,$end)
    {
        $params = array(':bloodbankID',':start',':end');
        $inputs = array($bloodbankID,$start,$end);
        $reports = $this->db->select("*","Report","WHERE SystemUserID =:bloodbankID
        AND Date_Generated >= :start
        AND Date_Generated <= :end
        ",$params,$inputs);
        return $reports;
    }
    public function getfiltertype($type,$blood_bank_id,$start,$end)
    {
        $params = array(':type',':blood_bank_ID',':start',':end');
        $inputs = array($type,$blood_bank_id,$start,$end);
        $pack = $this->db->select("*","donor_bloodbank_bloodpacket","
        INNER JOIN bloodpacket on donor_bloodbank_bloodpacket.PacketID = bloodpacket.PacketID 
        INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID 
        WHERE bloodpacket.blood_bank_ID =:blood_bank_ID 
        AND donor_bloodbank_bloodpacket.Date >= :start 
        AND donor_bloodbank_bloodpacket.Date <= :end
        AND bloodcategory.Name = :type"
        
        ,$params,$inputs);
        return $pack;
    }

    public function getfiltertypes($type,$blood_bank_id,$subtype,$start,$end)
    {
        $params = array(':type',':blood_bank_ID',':subtype',':start',':end');
        $inputs = array($type,$blood_bank_id,$subtype,$start,$end);
        $pack = $this->db->select("*","donor_bloodbank_bloodpacket","
        INNER JOIN bloodpacket on donor_bloodbank_bloodpacket.PacketID = bloodpacket.PacketID 
        INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID 
        WHERE bloodpacket.blood_bank_ID =:blood_bank_ID  
        AND bloodcategory.Name = :type 
        AND bloodcategory.subtype = :subtype 
        AND donor_bloodbank_bloodpacket.Date >= :start 
        AND donor_bloodbank_bloodpacket.Date <= :end "
        ,$params,$inputs);
        return $pack;
    }

    public function getfilterdon($type,$blood_bank_id,$start,$end)
    {
        $params = array(':type',':blood_bank_ID',':start',':end');
        $inputs = array($type,$blood_bank_id,$start,$end);
        $pack = $this->db->select("*","donor_bloodbank_bloodpacket","
        INNER JOIN donor on donor_bloodbank_bloodpacket.DonorID = donor.UserID  
        WHERE donor_bloodbank_bloodpacket.BloodBankID =:blood_bank_ID  
        AND donor.BloodType = :type 
        AND donor_bloodbank_bloodpacket.Date >= :start 
        AND donor_bloodbank_bloodpacket.Date <= :end "
        ,$params,$inputs);
        return $pack;
    }

    public function getfilterexps($type,$blood_bank_id,$start,$end)
    {
        $params = array(':type',':blood_bank_ID',':start',':end');
        $inputs = array($type,$blood_bank_id,$start,$end);
        $pack = $this->db->select("*","donor_bloodbank_bloodpacket","
        INNER JOIN bloodpacket on donor_bloodbank_bloodpacket.PacketID = bloodpacket.PacketID 
        INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID 
        WHERE bloodpacket.blood_bank_ID =:blood_bank_ID  
        AND bloodcategory.Name = :type
        AND bloodpacket.Status = 2
        AND donor_bloodbank_bloodpacket.Date >= :start 
        AND donor_bloodbank_bloodpacket.Date <= :end "
        ,$params,$inputs);
        return $pack;
    }

    public function getfilterexp($type,$blood_bank_id,$subtype,$start,$end)
    {
        $params = array(':type',':blood_bank_ID',':subtype',':start',':end');
        $inputs = array($type,$blood_bank_id,$subtype,$start,$end);
        $pack = $this->db->select("*","donor_bloodbank_bloodpacket","
        INNER JOIN bloodpacket on donor_bloodbank_bloodpacket.PacketID = bloodpacket.PacketID 
        INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID 
        WHERE bloodpacket.blood_bank_ID =:blood_bank_ID  
        AND bloodcategory.Name = :type 
        AND bloodcategory.subtype = :subtype 
        AND bloodpacket.Status = 2
        AND donor_bloodbank_bloodpacket.Date >= :start 
        AND donor_bloodbank_bloodpacket.Date <= :end "
        ,$params,$inputs);
        return $pack;
    }


    public function getReservationName()
    {
        $coloum = $this->db->select("*","INFORMATION_SCHEMA.COLUMNS","WHERE TABLE_NAME = N'bloodpacket'",null);
        return $coloum;
    }

    public function addReport($name,$date,$entity,$csv_filename,$blood_bank_id)
    {
        $columns = array('Name', 'Date_Generated', 'Requesting_entity' , 'FileLink','SystemUserID');
        $param = array(':name', ':date', ':entity', ':csv_filename', ':blood_bank_id');
        $inputs = array($name,$date,$entity,$csv_filename,$blood_bank_id);
        $result = $this->db->insert("report", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    public function deleteReport($id)
    {
        $result = $this->db->delete("report", "WHERE  ReportID = :id ;", ':id', $id);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    
    }

    public function  getAllInvTypes()
    {
        $inv_types = $this->db->select("*","inventory","GROUP BY Type",null);
        return $inv_types;
    }

    public function getInv($type,$blood_bank_id)
    {
        $params = array(':type',':blood_bank_ID');
        $inputs = array($type,$blood_bank_id);
        $inv = $this->db->select("*","inventory","
        INNER JOIN bank_inventory_categories on bank_inventory_categories.InventoryID = inventory.InventoryID 
        WHERE bank_inventory_categories.BloodBankID =:blood_bank_ID  
        AND inventory.Type LIKE :type 
         "
        ,$params,$inputs);
        return $inv;
    }

    public function getAllorg($blood_bank_id)
    {
        $org = $this->db->select("*","organization_donations_bloodbank","
        INNER JOIN inventory_donation on organization_donations_bloodbank.DonationID = inventory_donation.DonationID 
        INNER JOIN organization_society on organization_donations_bloodbank.OrganizationUserID = organization_society.UserID 
        WHERE organization_donations_bloodbank.BloodBankID =:blood_bank_id  
        "
        ,':blood_bank_id',$blood_bank_id);
        return $org;
    }

    public function getCamporg($blood_bank_id)
    {
        $org = $this->db->select("DISTINCT organization_society.Name","donation_campaign","
        INNER JOIN organization_society on donation_campaign.OrganizationUserID = organization_society.UserID 
        WHERE donation_campaign.BloodBankID =:blood_bank_id  
        "
        ,':blood_bank_id',$blood_bank_id);
        return $org;
    }

    public function getInvdon($type,$blood_bank_id)
    {
        $params = array(':type',':blood_bank_ID');
        $inputs = array($type,$blood_bank_id);
        $inv = $this->db->select("*","organization_donations_bloodbank","
        INNER JOIN inventory_donation on organization_donations_bloodbank.DonationID = inventory_donation.DonationID 
        LEFT JOIN organization_society on organization_donations_bloodbank.OrganizationUserID = organization_society.UserID 
        WHERE organization_donations_bloodbank.BloodBankID =:blood_bank_ID  
        AND organization_society.name LIKE :type 
         "
        ,$params,$inputs);
        return $inv;
    }

    public function getAllDonorDetails()
    {
        // Get all the donor details
        $data = $this->db->select("*", "donor","Null");
        return $data;
    }
    
    //Get the donors based on the NIC
    public function getFilteredDonorDetailsNIC($nic)
    {
        $columns = array(":NIC");
        $values = array($nic);
        $data = $this->db->select("*", "donor", "WHERE NIC = :NIC",$columns, $values);
        return $data;
    }

    // Get the donors based on the blood type
    public function getFilteredDonorDetails_BloodCategory($bloodtype)
    {
        $columns = array(":BloodType");
        $values = array($bloodtype);
        $data = $this->db->select("*", "donor", "WHERE BloodType = :BloodType",$columns, $values);
        return $data;
    }

    //Get the donor details based on  the district
    public function getFilteredDonorDetails_District($district)
    {
        $columns = array(":District");
        $values = array($district);
        $data = $this->db->select("*", "donor", "WHERE District = :District",$columns, $values);
        return $data;
    }

    public function getFilteredDonorDetails_District_BloodCategory($district,$bloodtype)
    {
        $columns = array(":District",":BloodType");
        $values = array($district,$bloodtype);
        $data = $this->db->select("*", "donor", "WHERE District = :District AND BloodType = :BloodType",$columns, $values);
        return $data;
    }

    public function getCampDet($org,$blood_bank_id,$start,$end)
    {   
        // print_r($org);die();
        $params = array(':org',':blood_bank_id',':start',':end');
        $inputs = array($org,$blood_bank_id,$start,$end);
        $camp = $this->db->select("*","donation_campaign","
        INNER JOIN organization_society on donation_campaign.OrganizationUserID = organization_society.UserID 
        WHERE donation_campaign.BloodBankID =:blood_bank_id
        AND donation_campaign.Date >= :start  
        AND donation_campaign.Date <= :end 
        AND organization_society.name LIKE :org 
        "
        ,$params,$inputs);
        return $camp;
    }

}