<?php

class AdcampaignsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllCampaignDetails()
    {
        $data = $this->db->select("*", "donation_campaign","INNER JOIN bloodbank ON donation_campaign.BloodBankID = bloodbank.BloodBankID WHERE donation_campaign.Archive = 0");
        return $data;

    }

    public function archive($id)
    {
        $result = $this->db->update("donation_campaign","Archive",":Archive",1,":CampaignID",$id,"WHERE CampaignID = :CampaignID");
        if($result){
            return true;
        }
        else{
            return false;
        }
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

    // Get the campaigns for a date and a blood bank
    public function getFilteredCampaignsDate_and_Bank($bloodbank,$date)
    {
        $columns = array(":BloodBank_Name",":Date");
        $values = array($bloodbank,$date);
        $data = $this->db->select("*", "donation_campaign","INNER JOIN bloodbank ON donation_campaign.BloodBankID = bloodbank.BloodBankID WHERE BloodBank_Name = :BloodBank_Name AND Date = :Date AND donation_campaign.Archive = 0",$columns,$values);
        return $data;
    }

    // Get the campaigns for a date
    public function getFilteredCampaignsDate($date)
    {
        $data = $this->db->select("*", "donation_campaign","INNER JOIN bloodbank ON donation_campaign.BloodBankID = bloodbank.BloodBankID WHERE Date = :Date AND donation_campaign.Archive = 0","Date",$date);
        return $data;
    }

    // Get the campaigns for a blood bank
    public function getFilteredCampaignsBank($bloodbank)
    {
        $data = $this->db->select("*", "donation_campaign","INNER JOIN bloodbank ON donation_campaign.BloodBankID = bloodbank.BloodBankID WHERE BloodBank_Name = :BloodBank_Name AND donation_campaign.Archive = 0","BloodBank_Name",$bloodbank);
        return $data;
    }
    
    

    
}