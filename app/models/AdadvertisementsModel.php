<?php

class AdadvertisementsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllAdvertisementsDetails()
    {
        $data = $this->db->select("*", "advertisement","Null");
        return $data;
    }

    
}