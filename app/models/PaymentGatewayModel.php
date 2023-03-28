<?php

class PaymentGatewayModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function AllFeedback($donorid)
    {
        $data = $this->db->select(
            'CampaignID,Feedback,Rating',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID AND (Feedback IS NOT NULL OR Rating IS NOT NULL)',
            ':DonorID',
            $donorid
        );
        return $data;
    }

    public function getAllCampNames($feedback)
    {
        $camp_names = [];
        foreach ($feedback as $camp) {
            $camp_names[] = $this->getcampname($camp['CampaignID']);
        }
        return $camp_names;
    }

    public function getcampname($campid)
    {
        $data = $this->db->select(
            'Name',
            'donation_campaign',
            'WHERE CampaignID = :CampaignID',
            ':CampaignID',
            $campid
        )[0]['Name'];
        return $data;
    }

    public function getAllCampAds($feedback)
    {
        $camp_ads = [];
        foreach ($feedback as $camp) {
            $camp_ads[] = $this->getcampad($camp['CampaignID']);
        }
        return $camp_ads;
    }

    public function getcampad($campid)
    {
        $adID = $this->db->select(
            'AdvertisementID',
            'donation_campaign',
            'WHERE CampaignID = :CampaignID',
            ':CampaignID',
            $campid
        )[0]['AdvertisementID'];
        $ad = $this->db->select(
            'Advertisement_Pic',
            'advertisement',
            'WHERE AdvertisementID = :AdvertisementID',
            ':AdvertisementID',
            $adID
        )[0]['Advertisement_Pic'];
        return $ad;
    }

    public function save_rating($inputs, $campid, $donorid)
    {
        // print_r($inputs[0]);
        // die();

        $params = [':Feedback', ':Rating'];
        $columns = ['Feedback', 'Rating'];
        if($this->db->update(
            'donor_campaign_bloodpacket',
            $columns,
            $params,
            $inputs,
            [':DonorID', ':CampaignID'],
            [$donorid, $campid],
            'WHERE DonorID = :DonorID && CampaignID = :CampaignID'
        )){
            return true;
        }
        else{
            return false;
        }

    }

    public function getcamprating($campid, $donorid)
    {
        $params = [':DonorID', ':CampaignID'];
        $columns = [$donorid, $campid];
        $data = $this->db->select(
            'Feedback,Rating',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID && CampaignID = :CampaignID',
            $params,
            $columns
        )[0];
        return $data;
    }

    public function removerating($campid, $donorid)
    {
        $params = [':Feedback', ':Rating'];
        $columns = ['Feedback', 'Rating'];
        $inputs = [null, null];
        $this->db->update(
            'donor_campaign_bloodpacket',
            $columns,
            $params,
            $inputs,
            [':DonorID', ':CampaignID'],
            [$donorid, $campid],
            'WHERE DonorID = :DonorID && CampaignID = :CampaignID'
            
        );

    }

}