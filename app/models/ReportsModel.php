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
        // Create districts array for the province with index equal to the district name
        $districts = array();
        if($Province == "Western"){
            $districts = array(
                0 => "Colombo",
                1 => "Gampaha",
                2 => "Kalutara"
            );
        }
        else if($Province == "Central"){
            $districts = array(
                0 => "Kandy",
                1 => "Matale",
                2 => "Nuwara Eliya"
            );
        }
        else if($Province == "Southern"){
            $districts = array(
                0 => "Galle",
                1 => "Matara",
                2 => "Hambantota"
            );
        }
        else if($Province == "North Western"){
            $districts = array(
                0 => "Kurunegala",
                1 => "Puttalam"
            
            );
        }
        else if($Province == "North Central"){
            $districts = array(
                0 => "Anuradhapura",
                1 => "Polonnaruwa"
            
            );
        }
        else if($Province == "Uva"){
            $districts = array(
                0 => "Badulla",
                1 => "Monaragala"
            
            
            );
        }
        else if($Province == "Sabaragamuwa"){
            $districts = array(
                0 => "Ratnapura",
                1 => "Kegalle"
            
            
            );
        }
        else if($Province == "Eastern"){
            $districts = array(
                0 => "Trincomalee",
                1 => "Batticaloa",
                2 => "Ampara"
            );
        }
        else if($Province == "Northern"){
            $districts = array(
                0 => "Jaffna",
                1 => "Kilinochchi",
                2 => "Mannar",
                3 => "Mullaitivu",
                4 => "Vavuniya"
            );
        }
        // For each district get the usage vs expiry data
        foreach ($districts as $key => $value) {
            $districts[$key] = $this->getDistrictData($value);
        }
        return $districts;

        
    }

    // Function to get the usage vs expiry analysis in a district
    public function getDistrictData($district){
        // All donations from donor_bloodbank_bloodpacket table getting the bloodbank district from the bloodbank table using join
        $bank_donations = $this->db->select("donor_bloodbank_bloodpacket.PacketID","donor_bloodbank_bloodpacket","INNER JOIN bloodbank ON donor_bloodbank_bloodpacket.BloodBankID = bloodbank.BloodBankID WHERE bloodbank.District=:district",':district',$district);
        // Get only the PacketID from the array
        $bank_donations = array_column($bank_donations, 'PacketID');
        
        
        // All donations from donor_campaign_bloodpacket table getting the bloodbank district from the bloodbank table using join thoru the campaign table
        $campaign_donations = $this->db->select("donor_campaign_bloodpacket.PacketID","donor_campaign_bloodpacket","INNER JOIN donation_campaign ON donor_campaign_bloodpacket.CampaignID = donation_campaign.CampaignID INNER JOIN bloodbank ON donation_campaign.BloodBankID = bloodbank.BloodBankID WHERE bloodbank.District=:district",':district',$district);
        // Get only the PacketID from the array
        $campaign_donations = array_column($campaign_donations, 'PacketID');
        
        $total_donation = count($bank_donations) + count($campaign_donations);

        //Merge the two arrays
        $donations = array_merge($bank_donations,$campaign_donations);

        //An array to store the usage vs expiry data
        $result_array = array();
        $result_array['used'] = 0;
        $result_array['expired'] = 0;
        $result_array['available'] = 0;

        // For each packetID from the donations array check if it is used or expired
        foreach ($donations as $key => $value) {
            $packet = $this->db->select("Status,PacketID","bloodpacket","WHERE PacketID=:packetID",':packetID',$value);
            // If the packet is used increment the used count
            if($packet[0]['Status'] == 3){
                $result_array['used']++;
            }
            // If the packet is expired increment the expired count
            else if($packet[0]['Status'] == 2){
                $result_array['expired']++;
            }
            // If the packet is not used or expired it is still in the bloodbank
            else if ($packet[0]['Status'] == 1){
                $result_array['available']++;
            }
        }
        
        // Append the total donations to the result array
        $result_array['total_donations'] = $total_donation;
        // Append the district name to the result array
        $result_array['district'] = $district;
        return $result_array;
    }


        
        

    // Function to get the usage vs expiry analysis in a province
    public function getProvinceData($province){

        // All donations from donor_bloodbank_bloodpacket table getting the bloodbank province from the bloodbank table using join
        $bank_donations = $this->db->select("donor_bloodbank_bloodpacket.PacketID","donor_bloodbank_bloodpacket","INNER JOIN bloodbank ON donor_bloodbank_bloodpacket.BloodBankID = bloodbank.BloodBankID WHERE bloodbank.Province=:province",':province',$province);
        // Get only the PacketID from the array
        $bank_donations = array_column($bank_donations, 'PacketID');
        
        
        // All donations from donor_campaign_bloodpacket table getting the bloodbank province from the bloodbank table using join thoru the campaign table
        $campaign_donations = $this->db->select("donor_campaign_bloodpacket.PacketID","donor_campaign_bloodpacket","INNER JOIN donation_campaign ON donor_campaign_bloodpacket.CampaignID = donation_campaign.CampaignID INNER JOIN bloodbank ON donation_campaign.BloodBankID = bloodbank.BloodBankID WHERE bloodbank.Province=:province",':province',$province);
        // Get only the PacketID from the array
        $campaign_donations = array_column($campaign_donations, 'PacketID');
        
        $total_donation = count($bank_donations) + count($campaign_donations);

        //Merge the two arrays keeping only one key PacketID
        $donations = array_merge($bank_donations,$campaign_donations);
        
        
        
        
        // An array to store the no. of used packets and the no. of expired packets
        $result_array = array();
        $result_array['used'] = 0;
        $result_array['expired'] = 0;
        $result_array['available'] = 0;
        // For each pcaketID from the donations array check if it is used or expired
        foreach ($donations as $key => $value) {
            $packet = $this->db->select("Status,PacketID","bloodpacket","WHERE PacketID=:packetID",':packetID',$value);
            // If the packet is used increment the used count
            if($packet[0]['Status'] == 3){
                $result_array['used']++;
            }
            // If the packet is expired increment the expired count
            else if($packet[0]['Status'] == 2){
                $result_array['expired']++;
            }
            // If the packet is not used or expired it is still in the bloodbank
            else if ($packet[0]['Status'] == 1){
                $result_array['available']++;
            }
        }
        
        // Append the total donations to the result array
        $result_array['total_donations'] = $total_donation;
        return $result_array;    
    }

    // Function to get all the donations of a year
    public function getUsageBlood($Year){

        // // An array to store the used quantity for the 12 months
        // $usedQuantity = array();

        // // Get all the donations from the blood bank donations table
        // $data = $this->db->select("PacketID,Date", "donor_bloodbank_bloodpacket","WHERE YEAR(Date) = :year",':year',$Year);
        // // For each packet ID check the status of the packet, if status is o then it is used
        // foreach ($data as $key => $value) {
        //     $packetID = $data[$key]['PacketID'];
        //     $status = $this->db->select("Status", "bloodpacket","WHERE PacketID = :packetID",':packetID',$packetID)[0]['Status'];
        //     if($status == 0){
        //         // Get the quantity of the packet and add it to the array
        //         $quantity = $this->db->select("Quantity", "bloodpacket","WHERE PacketID = :packetID",':packetID',$packetID)[0]['Quantity'];
        //         $data[$key]['Quantity'] = $quantity;
        //     }
        // }
        // // For each packet get the month and add the quantity to the array
        // foreach ($data as $key => $value) {
        //     $month = date("m", strtotime($data[$key]['Date']));
        //     $quantity = $data[$key]['Quantity'];
        //     if(isset($usedQuantity[$month])){
        //         $usedQuantity[$month] += $quantity;
        //     }
        //     else{
        //         $usedQuantity[$month] = $quantity;
        //     }
        // }

        
        // // Get all the donations from the campaign donations table
        // $data2 = $this->db->select("PacketID,Date", "donor_campaign_bloodpacket","WHERE YEAR(Date) = :year",':year',$Year);
        // // For each packet ID check the status of the packet, if status is o then it is used
        // foreach ($data2 as $key => $value) {
        //     $packetID = $data2[$key]['PacketID'];
        //     $status = $this->db->select("Status", "bloodpacket","WHERE PacketID = :packetID",':packetID',$packetID)[0]['Status'];
        //     if($status == 0){
        //         // Get the quantity of the packet and add it to the array
        //         $quantity = $this->db->select("Quantity", "bloodpacket","WHERE PacketID = :packetID",':packetID',$packetID)[0]['Quantity'];
        //         $data2[$key]['Quantity'] = $quantity;
        //     }
        // }

        // // For each packet get the month and add the quantity to the array
        // foreach ($data2 as $key => $value) {
        //     $month = date("m", strtotime($data2[$key]['Date']));
        //     $quantity = $data2[$key]['Quantity'];
        //     if(isset($usedQuantity[$month])){
        //         $usedQuantity[$month] += $quantity;
        //     }
        //     else{
        //         $usedQuantity[$month] = $quantity;
        //     }
        // }
        // return $usedQuantity;


        //All requests from hospital_bloodbank_request table where Status = 1 and Year of Date_requested = $Year Group by Month and Year of Date_requested
        $data = $this->db->select("COUNT(*) as NoOfRequests, MONTH(Date_requested) as Month", "hospital_blood_requests","WHERE YEAR(Date_requested) = :year AND Status = 1 GROUP BY MONTH(Date_requested)",':year',$Year);
        
        // Array to store the data of 12 months
        $result_array = array();
        // Declare the array with 12 keys which are the months of the year and set the values to 0
        for ($i=1; $i <= 12; $i++) { 
            $result_array[$i] = 0;
        }
        // For each month add the no of requests to the array if a value is present
        foreach ($data as $key => $value) {
            $month = $data[$key]['Month'];
            $noOfRequests = $data[$key]['NoOfRequests'];
            $result_array[$month] = $noOfRequests;
        }
        
        return $result_array;



    }

    // Function to get the blood request stats of a year
    public function getRequestStats($Year){
        // Array to store the accepted requests,declined requests and pending requests
        $result_array = array();
        // Initalize the values to 0
        $result_array['accepted'] = 0;
        $result_array['declined'] = 0;
        $result_array['pending'] = 0;
        // Get the no of accepted requests from the hospital_bloodbank_request table where the status is 1 and the year of the date requested is the year given
        $data = $this->db->select("RequestID,Status", "hospital_blood_requests","WHERE YEAR(Date_requested) = :year",':year',$Year);
        // For each request check the status and increment the value of the array
        foreach ($data as $key => $value) {
            $status = $data[$key]['Status'];
            if($status == 1){
                $result_array['accepted']++;
            }
            else if($status == 2){
                $result_array['declined']++;
            }
            else{
                $result_array['pending']++;
            }
        }
        return $result_array;

    }

    // Function to get all donations of a category
    public function getAllBloodDonations($category){
        // Array to store the data the donations 25 districts
        $result_array = array();
        // Get the no of donations from the donor_bloodbank_bloodpacket table join with donor table to match the blood category and join the blood bank table to get the district, group by the district
        $data = $this->db->select("COUNT(donor_bloodbank_bloodpacket.PacketID) as NoOfDonations, bloodbank.District", "donor_bloodbank_bloodpacket","INNER JOIN donor on donor_bloodbank_bloodpacket.DonorID = donor.UserID INNER JOIN bloodbank on donor_bloodbank_bloodpacket.BloodBankID = bloodbank.BloodBankID WHERE donor.BloodType = :category GROUP BY bloodbank.District",':category',$category);        
        // Insert into the array the no of donations and the district
        foreach ($data as $key => $value) {
            $result_array[$data[$key]['District']] = $data[$key]['NoOfDonations'];
        }

        
        
        // Get the no of donations from the donor_campaign_bloodpacket table join with donor table to match the blood category and join the bloodpacket table to get the bloodbank relevent and join the bloodbank table to get the bloodbank district, group by the district
        $data2 = $this->db->select("COUNT(donor_campaign_bloodpacket.PacketID) as NoOfDonations, bloodbank.District", "donor_campaign_bloodpacket","INNER JOIN donor on donor_campaign_bloodpacket.DonorID = donor.UserID INNER JOIN bloodpacket on donor_campaign_bloodpacket.PacketID = bloodpacket.PacketID INNER JOIN bloodbank on bloodpacket.blood_bank_ID = bloodbank.BloodBankID WHERE donor.BloodType = :category GROUP BY bloodbank.District",':category',$category);
        // Insert into the array the no of donations and the district
        foreach ($data2 as $key => $value) {
            if(isset($result_array[$data2[$key]['District']])){
                $result_array[$data2[$key]['District']] += $data2[$key]['NoOfDonations'];
            }
            else{
                $result_array[$data2[$key]['District']] = $data2[$key]['NoOfDonations'];
            }
        }

        //Rearrange the result_array to have the districts in the order Colombo, Gampaha, Kalutara, Kandy, Matale, Nuwara Eliya, Galle, Matara, Hambantota, Jaffna, Mannar, Mullaitivu, Vavuniya, Kilinochchi, Anuradhapura, Polonnaruwa, Badulla, Monaragala, Ratnapura, Kegalle, Trincomalee, Batticaloa, Ampara, Puttalam, Kurunegala
        $districts = array(
            "Colombo" => "Colombo",
            "Gampaha" => "Gampaha",
            "Kalutara" => "Kalutara",
            "Kandy" => "Kandy",
            "Matale" => "Matale",
            "Nuwara Eliya" => "Nuwara Eliya",
            "Galle" => "Galle",
            "Matara" => "Matara",
            "Hambantota" => "Hambantota",
            "Jaffna" => "Jaffna",
            "Mannar" => "Mannar",
            "Mullaitivu" => "Mullaitivu",
            "Vavuniya" => "Vavuniya",
            "Kilinochchi" => "Kilinochchi",
            "Anuradhapura" => "Anuradhapura",
            "Polonnaruwa" => "Polonnaruwa",
            "Badulla" => "Badulla",
            "Monaragala" => "Monaragala",
            "Ratnapura" => "Ratnapura",
            "Kegalle" => "Kegalle",
            "Trincomalee" => "Trincomalee",
            "Batticaloa" => "Batticaloa",
            "Ampara" => "Ampara",
            "Puttalam" => "Puttalam",
            "Kurunegala" => "Kurunegala"
        );
        $result_array2 = array();
        foreach ($districts as $key => $value) {
            if(isset($result_array[$key])){
                $result_array2[$key] = $result_array[$key];
            }
            else{
                $result_array2[$key] = 0;
            }
        }
        //Get the district with the highest number of donations and the value
        $max = max($result_array2);
        $result_array2['max_donations_value'] = $max;
        $result_array2['max_donations_district'] = array_search($max, $result_array2);

        //Get the district with the lowest number of donations and the value
        $min = min($result_array2);
        $result_array2['min_donations_value'] = $min;
        $result_array2['min_donations_district'] = array_search($min, $result_array2);


        return $result_array2;

        
        
        
        
    }

    //Function to get all the registered donors of a blood category
    public function getDonors($category){
        // Array to store the data the donations 25 districts
        $result_array = array();
        // Get the number of donors matching the bloodtype grouped by the district
        $data = $this->db->select("COUNT(UserID) as NoOfDonors,District", "donor","WHERE BloodType=:category GROUP BY District",':category',$category);


        // Insert into the array the no of donors and the district
        foreach ($data as $key => $value) {
            $result_array[$data[$key]['District']] = $data[$key]['NoOfDonors'];
        }
        
        
        //Rearrange the result_array to have the districts in the order Colombo, Gampaha, Kalutara, Kandy, Matale, Nuwara Eliya, Galle, Matara, Hambantota, Jaffna, Mannar, Mullaitivu, Vavuniya, Kilinochchi, Anuradhapura, Polonnaruwa, Badulla, Monaragala, Ratnapura, Kegalle, Trincomalee, Batticaloa, Ampara, Puttalam, Kurunegala
        $districts = array(
            "Colombo" => "Colombo",
            "Gampaha" => "Gampaha",
            "Kalutara" => "Kalutara",
            "Kandy" => "Kandy",
            "Matale" => "Matale",
            "Nuwara Eliya" => "Nuwara Eliya",
            "Galle" => "Galle",
            "Matara" => "Matara",
            "Hambantota" => "Hambantota",
            "Jaffna" => "Jaffna",
            "Mannar" => "Mannar",
            "Mullaitivu" => "Mullaitivu",
            "Vavuniya" => "Vavuniya",
            "Kilinochchi" => "Kilinochchi",
            "Anuradhapura" => "Anuradhapura",
            "Polonnaruwa" => "Polonnaruwa",
            "Badulla" => "Badulla",
            "Monaragala" => "Monaragala",
            "Ratnapura" => "Ratnapura",
            "Kegalle" => "Kegalle",
            "Trincomalee" => "Trincomalee",
            "Batticaloa" => "Batticaloa",
            "Ampara" => "Ampara",
            "Puttalam" => "Puttalam",
            "Kurunegala" => "Kurunegala"
        );
        $result_array2 = array();
        foreach ($districts as $key => $value) {
            if(isset($result_array[$key])){
                $result_array2[$key] = $result_array[$key];
            }
            else{
                $result_array2[$key] = 0;
            }
        }


        //Get the district with the highest number of donors and the value
        $max = max($result_array2);
        $result_array2['max_donors_value'] = $max;
        $result_array2['max_donors_district'] = array_search($max, $result_array2);

        //Get the district with the lowest number of donors and the value
        $min = min($result_array2);
        $result_array2['min_donors_value'] = $min;
        $result_array2['min_donors_district'] = array_search($min, $result_array2);
        return $result_array2;


    }

    

    
}   