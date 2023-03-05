<?php

class DonationhistoryModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getNoOfCampDonations($userid)
    {
        $data = $this->db->select(
            'COUNT(*)',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $userid
        );
        return $data[0][0];
    }

    public function getCampDonations($userid)
    {
        $data = $this->db->select(
            'CampaignID,Date,Feedback,Rating,Complication,PacketID',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $userid
        );
        return $data;
    }

    public function getCampNames($camps)
    {
        $camp_names = [];
        foreach ($camps as $camp) {
            $camp_name = $this->db->select(
                'Name',
                'donation_campaign',
                'WHERE CampaignID = :CampaignID',
                ':CampaignID',
                $camp[0]
            );
            array_push($camp_names, $camp_name[0][0]);
        }
        return $camp_names;
    }

    public function getCampDonationAmounts($camps)
    {
        $packetids = [];
        foreach ($camps as $camp) {
            $packetid = $this->db->select(
                'PacketID',
                'donor_campaign_bloodpacket',
                'WHERE CampaignID = :CampaignID AND DonorID = :DonorID',
                [':CampaignID', ':DonorID'],
                [$camp[0], $_SESSION['user_ID']]
            );
            array_push($packetids, $packetid[0][0]);
        }
        $camp_amounts = [];
        foreach ($packetids as $packetid) {
            $amount = $this->db->select(
                'Quantity',
                'bloodpacket',
                'WHERE PacketID = :PacketID',
                ':PacketID',
                $packetid
            );
            array_push($camp_amounts, $amount[0][0]);
        }
        return $camp_amounts;
    }

    public function getTotalDonationsCampaign($camps)
    {
        $totals = [];
        $total = 0;
        foreach ($camps as $camp) {
            $total = 0;
            $packetid = $this->db->select(
                'PacketID',
                'donor_campaign_bloodpacket',
                'WHERE CampaignID = :CampaignID',
                ':CampaignID',
                $camp[0]
            );
            foreach ($packetid as $packet) {
                $amount = $this->db->select(
                    'Quantity',
                    'bloodpacket',
                    'WHERE PacketID = :PacketID',
                    ':PacketID',
                    $packet[0]
                );
                $total += $amount[0][0];
            }
            array_push($totals, $total);
        }
        return $totals;
    }

    public function getOrgNames($camps)
    {
        $org_ids = [];
        foreach ($camps as $camp) {
            $org_id = $this->db->select(
                'OrganizationUserID',
                'donation_campaign',
                'WHERE CampaignID = :CampaignID',
                ':CampaignID',
                $camp[0]
            );
            array_push($org_ids, $org_id[0][0]);
        }
        $org_names = [];
        foreach ($org_ids as $org_id) {
            $org_name = $this->db->select(
                'Name',
                'organization_society',
                'WHERE UserID = :UserID',
                ':UserID',
                $org_id
            );
            array_push($org_names, $org_name[0][0]);
        }
        return $org_names;
    }

    public function getCampLocations($camps)
    {
        $locations = [];
        foreach ($camps as $camp) {
            $location = $this->db->select(
                'Location',
                'donation_campaign',
                'WHERE CampaignID = :CampaignID',
                ':CampaignID',
                $camp[0]
            );
            array_push($locations, $location[0][0]);
        }
        return $locations;
    }

    public function getAdvertisements($camps)
    {
        $adIDs = [];
        foreach ($camps as $camp) {
            $ad = $this->db->select(
                'AdvertisementID',
                'donation_campaign',
                'WHERE CampaignID = :CampaignID',
                ':CampaignID',
                $camp[0]
            );
            array_push($adIDs, $ad[0][0]);
        }
        $advertisements = [];
        foreach ($adIDs as $adID) {
            $ad = $this->db->select(
                'Advertisement_Pic',
                'advertisement',
                'WHERE AdvertisementID = :AdvertisementID',
                ':AdvertisementID',
                $adID
            );
            array_push($advertisements, $ad[0][0]);
        }
        return $advertisements;
    }

    public function getComplications($camps)
    {
        $complications = [];
        foreach ($camps as $camp) {
            $complication = $this->db->select(
                'Complication',
                'donor_campaign_bloodpacket',
                'WHERE CampaignID = :CampaignID AND DonorID = :DonorID AND Complication IS NOT NULL',
                [':CampaignID', ':DonorID'],
                [$camp[0], $_SESSION['user_ID']]
            );
            array_push($complications, $complication[0][0]);
        }
        return $complications;
    }

    public function getComplicationCamps($camps)
    {
        $campids = [];
        foreach ($camps as $camp) {
            $campid = $this->db->select(
                'CampaignID',
                'donor_campaign_bloodpacket',
                'WHERE CampaignID = :CampaignID AND DonorID = :DonorID AND Complication IS NOT NULL',
                [':CampaignID', ':DonorID'],
                [$camp[0], $_SESSION['user_ID']]
            );
            array_push($campids, $campid[0][0]);
        }
        // print_r($campids);
        // die();
        $camp_names = [];
        foreach ($campids as $campid) {
            $camp_name = $this->db->select(
                'Name',
                'donation_campaign',
                'WHERE CampaignID = :CampaignID',
                ':CampaignID',
                $campid
            );
            array_push($camp_names, $camp_name[0][0]);
        }
        return $camp_names;

    }

    public function getAllDonationsCamps($camps)
    {
        $total = 0;
        foreach ($camps as $camp) {
            $amount = $this->db->select(
                'Quantity',
                'bloodpacket',
                'WHERE PacketID = :PacketID',
                ':PacketID',
                $camp['PacketID']
            );
            $total += $amount[0][0];
        }

        return $total;
    }

    public function getNoOfBankDonations($userid)
    {
        $data = $this->db->select(
            'COUNT(*)',
            'donor_bloodbank_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $userid
        );
        return $data[0][0];
    }

    public function getBanks($userid)
    {
        //get distinct bloodbanks
        $data = $this->db->select(
            'DISTINCT BloodBankID',
            'donor_bloodbank_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $userid
        );
        return $data;

    }

    public function getLatestBankDonationDates($banks)
    {
        //Get the latest donation at each bank
        $latest_donations = [];
        foreach ($banks as $bank) {
            $latest_donation = $this->db->select(
                'Date',
                'donor_bloodbank_bloodpacket',
                'WHERE BloodBankID = :BloodBankID ORDER BY Date DESC LIMIT 1',
                ':BloodBankID',
                $bank[0]
            );
            array_push($latest_donations, $latest_donation[0][0]);
        }
        return $latest_donations;
    }

    public function getLatestBankDonationAmounts($banks)
    {
        $latest_donations = [];
        foreach ($banks as $bank) {
            $latest_donation = $this->db->select(
                'PacketID',
                'donor_bloodbank_bloodpacket',
                'WHERE BloodBankID = :BloodBankID ORDER BY Date DESC LIMIT 1',
                ':BloodBankID',
                $bank[0]
            );
            array_push($latest_donations, $latest_donation[0][0]);
        }
        $bank_amounts = [];
        foreach ($latest_donations as $latest_donation) {
            $bank_amount = $this->db->select(
                'Quantity',
                'bloodpacket',
                'WHERE PacketID = :PacketID',
                ':PacketID',
                $latest_donation
            );
            array_push($bank_amounts, $bank_amount[0][0]);
        }
        return $bank_amounts;
    }

    public function getBankNames($banks)
    {
        $bank_names = [];
        foreach ($banks as $bank) {
            $bank_name = $this->db->select(
                'BloodBank_Name',
                'bloodbank',
                'WHERE BloodBankID = :BloodBankID',
                ':BloodBankID',
                $bank[0]
            );
            array_push($bank_names, $bank_name[0][0]);
        }
        return $bank_names;
    }

    public function getBankPics($banks)
    {
        $bank_pics = [];
        foreach ($banks as $bank) {
            $bank_pic = $this->db->select(
                'BloodBank_Pic',
                'bloodbank',
                'WHERE BloodBankID = :BloodBankID',
                ':BloodBankID',
                $bank[0]
            );
            array_push($bank_pics, $bank_pic[0][0]);
        }
        return $bank_pics;
    }

    public function getPastBankDonationDates($banks)
    {
        $bank_dates = [];
        foreach ($banks as $bank) {
            $dates_of_bank = [];
            $bank_date = $this->db->select(
                'Date',
                'donor_bloodbank_bloodpacket',
                'WHERE BloodBankID = :BloodBankID AND DonorID = :DonorID ORDER BY Date DESC',
                [':BloodBankID', ':DonorID'],
                [$bank[0], $_SESSION['user_ID']]
            );
            foreach ($bank_date as $date) {
                array_push($dates_of_bank, $date[0]);
            }
            array_push($bank_dates, $dates_of_bank);
        }

        // print_r($bank_dates);
        // die();
        return $bank_dates;
    }

    public function getPastBankDonationAmounts($banks)
    {
        $bank_amounts = [];
        foreach ($banks as $bank) {
            $packet_amounts_of_bank = [];
            $packetids = $this->db->select(
                'PacketID',
                'donor_bloodbank_bloodpacket',
                'WHERE BloodBankID = :BloodBankID AND DonorID = :DonorID ORDER BY Date DESC',
                [':BloodBankID', ':DonorID'],
                [$bank[0], $_SESSION['user_ID']]
            );
            foreach ($packetids as $packetid) {
                $amount = $this->db->select(
                    'Quantity',
                    'bloodpacket',
                    'WHERE PacketID = :PacketID',
                    ':PacketID',
                    $packetid[0]
                );
                array_push($packet_amounts_of_bank, $amount[0][0]);

                // array_push($dates_of_bank, $date[0]);
            }
            array_push($bank_amounts, $packet_amounts_of_bank);
        }
        // print_r($bank_amounts);
        // die();

        return $bank_amounts;
    }

    // public function getBankDonations($userid)
    // {
    //     $data = $this->db->select(
    //         'BloodBankID,Date',
    //         'donor_bloodbank_bloodpacket ',
    //         'WHERE DonorID = :DonorID',
    //         ':DonorID',
    //         $userid
    //     );
    //     return $data;
    // }

    // public function getBankDonationAmounts($banks)
    // {
    //     $packetids = [];
    //     foreach ($banks as $bank) {
    //         $packetid = $this->db->select(
    //             'PacketID',
    //             'donor_bloodbank_bloodpacket',
    //             'WHERE BloodBankID = :BloodBankID AND DonorID = :DonorID',
    //             [':BloodBankID', ':DonorID'],
    //             [$bank[0], $_SESSION['user_ID']]
    //         );
    //         array_push($packetids, $packetid[0][0]);
    //     }
    //     $bank_amounts = [];
    //     foreach ($packetids as $packetid) {
    //         $amount = $this->db->select(
    //             'Quantity',
    //             'bloodpacket',
    //             'WHERE PacketID = :PacketID',
    //             ':PacketID',
    //             $packetid
    //         );
    //         array_push($bank_amounts, $amount[0][0]);
    //     }
    //     return $bank_amounts;
    // }

    public function getTotalBankDonationAmount($userid)
    {
        $packetids = $this->db->select(
            'PacketID',
            'donor_bloodbank_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $userid
        );
        $total = 0;
        foreach ($packetids as $packetid) {
            $amount = $this->db->select(
                'Quantity',
                'bloodpacket',
                'WHERE PacketID = :PacketID',
                ':PacketID',
                $packetid[0]
            );
            $total += $amount[0][0];
        }
        return $total;
    }

    public function getBankDonationTotalAmounts($banks, $userid)
    {
        $totals = [];
        $total = 0;
        foreach ($banks as $bank) {
            $total = 0;
            $packetid = $this->db->select(
                'PacketID',
                'donor_bloodbank_bloodpacket',
                'WHERE BloodBankID = :BloodBankID AND DonorID = :DonorID',
                [':BloodBankID', ':DonorID'],
                [$bank[0], $userid]
            );
            foreach ($packetid as $packet) {
                $amount = $this->db->select(
                    'Quantity',
                    'bloodpacket',
                    'WHERE PacketID = :PacketID',
                    ':PacketID',
                    $packet[0]
                );
                $total += $amount[0][0];
            }
            // $amount = $this->db->select(
            //     'Quantity',
            //     'bloodpacket',
            //     'WHERE PacketID = :PacketID',
            //     ':PacketID',
            //     $packetid[0][0]
            // );
            // $total += $amount[0][0];
            array_push($totals, $total);
        }
        return $totals;
    }

    public function getTotalDonationsBank($banks)
    {
        $totals = [];
        $total = 0;
        foreach ($banks as $bank) {
            $total = 0;
            $packetid = $this->db->select(
                'PacketID',
                'donor_bloodbank_bloodpacket',
                'WHERE BloodBankID = :BloodBankID AND Date = :Date',
                [':BloodBankID', ':Date'],
                [$bank[0], $bank[1]]
            );
            $amount = $this->db->select(
                'Quantity',
                'bloodpacket',
                'WHERE PacketID = :PacketID',
                ':PacketID',
                $packetid[0][0]
            );
            $total += $amount[0][0];
            array_push($totals, $total);
        }
        return $totals;
    }

}
