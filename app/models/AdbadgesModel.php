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

    
}