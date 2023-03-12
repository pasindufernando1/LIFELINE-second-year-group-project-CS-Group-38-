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

    
}