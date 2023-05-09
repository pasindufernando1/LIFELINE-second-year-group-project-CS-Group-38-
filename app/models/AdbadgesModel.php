<?php

class AdbadgesModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    // Function to get all the badge details
    public function getAllBadgeDetails()
    {
        $data = $this->db->select("*", "badge","Null");
        return $data;

    }

    // Function to get the next badge number
    public function getNextBadgeNo()
    {
        $data = $this->db->select("MAX(BadgeID) as BadgeNo", "badge","Null");
        return $data[0]['BadgeNo']+1;

    }

    // Function to add a new badge
    public function addBadge($inputs){
        $columns = array("Name","Donation_Constraint","BadgePic");
        $param = array(":Name",":Donation_Constraint",":BadgePic");
        $result = $this->db->insert("badge", $columns, $param, $inputs);
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    
}