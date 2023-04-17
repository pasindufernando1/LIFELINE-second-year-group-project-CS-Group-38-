<?php

class AdbadgesModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllBadgeDetails()
    {
        $data = $this->db->select("*", "badge","Null");
        // print_r($data);die();
        return $data;

    }

    public function getNextBadgeNo()
    {
        $data = $this->db->select("MAX(BadgeID) as BadgeNo", "badge","Null");
        // print_r($data);die();
        return $data[0]['BadgeNo']+1;

    }

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