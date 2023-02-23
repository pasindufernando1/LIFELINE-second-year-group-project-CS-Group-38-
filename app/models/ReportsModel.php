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
        //Split the blood group into two word and take the values into 2 variables
        $blood_group = explode(" ", $blood_group);
        
        $blood_name = $blood_group[0];
        $blood_type = $blood_group[1];

        $data = $this->db->select("BloodBankID,BloodBank_Name", "bloodbank","WHERE Province = :province",':province',$province);
        // Get the TypeID of the blood component given in the parameter
        $param = array(':blood_name',':subtype');
        $paramValue = array($blood_name,$blood_type);
        $blood_group_typeID = $this->db->select("TypeID", "bloodcategory","WHERE Name = :blood_name AND Subtype = :subtype",$param,$paramValue)[0]['TypeID'];
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

    public function getAllDonors(){
        $data = $this->db->select("UserID,Fullname", "donor","Null");
        return $data;
    }

    // Function to get all the donations of the donor
    public function getAllDonations($donorID){
        // Get all the donations from bank donations table union with the donations from the donation campaign table
        $data = $this->db->select("Date,CampaignID,PacketID,Complication", "donor_campaign_bloodpacket","WHERE DonorID = :donorID",':donorID',$donorID);
        // For each Campaign ID get the campaign name
        foreach ($data as $key => $value) {
            $campaignID = $data[$key]['CampaignID'];
            $data[$key]['Location'] = $this->db->select("Name", "donation_campaign","WHERE CampaignID = :campaignID",':campaignID',$campaignID)[0]['Name'];
        }
        // Get all the donations from the blood bank donations table
        $data2 = $this->db->select("Date,BloodBankID,PacketID,Complication", "donor_bloodbank_bloodpacket","WHERE DonorID = :donorID",':donorID',$donorID);
        // For each Blood Bank ID get the blood bank name
        foreach ($data2 as $key => $value) {
            $bloodBankID = $data2[$key]['BloodBankID'];
            $data2[$key]['Location'] = $this->db->select("BloodBank_Name", "bloodbank","WHERE BloodBankID = :bloodBankID",':bloodBankID',$bloodBankID)[0]['BloodBank_Name'];
        }
        // Merge the two arrays
        $result = array_merge($data,$data2);
        // If Complication ==Null set it to 'No complications observed'
        foreach ($result as $key => $value) {
            if($result[$key]['Complication'] == null){
                $result[$key]['Complication'] = 'No complications observed';
            }
        }
        $No_CampDonation = count($data);
        $No_BankDonation = count($data2);
        $result['No_CampDonation'] = $No_CampDonation;
        $result['No_BankDonation'] = $No_BankDonation;
        return $result;
    }

    // Function to get the donor current badge
    public function getDonorBadge($donorID){
        $data = $this->db->select("BadgeID", "donor_badges","WHERE DonorUserID = :donorID",':donorID',$donorID);
        $badgeID = $data[0]['BadgeID'];
        $data = $this->db->select("BadgePic", "badge","WHERE BadgeID = :badgeID",':badgeID',$badgeID);
        return $data[0]['BadgePic'];
    }

    // Function to get the donor card link
    public function getDonorCard($donorID){
        $data = $this->db->select("DonorCard_Img", "Donor","WHERE UserID = :donorID",':donorID',$donorID);
        return $data[0]['DonorCard_Img'];
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

    // Function to get all the donations of a year
    public function getUsageBlood($Year){

        // An array to store the used quantity for the 12 months
        $usedQuantity = array();

        // Get all the donations from the blood bank donations table
        $data = $this->db->select("PacketID,Date", "donor_bloodbank_bloodpacket","WHERE YEAR(Date) = :year",':year',$Year);
        // For each packet ID check the status of the packet, if status is o then it is used
        foreach ($data as $key => $value) {
            $packetID = $data[$key]['PacketID'];
            $status = $this->db->select("Status", "bloodpacket","WHERE PacketID = :packetID",':packetID',$packetID)[0]['Status'];
            if($status == 0){
                // Get the quantity of the packet and add it to the array
                $quantity = $this->db->select("Quantity", "bloodpacket","WHERE PacketID = :packetID",':packetID',$packetID)[0]['Quantity'];
                $data[$key]['Quantity'] = $quantity;
            }
        }
        // For each packet get the month and add the quantity to the array
        foreach ($data as $key => $value) {
            $month = date("m", strtotime($data[$key]['Date']));
            $quantity = $data[$key]['Quantity'];
            if(isset($usedQuantity[$month])){
                $usedQuantity[$month] += $quantity;
            }
            else{
                $usedQuantity[$month] = $quantity;
            }
        }

        
        // Get all the donations from the campaign donations table
        $data2 = $this->db->select("PacketID,Date", "donor_campaign_bloodpacket","WHERE YEAR(Date) = :year",':year',$Year);
        // For each packet ID check the status of the packet, if status is o then it is used
        foreach ($data2 as $key => $value) {
            $packetID = $data2[$key]['PacketID'];
            $status = $this->db->select("Status", "bloodpacket","WHERE PacketID = :packetID",':packetID',$packetID)[0]['Status'];
            if($status == 0){
                // Get the quantity of the packet and add it to the array
                $quantity = $this->db->select("Quantity", "bloodpacket","WHERE PacketID = :packetID",':packetID',$packetID)[0]['Quantity'];
                $data2[$key]['Quantity'] = $quantity;
            }
        }

        // For each packet get the month and add the quantity to the array
        foreach ($data2 as $key => $value) {
            $month = date("m", strtotime($data2[$key]['Date']));
            $quantity = $data2[$key]['Quantity'];
            if(isset($usedQuantity[$month])){
                $usedQuantity[$month] += $quantity;
            }
            else{
                $usedQuantity[$month] = $quantity;
            }
        }
        return $usedQuantity;




    }

    // Function to get all donations of a category
    public function getAllBloodDonations($category){
        // All donations at the blood bank
        $data = $this->db->select("*", "donor_bloodbank_bloodpacket",null);
        // For each donorId check the blood type and if it matches keep it in the array, otherwise remove it
        foreach ($data as $key => $value) {
            $donorID = $data[$key]['DonorID'];
            $bloodType = $this->db->select("BloodType", "donor","WHERE UserID = :donorID",':donorID',$donorID)[0]['BloodType'];
            if($bloodType != $category){
                unset($data[$key]);
            }
        }
        
        //For each donation get the relating blood bank district
        foreach ($data as $key => $value) {
            $bloodBankID = $data[$key]['BloodBankID'];
            $district = $this->db->select("District", "bloodbank","WHERE BloodBankID = :bloodBankID",':bloodBankID',$bloodBankID)[0]['District'];
            $data[$key]['District'] = $district;
        }
        
        
        
    }

    
}