<?php

class CampaignModel extends Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getAllCampaigns($today)
    {
        $data = $this->db->select(
            '*',
            'donation_campaign',
            'WHERE Date > :Date AND Status = 1 ORDER BY Date ASC',
            ':Date',
            $today
        );
        return $data;
    }

    public function getCampAds($camps)
    {
        $camp_ads = [];
        foreach ($camps as $camp) {
            $data = $this->db->select(
                'Advertisement_Pic',
                'advertisement',
                'WHERE AdvertisementID = :AdvertisementID',
                ':AdvertisementID',
                $camp['AdvertisementID']
            );
            array_push($camp_ads, $data);
        }
        return $camp_ads;

    }

}