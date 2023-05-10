<?php

use LDAP\Result;

class CardModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getUserName($userid)
    {
        $name = $this->db->select(
            'Fullname,NIC,BloodType,Number,LaneName,City',
            'donor',
            'WHERE UserID = :UserID',
            ':UserID',
            $userid
        )[0];
        return $name;
    }

    public function getAge($userid)
    {
        //calculate age from dob and today's date
        $dob = $this->db->select(
            'DOB',
            'donor',
            'WHERE UserID = :UserID',
            ':UserID',
            $userid
        )[0][0];
        $dob = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($dob)->y;
        return $age;

    }

    public function getNoOfCampDonations($donorID)
    {
        $data = $this->db->select(
            'count',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $donorID
        );
        return $data;
    }

    public function getNoOfBankDonations($donorID)
    {
        $data = $this->db->select(
            'count',
            'donor_bloodbank_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $donorID
        );
        return $data;
    }

    public function getLastDonationDate($donorID)
    {
        $count1 = $this->db->select(
            'count',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $donorID
        );
        $count2 = $this->db->select(
            'count',
            'donor_bloodbank_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $donorID
        );

        if ($count1 == 0 && $count2 == 0) {
            return false;
        } else {
            $date1 = $this->db->select(
                'Date',
                'donor_campaign_bloodpacket',
                'WHERE DonorID = :DonorID ORDER BY Date DESC',
                ':DonorID',
                $donorID
            );

            $date2 = $this->db->select(
                'Date',
                'donor_bloodbank_bloodpacket',
                'WHERE DonorID = :DonorID ORDER BY Date DESC',
                ':DonorID',
                $donorID
            );

            if ($date1[0][0] > $date2[0][0]) {
                $data = $date1[0][0];
            } else {
                $data = $date2[0][0];
            }
            return $data;
        }
    }

    public function getDonationDates($donorID)
    {
        $dates1 = $this->db->select(
            'Date',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $donorID
        );

        $dates2 = $this->db->select(
            'Date',
            'donor_bloodbank_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $donorID
        );

        $data = array_merge($dates1, $dates2);
        return $data;

    }

    public function getCampDonationDates($donorID)
    {
        $dates1 = $this->db->select(
            'Date',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $donorID
        );

        return $dates1;
    }

    public function getCampDonationDetails($donorID)
    {
        $campids = $this->db->select(
            'CampaignID',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $donorID
        );

        $data = array();
        foreach ($campids as $campid) {
            $campid = $campid[0];
            $campdetails = $this->db->select(
                'Name,Location',
                'donation_campaign',
                'WHERE CampaignID = :CampaignID',
                ':CampaignID',
                $campid
            )[0];
            array_push($data, $campdetails);
        }

        return $data;
    }

    public function getBankDonationDates($donorID)
    {
        $dates2 = $this->db->select(
            'Date',
            'donor_bloodbank_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $donorID
        );

        return $dates2;
    }

    public function getBankDonationDetails($donorID)
    {
        $bankids = $this->db->select(
            'BloodBankID',
            'donor_bloodbank_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $donorID
        );

        $data = array();
        foreach ($bankids as $bankid) {
            $bankid = $bankid[0];
            $bankdetails = $this->db->select(
                'BloodBank_Name',
                'bloodbank',
                'WHERE BloodBankID = :BloodBankID',
                ':BloodBankID',
                $bankid
            )[0];
            array_push($data, $bankdetails);
        }

        return $data;
    }

        public function getnewestbadge($userid)
    {
        $camp_donations = $this->db->select(
            'COUNT(*)',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $userid
        )[0][0];

        $bank_donations = $this->db->select(
            'COUNT(*)',
            'donor_bloodbank_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $userid
        )[0][0];
        $donations = $camp_donations + $bank_donations;

        if ($donations == 0) {
            return null;

        } else {
            $newest_badge = $this->db->select(
                '*',
                'badge',
                'WHERE Donation_Constraint = :Donations',
                ':Donations',
                $donations
            )[0];

            return $newest_badge;
        }
    }


}