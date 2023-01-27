<?php

class AdadvertisementsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllAdvertisementsDetails()
    {
        $data = $this->db->select("*", "donation_campaign","Null");
        return $data;
    }

    
}