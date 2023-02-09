<?php

use LDAP\Result;

class DonationhistoryModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getCampDonations($userid)
    {
        $data = $this->db->select(
            'CampaignID,Date,Feedback',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $userid
        );
        return $data;
    }

    public function getBankDonations($userid)
    {
        $data = $this->db->select(
            'BloodBankID,Date',
            'donor_bloodbank_bloodpacket ',
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

    public function getBankDonationAmounts($banks)
    {
        $packetids = [];
        foreach ($banks as $bank) {
            $packetid = $this->db->select(
                'PacketID',
                'donor_bloodbank_bloodpacket',
                'WHERE BloodBankID = :BloodBankID AND DonorID = :DonorID',
                [':BloodBankID', ':DonorID'],
                [$bank[0], $_SESSION['user_ID']]
            );
            array_push($packetids, $packetid[0][0]);
        }
        $bank_amounts = [];
        foreach ($packetids as $packetid) {
            $amount = $this->db->select(
                'Quantity',
                'bloodpacket',
                'WHERE PacketID = :PacketID',
                ':PacketID',
                $packetid
            );
            array_push($bank_amounts, $amount[0][0]);
        }
        return $bank_amounts;
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
}
