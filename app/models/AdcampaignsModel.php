<?php

class AdcampaignsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllCampaignDetails()
    {
        $data = $this->db->select("*", "donation_campaign","Null");
        return $data;

    }

    
}