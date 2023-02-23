<?php

class AdadvertisementsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllAdvertisementsDetails()
    {
        $data = $this->db->select("*", "advertisement","Null");
        return $data;
    }

    // Function to get the blood bank id and blood bank name from table blood bank
    public function getBloodBankName()
    {
        $data = $this->db->select("BloodBankID,BloodBank_Name", "bloodbank",null);
        return $data;
    }

    // Function to add the inventory donation advertisement to the database
    public function addInvDonation($Ad_inputs,$Donation_input)
    {
        $columns1 = array("PublishedDate","Description","BloodBankID","Advertisement_pic");
        $params1 = array(":PublishedDate",":Description",":BloodBankID",":Advertisement_pic");
        $result1 = $this->db->insert("advertisement",$columns1,$params1,$Ad_inputs);

        // Get the last inserted id from the advertisement table
        $Adid = $this->db->select("MAX(AdvertisementID)","advertisement",null);
        

        // Append the last inserted id to the donation input array
        $Donation_input[3] = $Adid[0]['MAX(AdvertisementID)'];
        $columns2 = array("Initialized_date","DonationType","InventoryCategory","AdvertisementID");
        $params2 = array(":Initialized_date",":DonationType",":InventoryCategory",":AdvertisementID");
        $result2 = $this->db->insert("donation",$columns2,$params2,$Donation_input);

        if($result1 && $result2){
            return true;
        }
        else{
            return false;
        }


    }

    // Function to add the cash donation advertisement to the database
    public function addCashDonation($Ad_inputs,$Donation_input)
    {
        $columns1 = array("PublishedDate","Description","BloodBankID","Advertisement_pic");
        $params1 = array(":PublishedDate",":Description",":BloodBankID",":Advertisement_pic");
        $result1 = $this->db->insert("advertisement",$columns1,$params1,$Ad_inputs);

        // Get the last inserted id from the advertisement table
        $Adid = $this->db->select("MAX(AdvertisementID)","advertisement",null);
        

        // Append the last inserted id to the donation input array
        $Donation_input[3] = $Adid[0]['MAX(AdvertisementID)'];
        $columns2 = array("Initialized_date","DonationType","Total_amount","AdvertisementID");
        $params2 = array(":Initialized_date",":DonationType",":Total_amount",":AdvertisementID");
        $result2 = $this->db->insert("donation",$columns2,$params2,$Donation_input);

        if($result1 && $result2){
            return true;
        }
        else{
            return false;
        }
    }

    
}