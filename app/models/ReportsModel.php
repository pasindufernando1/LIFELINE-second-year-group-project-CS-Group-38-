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

    public function getAllDonorDetails()
    {
        // Generate a random array containing 10 dates,locations,packetId and compilations
        $data = array();
        for ($i=0; $i < 10; $i++) { 
            $data[$i]['Date'] = date('Y-m-d', strtotime('+' . rand(0, 100) . ' days'));
            $data[$i]['Location'] = 'Location ' . rand(0, 100);
            $data[$i]['PacketID'] = rand(0, 100);
            $data[$i]['Compilations'] = 'Compilation ' . rand(0, 100);
        }
        return $data;
        
    }

    public function getAllusageVSexpiry($Province){
        // Create districts array for the province with index equql to the district name
        $districts = array();
        if($Province == "Western"){
            $districts = array(
                "Colombo" => "Colombo",
                "Gampaha" => "Gampaha",
                "Kalutara" => "Kalutara"
            );
        }
        else if($Province == "Central"){
            $districts = array(
                "Kandy" => "Kandy",
                "Matale" => "Matale",
                "Nuwara Eliya" => "Nuwara Eliya"
            );
        }
        else if($Province == "Southern"){
            $districts = array(
                "Galle" => "Galle",
                "Matara" => "Matara",
                "Hambantota" => "Hambantota"
            );
        }
        else if($Province == "North Western"){
            $districts = array(
                "Kurunegala" => "Kurunegala",
                "Puttalam" => "Puttalam"
            );
        }
        else if($Province == "North Central"){
            $districts = array(
                "Anuradhapura" => "Anuradhapura",
                "Polonnaruwa" => "Polonnaruwa"
            );
        }
        else if($Province == "Uva"){
            $districts = array(
                "Badulla" => "Badulla",
                "Monaragala" => "Monaragala"
            );
        }
        else if($Province == "Sabaragamuwa"){
            $districts = array(
                "Ratnapura" => "Ratnapura",
                "Kegalle" => "Kegalle"
            );
        }
        else if($Province == "Eastern"){
            $districts = array(
                "Trincomalee" => "Trincomalee",
                "Batticaloa" => "Batticaloa",
                "Ampara" => "Ampara"
            );
        }
        else if($Province == "Northern"){
            $districts = array(
                "Jaffna" => "Jaffna",
                "Kilinochchi" => "Kilinochchi",
                "Mannar" => "Mannar",
                "Mullaitivu" => "Mullaitivu",
                "Vavuniya" => "Vavuniya"
            );
        }
        else if($Province == "North Eastern"){
            $districts = array(
                "Mullaitivu" => "Mullaitivu",
                "Vavuniya" => "Vavuniya",
                "Mannar" => "Mannar",
                "Kilinochchi" => "Kilinochchi",
                "Jaffna" => "Jaffna"
            );
        }
        return $districts;

        
    }
    
}