<?php

use LDAP\Result;

class BadgesModel extends Model
{
    function __construct()
    {
        parent::__construct();
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

    public function getbadges($constraint)
    {
        $badges = $this->db->select(
            'BadgePic,Name',
            'badge',
            'WHERE Donation_Constraint <= :Donation_Constraint',
            ':Donation_Constraint',
            $constraint
        );
        return $badges;
    }

    public function getyetbadges($constraint)
    {

        $badges = $this->db->select(
            'BadgePic,Name',
            'badge',
            'WHERE Donation_Constraint > :Donation_Constraint',
            ':Donation_Constraint',
            $constraint
        );
        return $badges;
    }

    public function getbadgeinfo()
    {
        $badge_info = $this->db->select(
            'BadgePic,Donation_Constraint,Name',
            'badge',
            'ORDER BY Donation_Constraint ASC'
        );
        return $badge_info;
    }

    public function getallbadges()
    {
        $badges = $this->db->select(
            'BadgePic,Name',
            'badge',
            'ORDER BY Donation_Constraint ASC'
        );
        return $badges;
    }
}