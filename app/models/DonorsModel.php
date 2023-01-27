<?php

class DonorsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllDonorDetails()
    {
        // Get all the donor details
        $data = $this->db->select("*", "donor","Null");
        return $data;
    }


    
}