<?php

class AdadvertisementsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllCashAdvertisementsDetails()
    {
        $data = $this->db->select("*","advertisement","INNER JOIN donation on donation.AdvertisementID = advertisement.AdvertisementID INNER JOIN BloodBank on BloodBank.BloodBankID=Advertisement.BloodBankID WHERE donation.DonationType = :DonationType AND Advertisement.archive=0",':DonationType',"Cash");
        //For each DonationID get teh sum of the amount donated from the cashdonation table and append only the sum to the array
        // If the sum is null then append 0 to the array
        foreach($data as $key => $value){
            $sum = $this->db->select("SUM(Amount)","cash_donation","WHERE DonationID = :DonationID",":DonationID",$value['DonationID']);
            if($sum[0]['SUM(Amount)'] == null){
                $data[$key]['CurrentSum'] = 0;
            }
            else{
                $data[$key]['CurrentSum'] = $sum[0]['SUM(Amount)'];
            }
        }
        return $data;
    }

    public function getAllInventoryAdvertisementsDetails(){
        $data = $this->db->select("*","advertisement","INNER JOIN donation on donation.AdvertisementID = advertisement.AdvertisementID INNER JOIN BloodBank on BloodBank.BloodBankID=Advertisement.BloodBankID WHERE donation.DonationType = :DonationType AND Advertisement.archive=0",':DonationType',"Inventory");
        //For each DonationID get teh sum of the quantity donated from the inventorydonation table and append only the sum to the array
        // If the sum is null then append 0 to the array
        foreach($data as $key => $value){
            $sum = $this->db->select("SUM(Quantity)","inventory_donation","WHERE DonationID = :DonationID",":DonationID",$value['DonationID']);
            if($sum[0]['SUM(Quantity)'] == null){
                $data[$key]['CurrentSum'] = 0;
            }
            else{
                $data[$key]['CurrentSum'] = $sum[0]['SUM(Quantity)'];
            }
        }
        return $data;
    }

    public function archive_ad($id){

        $result = $this->db->update("advertisement","Archive",":Archive",1,":AdvertisementID",$id,"WHERE AdvertisementID = :AdvertisementID");
        if($result){
            return true;
        }
        else{
            return false;
        }
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