<?php

class ReportsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllReportDetails()
    {
        $data = $this->db->select("*", "report","Null");
        return $data;
    }

    public function getAllBloodAvailReports()
    {
        // Randomly generate 10 quantities for 10 blood banks
        $data = $this->db->select("*", "bloodbank","Null");
        foreach ($data as $key => $value) {
            $data[$key]['Quantity'] = rand(0, 100);
        }
        return $data;
    }

    public function getAllInvAvailReports()
    {
        // Randomly generate 10 quantities for 10 blood banks
        $data = $this->db->select("*", "bloodbank","Null");
        foreach ($data as $key => $value) {
            $data[$key]['Quantity'] = rand(0, 100);
        }
        return $data;
    }

    public function getAllCampaignDetails()
    {
        // Generate a random array containing 10 campaign dates, locations, available beds, and organizers
        $data = array();
        for ($i=0; $i < 10; $i++) { 
            $data[$i]['Date'] = date('Y-m-d', strtotime('+' . rand(0, 100) . ' days'));
            $data[$i]['Location'] = 'Location ' . rand(0, 100);
            $data[$i]['AvailableBeds'] = rand(0, 100);
            $data[$i]['Organizer'] = 'Organizer ' . rand(0, 100);
        }
        return $data;
    }

    
}