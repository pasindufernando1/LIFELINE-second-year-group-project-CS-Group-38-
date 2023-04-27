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
        $donations=$camp_donations + $bank_donations;

        $newest_badge = $this->db->select(
            'BadgePic',
            'badge',
            'WHERE Donation_Constraint <= :Donations ORDER BY Donation_Constraint DESC',
            ':Donations',
            $donations
        )[0][0];
        return $newest_badge;
    }

    public function getbadges($badge)
    {
        $constraint = $this->db->select(
            'Donation_Constraint',
            'badge',
            'WHERE BadgePic = :BadgePic',
            ':BadgePic',
            $badge
        )[0][0];
        
        $badges = $this->db->select(
            'BadgePic',
            'badge',
            'WHERE Donation_Constraint <= :Donation_Constraint',
            ':Donation_Constraint',
            $constraint
        );
        return $badges;
    }

    public function getyetbadges($badge)
    {
        $constraint = $this->db->select(
            'Donation_Constraint',
            'badge',
            'WHERE BadgePic = :BadgePic',
            ':BadgePic',
            $badge
        )[0][0];

        $badges = $this->db->select(
            'BadgePic',
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
            'BadgePic,Donation_Constraint',
            'badge',
            'ORDER BY Donation_Constraint ASC'
        );
        return $badge_info;
    }

}