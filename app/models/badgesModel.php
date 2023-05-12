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
            $newest_badge_count = $this->db->select(
                'COUNT(*)',
                'donor_badges',
                'WHERE DonorUserID = :DonorID',
                ':DonorID',
                $userid
            );
            if($newest_badge_count[0][0] == 0)
            {
                return null;
            }
            else{
                $newest_badge_id = $this->db->select(
                    'BadgeID',
                    'donor_badges',
                    'WHERE DonorUserID = :DonorID',
                    ':DonorID',
                    $userid
                )[0];
                $newest_badge = $this->db->select(
                    '*',
                    'badge',
                    'WHERE BadgeID = :BadgeID',
                    ':BadgeID',
                    $newest_badge_id['BadgeID']
                )[0];
                // print_r($newest_badge);die();
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
        //print_r($badges);die(); 
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