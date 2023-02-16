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

    public function getReportId(){
        $data = $this->db->select("max(ReportID) + 1", "report","Null");
        return $data[0]['max(ReportID) + 1'];
    }

    public function getAllBloodAvailReports($province,$blood_group)
    {
        $data = $this->db->select("BloodBankID,BloodBank_Name", "bloodbank","WHERE Province = :province",':province',$province);
        // Get the TypeID of the blood group given in the parameter
        $blood_group_typeID = $this->db->select("TypeID", "bloodcategory","WHERE Name = :blood_group",':blood_group',$blood_group)[0]['TypeID'];
        // For each blood bank get the quantity of the blood group given in the parameter
        foreach ($data as $key => $value) {
            $bloodBankID = $data[$key]['BloodBankID'];
            $param = array(':bloodBankID',':blood_group');
            $paramValue = array($bloodBankID,$blood_group_typeID);
            // If $data[$key]['Quantity'] is null, set it to 0
            if($this->db->select("Quantity", "bank_blood_categories","WHERE BloodBankID = :bloodBankID AND TypeID = :blood_group",$param,$paramValue) == null){
                $data[$key]['Quantity'] = 0;
            }
            else{
                $data[$key]['Quantity'] = $this->db->select("Quantity", "bank_blood_categories","WHERE BloodBankID = :bloodBankID AND TypeID = :blood_group",$param,$paramValue)[0]['Quantity'];
            }
        }
        return $data;
    }

    public function getAllInvAvailReports($province,$inv_category)
    {
        $data = $this->db->select("BloodBankID,BloodBank_Name", "bloodbank","WHERE Province = :province",':province',$province);
        // Get the TypeID of the blood group given in the parameter
        $inv_typeID = $this->db->select("InventoryID", "inventory","WHERE Name = :inv_name",':inv_name',$inv_category)[0]['InventoryID'];
        // For each blood bank, get the quantity of the inventory category from the inventory type_id
        foreach ($data as $key => $value) {
            $bloodBankID = $data[$key]['BloodBankID'];
            $param = array(':bloodBankID',':inv_typeID');
            $paramValue = array($bloodBankID,$inv_typeID);
            // If $data[$key]['Quantity'] is null, set it to 0
            if($this->db->select("Quantity", "bank_inventory_categories","WHERE BloodBankID = :bloodBankID AND InventoryID = :inv_typeID",$param,$paramValue) == null){
                $data[$key]['Quantity'] = 0;
            }
            else{
                $data[$key]['Quantity'] = $this->db->select("Quantity", "bank_inventory_categories","WHERE BloodBankID = :bloodBankID AND InventoryID = :inv_typeID",$param,$paramValue)[0]['Quantity'];
            }
        }
        return $data;
        
    }

    public function getAllCampaignDetails($date,$province)
    {
        $data = $this->db->select("*", "donation_campaign","WHERE Date = :date",':date',$date);
        // For each caampaign get the OrganiserID and get the Organizer from a different table
        foreach ($data as $key => $value) {
            $organiserID = $data[$key]['OrganizationUserID'];
            $data[$key]['OrganizationUserID'] = $this->db->select("Name", "organization_society","WHERE UserID = :organiserID",':organiserID',$organiserID)[0]['Name'];
        }
        // For each caampaign get the BloodBankID and get the province from a different table
        foreach ($data as $key => $value) {
            $bloodBankID = $data[$key]['BloodBankID'];
            $data[$key]['Province'] = $this->db->select("Province", "bloodbank","WHERE BloodBankID = :bloodBankID",':bloodBankID',$bloodBankID)[0]['Province'];
            // If the province is not equal to the province given in the parameter, unset the array element
            if($data[$key]['Province'] != $province){
                unset($data[$key]);
            }
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

    public function getDonorDetails($donorID){
        $data = $this->db->select("Fullname,NIC", "donor","WHERE UserID = :donorID",':donorID',$donorID);
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