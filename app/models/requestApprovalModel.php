<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require '../vendor/autoload.php'; 
class RequestApprovalModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllBloodBanks()
    {
        $data = $this->db->select("*", "bloodbank", null);
        
        return $data;
    }
    public function getadvertisementIDs()
    {
        $donationType = "Inventory";
        $data = $this->db->select("AdvertisementID", "donation", "WHERE DonationType = :DonationType;", ':DonationType', $donationType);
        //print_r($data);die();
        //print_r($data);die();
        return $data;
    }

    public function getDonationID($AdvertisementID)
    {
        //$donationType="Inventory";
        $data = $this->db->select("DonationID", "donation", "WHERE AdvertisementID = :AdvertisementID;", ':AdvertisementID', $AdvertisementID);
        //print_r($data);die();
        return $data;
    }


    //function to get all details from the advertisement table using the advertisement ID
    public function getAdvertisements($adid)
    {
        $data = $this->db->select("*", "advertisement", "WHERE AdvertisementID = :AdvertisementID;", ':AdvertisementID', $adid);
        //print_r($data);
        return $data;
    }

    //function to get all details from inventory_donation table to get total amountof inventory for each category using the advertisement ID


    public function getInventoryCatToAd($adid)
    {
        $data = $this->db->select("InventoryCategory", "donation", "WHERE AdvertisementID = :AdvertisementID;", ':AdvertisementID', $adid);
        //print_r($data);die();
        //$data=$data[0]['InventoryCategory'];
        //print_r($inventoryCat);die();
        return $data;
    }

    public function getInventoryCat($AdvertisementID)
    {
        $data = $this->db->select("InventoryCategory", "donation", "WHERE AdvertisementID = :AdvertisementID;", ':AdvertisementID', $AdvertisementID);
        $inventoryCat = $data[0]['InventoryCategory'];
        //print_r($inventoryCat);die();
        return $inventoryCat;
    }

    public function getTotalReceived($adid){

    }
    public function getBloodbankNames($bloodbankIds)
    {
        $data = $this->db->select("BloodBank_Name", "bloodbank", "WHERE BloodBankID = :BloodBankID;", ':BloodBankID', $bloodbankIds);
        //print_r($data);
        return $data;

    }
    public function getUserID($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $ID = $this->db->select("userID", "user", "WHERE email =:email", ':email', $email);
            $orgID = $ID[0];
            /* print_r($orgID);die(); */
            return $orgID;
        }
    }

    public function getuserimg($userid)
    {
        if ($this->db->select('count', "user", "WHERE UserID = :UserID;", ':UserID', $userid) > 0) {
            $type = $this->db->select("Userpic", "user", "WHERE UserID =:UserID", ':UserID', $userid);
            $user_pic = $type[0]['Userpic'];
            return $user_pic;
        }
    }

    public function addApprovalRequest($inputs)
    {
        $columns = array('Name', 'Location', 'BedQuantity', 'Date', 'Starting_time', 'Ending_time', 'Number_of_donors', 'AdvertisementID', 'OrganizationUserID', 'Status', 'BloodBankID');
        $param = array(':Name', ':Location', ':BedQuantity', ':Date', ':Starting_time', ':Ending_time', ':Number_of_donors', ':AdvertisementID', ':OrganizationUserID', ':Status', ':BloodBankID');
        $result = $this->db->insert("donation_campaign", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else
            print_r($result);
    }
    public function addinventoryItem($inputs1,$inputs2)
    {

        /* $columns1 = array('DonationID','Inventory_category');
        $param1 = array(':AdvertisementID',':Total_amount');
        $result1 = $this->db->update("donation", $columns1, $param1, $inputs1,':AdvertisementID',$AdvertisementID,"WHERE AdvertisementID = :AdvertisementID"); */
        $column1 = array('DonationID', 'Inventory_category', 'Quantity', 'Accepted_date', 'Admin_verify','Organization_UserID');
        $param1 = array(':DonationID', ':Inventory_category', ':Quantity', ':Accepted_date', ':Admin_verify',':Organization_UserID');
        $result1 = $this->db->insert("inventory_donation", $column1, $param1, $inputs1);

         
        $column2=array('DonationID','OrganizationUserID','BloodBankID');
        $param2=array(':DonationID',':OrganizationUserID',':BloodBankID');


        // Check whether the donation is already inserted
        $check = $this->db->select("count(*)", "organization_donations_bloodbank", "WHERE DonationID =:DonationID AND OrganizationUserID =:OrganizationUserID AND BloodBankID =:BloodBankID", $param2, $inputs2);
        // If the donation is not inserted, insert it
        if ($check[0][0] == 0) {
            $result2 = $this->db->insert('organization_donations_bloodbank', $column2, $param2, $inputs2);
        } else {
            $result2 = "Success";
        }
        if ($result1 == "Success" && $result2 == "Success" ) {
            return true;
        } else {
            print_r($result1);
            print_r($result2);
            
        };
    }

    public function getCampaigns($User_ID)
    {

        $data = $this->db->select("*", "donation_campaign", "WHERE OrganizationUserID =:OrganizationUserID", ':OrganizationUserID', $User_ID);
        return $data;


    }

    public function getfeedbackInfoRating($campid,$rating){
        $data = $this->db->select("*", "donor_campaign_bloodpacket", "WHERE CampaignID =:CampaignID AND Rating =:Rating", [":CampaignID",":Rating"], [$campid,$rating]);
        return $data;
    }

    public function getCampaignsOfDate($date,$User_ID)
    {
        //print_r("awa");die();
        $data = $this->db->select("*","donation_campaign", "WHERE OrganizationUserID =:OrganizationUserID AND Date =:Date", [":OrganizationUserID",":Date"], [$User_ID,$date]);
        // [':OrganizationUserID'], 
        // [$User_ID]);
        //print_r($data);die();
        return $data;
    }

    public function getBloodbankID($User_ID)
    {

        $data = $this->db->select("BloodBankID", "donation_campaign", "WHERE UserID =:UserID", ':UserID', $User_ID);
        return $data;



    }

    public function getDistrict($bloodbankID){
        $data = $this->db->select("District", "bloodbank", "WHERE BloodBankID =:BloodBankID", ':BloodBankID', $bloodbankID);
        return $data;
    }

    public function getCampaignsOfDateAndDistrict($date, $User_ID, $district){
        $campids=[];
        $campidsofdate=$this->db->select("*", "donation_campaign", "WHERE OrganizationUserID =:OrganizationUserID AND Date =:Date", [':OrganizationUserID',':Date'] , [$User_ID, $date]);
        foreach ($campidsofdate as $campid){
            $campid=$campid['CampaignID'];
            //print_r($campid);die();
            $bloodbankID=$this->db->select("BloodBankID", "donation_campaign", "WHERE CampaignID =:CampaignID", ':CampaignID', $campid)[0];
            $bloodbankID=$bloodbankID['BloodBankID'];
            //print_r($bloodbankID);die();
            $districtofcamp=$this->db->select("District", "bloodbank", "WHERE BloodBankID =:BloodBankID", ':BloodBankID', $bloodbankID)[0];
            $districtofcamp=$districtofcamp['District'];
            //print_r($districtofcamp);die();
            if($districtofcamp==$district){
                array_push($campids,$campid);
            }
           // print_r($campids);die();
        }
        // print_r($campids);die();
        // For each campaign id, get the campaign details
        $campaigns=[];
        foreach ($campids as $campid){
            $campaign=$this->db->select("*", "donation_campaign", "WHERE CampaignID =:CampaignID", ':CampaignID', $campid)[0];
            array_push($campaigns,$campaign);
        }
        return $campaigns;

    }

    public function Campaignsofdistrict($district,$User_ID){
        // print_r("Awaa");die();
        $campids=[];
        $campidsofUser=$this->db->select("*", "donation_campaign", "WHERE OrganizationUserID =:OrganizationUserID", ':OrganizationUserID' , $User_ID);

        // For each campaign id, check the district
        foreach ($campidsofUser as $campid){
            $campid=$campid['CampaignID'];
            //print_r($campid);die();
            $bloodbankID=$this->db->select("BloodBankID", "donation_campaign", "WHERE CampaignID =:CampaignID", ':CampaignID', $campid)[0];
            $bloodbankID=$bloodbankID['BloodBankID'];
            //print_r($bloodbankID);die();
            $districtofcamp=$this->db->select("District", "bloodbank", "WHERE BloodBankID =:BloodBankID", ':BloodBankID', $bloodbankID)[0];
            $districtofcamp=$districtofcamp['District'];
            //print_r($districtofcamp);die();
            if($districtofcamp==$district){
                array_push($campids,$campid);
            }
            // print_r($campids);die();
        }
        
        // For each campaign id, get the campaign details
        $campaigns=[];
        foreach ($campids as $campid){
            $campaign=$this->db->select("*", "donation_campaign", "WHERE CampaignID =:CampaignID", ':CampaignID', $campid)[0];
            array_push($campaigns,$campaign);
        }
        return $campaigns;
    }
    

    public function getSlotIDs($campid)
    {

        $data = $this->db->select("SlotID", "campaign_timeslots", "WHERE CampaignID =:campid", ':campid', $campid);
        return $data;
        print_r($data);
        die();


    }


    public function getScheduledTimeslots($campid)
    {
        $data = $this->db->select("*", "campaign_timeslots", "WHERE CampaignID =:campid", ':campid', $campid);
        //print_r($data);die();
        return $data;
    }


    public function get_campaign_info($campid)
    {
        $data = $this->db->select("*", "donation_campaign", "WHERE CampaignID =:CampaignID", ':CampaignID', $campid);
        $ret_data = $data[0];
        return $ret_data;
    }

    public function getAcceptedCampaigns($User_ID)
    {

        $data = $this->db->select("*", "donation_campaign", "WHERE OrganizationUserID =:OrganizationUserID AND Status= 1 ", ':OrganizationUserID', $User_ID);
        //filter the $data array to get only upcoming campaigns
        //print_r($data);die();
        /* $upcoming_campaigns = array();
        foreach($data as $campaign){
        if($campaign['Date'] >= $today){
        array_push($upcoming_campaigns,$campaign);
        }
        } */
        //print_r($upcoming_campaigns);die();

        return $data;

    }

    public function getUpcomingCampaigns($accepted_campaigns, $todaysDate)
    {
        $upcoming_campaigns = array();
        //print_r($accepted_campaigns);die();
        foreach ($accepted_campaigns as $campaign) {
            if ($campaign['Date'] >= $todaysDate) {
                array_push($upcoming_campaigns, $campaign);
            }
        }
        //print_r($upcoming_campaigns);die();
        return $upcoming_campaigns;

    }

    public function getPastCampaigns($accepted_campaigns, $todaysDate)
    {
        $past_campaigns = array();
        foreach ($accepted_campaigns as $campaign) {
            if ($campaign['Date'] < $todaysDate) {
                array_push($past_campaigns, $campaign);
            }
        }
        //print_r($past_campaigns);die();
        return $past_campaigns;

    }
    public function getfeedbackInfo($campid)
    {

        $data = $this->db->select("DonorID,Feedback,Date,Rating", "donor_campaign_bloodpacket", "WHERE CampaignID =:campid AND (Feedback is not null and Rating is not null)", ':campid', $campid);
        
        return $data;



    }

    public function getdonorName($donorIds){
        //print_r($donorIds);die();
        $x=sizeof($donorIds);
        //print_r($donorIds);die();
        for($i=0;$i<$x;$i++){
           $donorid=$donorIds[$i];
           //print_r($donorid);die();
           $name[$i] = $this->db->select("Fullname,UserID","donor","WHERE UserID =:UserID",':UserID',$donorid);
       //print_r($name);die();
       
        }
       //print_r($name);die();
        return $name;
       
       
   }


    public function get_telno($User_ID)
    {
        $data1 = $this->db->select("*", "organization_society", "WHERE UserID = :User_ID", ':User_ID', $User_ID);

        //Select Email,Username,Password from user table
        $data2 = $this->db->select("Email,Username,UserType,Userpic,Password", "user", "WHERE UserID = :UserID", ':UserID', $User_ID);
        //Select ContactNumber from usercontactnumber table
        $data3 = $this->db->select("ContactNumber", "usercontactnumber", "WHERE UserID = :UserID", ':UserID', $User_ID);
        $data = array_merge($data1, $data2, $data3);
        //Return data as a single array

        return $data;
        /* $data = $this->db->select("ContactNumber", "usercontactnumber","WHERE UserID =:UserID", ':UserID', $User_ID);
        return $data; */
    }

    public function editProfile($User_ID, $inputs1, $inputs2, $inputs3)
    {

        //Updating the user table
        $columns1 = array('Password', 'Username', 'Userpic');
        $param1 = array(':Password', ':Username', ':Userpic');
        $result1 = $this->db->update("user", $columns1, $param1, $inputs1, ':User_ID', $User_ID, "WHERE UserID = :User_ID");


        // //Updating the hospital/medical center table
        // //Get the UserID from the last inserted user from the user table
        // $UserID = $this->db->lastInsertId();
        // array_unshift($inputs2, $UserID);

        $columns2 = array('Name', 'Number', 'LaneName', 'City', 'District', 'Province');
        $param2 = array(':Name', ':Number', ':LaneName', ':City', ':District', ':Province');
        $result2 = $this->db->update("organization_society", $columns2, $param2, $inputs2, ':User_ID', $User_ID, "WHERE UserID = :User_ID");

        //Updating the usercontactnumber table
        $columns3 = array('ContactNumber');
        $param3 = array(':ContactNumber');

        // array_unshift($inputs3, $UserID);
        $result3 = $this->db->update("usercontactnumber", $columns3, $param3, $inputs3, ':User_ID', $User_ID, "WHERE UserID = :User_ID");

        if ($result1 == "Success" && $result2 == "Success" && $result3 == "Success") {
            return true;
        } else {
            print_r($result1);
            print_r($result2);
            print_r($result3);
        }
    }

    public function getSlotDetails($timeslots)
    {

        $data = $this->db->select("*", "timeslot", "WHERE SlotID =:timeslots", ':timeslots', $timeslots);
        return $data;


    }

    public function getDonorList($campid,$slotid){
        //print_r($slotid);die(); 
        $param=[':SlotID',':CampaignID'];
        $inputs=[$slotid,$campid];
        $data = $this->db->select("DonorID","register_to_campaign","WHERE SlotID =:SlotID && CampaignID=:CampaignID ",$param,$inputs);
        //print_r($data);die();
        return $data;
        
        
        
    }

    public function getDonorDetails($donorid){
        //print_r($donorid);die();
        $data = $this->db->select("*","donor","WHERE UserID =:UserID",':UserID',$donorid);
        //print_r($data);die();
        return $data;
    }

    function getDonorContact($donorid){
        $data = $this->db->select("ContactNumber,UserID","usercontactnumber","WHERE UserID =:UserID",':UserID',$donorid);
        return $data;
    }

    public function addSlot($slotid,$campid){
        $inputs = array($slotid,$campid);
        //print_r($inputs );die();
        $columns = array('SlotID','CampaignID');
        $param = array(':SlotID',':CampaignID');
        $result = $this->db->insert("campaign_timeslots", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else {
            print_r($result);}
    }

    public function getAllTimeslots(){
                
        $data = $this->db->select("*","timeslot",null);
        //print_r($data);die();
        return $data;
     
}

    public function removeSlot($slotid,$campid){
            
        $result1 = $this->db->select("SlotID","campaign_timeslots","WHERE CampaignID =:CampaignID",':CampaignID',$campid);
        $param=[':SlotID','CampaignID'];
        $inputs=[$slotid,$campid];
        $result = $this->db->delete("campaign_timeslots","WHERE SlotID =:SlotID && CampaignID=:CampaignID ",$param,$inputs);
        //print_r(($result1));die();
        for($i=0;$i<sizeof($result1);$i++){
            //print_r($result1[$i]['SlotID']);die();
            if($result1[$i]['SlotID']==$slotid){
                //print_r("awa");die();
                //print_r($result1[$i]['SlotID']);
                //delete from campaign_timeslots where 
                
                
            }
        }
        
        //print_r($result);die();
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    public function getSlots($campid){
                
        $data = $this->db->select("SlotID","campaign_timeslots","WHERE CampaignID =:CampaignID",':CampaignID',$campid);
        //print_r($data);die();
        return $data;
     
    }

    public function addFeedback($inputs) 
    {
        
        $columns = array('OrganizationUserID','Feedback','Date');
        $param = array(':OrganizationUserID',':Feedback',':Date');
        $result = $this->db->insert("organization_feedback", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    //payment related
    
    public function getcashads()
    {
        $data = $this->db->select("*", "donation", "INNER JOIN Advertisement on donation.AdvertisementID = Advertisement.AdvertisementID WHERE donation.DonationType = 'cash' AND Advertisement.Archive = 0");
        return $data;
    }

    public function getcashadpics($cash_ads)
    {
        $ad_info = [];
        foreach ($cash_ads as $cash_ad) {
            $data = $this->db->select("*", "advertisement", "WHERE AdvertisementID =:cash_ads", ':cash_ads', $cash_ad[4]);
            array_push($ad_info, $data);
        }

        return $ad_info;


    }

    public function getcashbbs($adinfo)
    {
        $bb_info = [];
        foreach ($adinfo as $ad) {
            $data = $this->db->select("BloodBank_Name", "bloodbank", "WHERE BloodBankID =:adinfo", ':adinfo', $ad[0][3]);
            array_push($bb_info, $data);
        }

        return $bb_info;

    }

    public function getreceivedcashamounts($cash_ads)
    {
        $amounts = [];
        foreach ($cash_ads as $cash_ad) {
            $count = $this->db->select("COUNT(Amount)", "cash_donation", "WHERE DonationID =:cash_ads", ':cash_ads', $cash_ad[0]);
            if ($count[0][0] > 0) {
                $data = $this->db->select("SUM(Amount)", "cash_donation", "WHERE DonationID =:cash_ads", ':cash_ads', $cash_ad[0]);
            } else {
                $data = '0';
            }
            array_push($amounts, $data);
        }
        return $amounts;
    }

    public function getpastcashdonations($userid)
    {
        // $data = $this->db->select("DISTINCT cash_donation.*,bloodbank.BloodBank_Name,donation.Total_amount", "cash_donation", "INNER JOIN organization_donations_bloodbank on cash_donation.DonationID = organization_donations_bloodbank.DonationID INNER JOIN bloodbank on organization_donations_bloodbank.BloodBankID = bloodbank.BloodBankID INNER JOIN donation on donation.DonationID = cash_donation.DonationID WHERE cash_donation.Organization_UserID =:userid ORDER BY DATE DESC", ':userid', $userid);
        // return $data;

        // Get the cash donations relevent to the organization
        $data = $this->db->select("*", "cash_donation", "WHERE Organization_UserID =:userid", ':userid', $userid);
        // For each DonationID, get the bloodbank name and total amount
        for ($i = 0; $i < sizeof($data); $i++) {
            // Get the donation id and append the bloodbank name and total amount
            $donationid = $data[$i]["DonationID"];
            // Get the total amount from the donation table and append it to the data array
            $total_amount = $this->db->select("Total_amount", "donation", "WHERE DonationID =:donationid", ':donationid', $donationid);
            $data[$i]["Total_amount"] = $total_amount[0][0];

            // Get the bloodbankID from the organization_donations_bloodbank table
            $bloodbankid = $this->db->select("BloodBankID", "organization_donations_bloodbank", "WHERE DonationID =:donationid", ':donationid', $donationid);
            // Get the bloodbank name from the bloodbank table and append it to the data array
            $bloodbankname = $this->db->select("BloodBank_Name", "bloodbank", "WHERE BloodBankID =:bloodbankid", ':bloodbankid', $bloodbankid[0][0]);
            $data[$i]["BloodBank_Name"] = $bloodbankname[0][0];
        }

        return $data;
    }

    public function insertDonation($donationid, $donationamount, $userid,$today)
    {
        

        $columns = array('DonationID', 'Amount', 'Organization_UserID','Date');
        $param = array(':DonationID', ':Amount', ':Organization_UserID',':Date');
        $inputs = array($donationid, $donationamount, $userid,$today);
        $result1 = $this->db->insert("cash_donation", $columns, $param, $inputs);

        $adid = $this->db->select("AdvertisementID", "donation", "WHERE DonationID =:DonationID", ':DonationID', $donationid);
        $bloodbankid = $this->db->select("BloodBankID", "advertisement", "WHERE AdvertisementID =:AdvertisementID", ':AdvertisementID', $adid[0][0]);

        $columns1 = array('DonationID', 'BloodBankID', 'OrganizationUserID');
        $param1 = array(':DonationID', ':BloodBankID', ':OrganizationUserID');
        $inputs1 = array($donationid, $bloodbankid[0][0], $userid);

        // Check whether the donation is already inserted
        $check = $this->db->select("count(*)", "organization_donations_bloodbank", "WHERE DonationID =:DonationID AND BloodBankID =:BloodBankID AND OrganizationUserID =:OrganizationUserID", $param1, $inputs1);
        // If the donation is not inserted, insert it
        if ($check[0][0] == 0) {
            $result2 = $this->db->insert('organization_donations_bloodbank', $columns1, $param1, $inputs1);
        } else {
            $result2 = "Success";
        }
        if ($result1 == "Success") {
            if($result2 == "Success"){
                return true;
            }
            else{
                print_r($result2);
            }
            return true;
        } else
            print_r($result1);
    }

    //end payment

    public function check_password($userid,$password)
    {
        $result=($this->db->select('Password','User','WHERE UserID = :UserID',':UserID',$userid));
        //print_r($result);die();
        if(password_verify($password,$result[0]['Password'])){
            //print_r($result);die();
            return true;
        }
        else{
            return false;
        }
        // return $result;
    }

    public function update_email($userid,$email){
        $result=$this->db->update('user','Email',':Email',$email,':UserID',$userid,'WHERE UserID =:UserID');
        if($result=='Success'){
            return true;
        }
        else{
            return false;
        }
    }

    public function filter_out($district , $UserID){
        $data=$this->db->select("*","donation_campaign","WHERE District= :District AND OrganizationUserID=:OrganizationUserID",':District',$district,':OrganizationUserID',$UserID);
        //print_r($data);die();
        return true;
    }

    public function filter_out_bloodbank($district){
        
        $data=$this->db->select("*","bloodbank","WHERE District= :District",":District",$district);
        //print_r($data);die();
        return $data; 
        
        
    }

    public function getPastDonations($userid){
        $data=$this->db->select("DonationID,Inventory_category,Quantity,Accepted_date","inventory_donation","WHERE Organization_UserID=:Organization_UserID",':Organization_UserID',$userid);
        for($i=0;$i<sizeof($data);$i++){
            if($data[$i]['Accepted_date']==null){
                $data[$i]['Status']="Not Accepted";
            }
            else{
                $data[$i]['Status']="Accepted";
            }
        }
        for($i=0;$i<sizeof($data);$i++){
            $data[$i]['AdvertisementID']=$this->getAdvertisementID($data[$i]['DonationID']);
        }
        //take the inventory category and quantity for each donation id and add it to the array
        //print_r($data);die();
        for($i=0;$i<sizeof($data);$i++){
            $data[$i]['BloodbankID']=$this->getAdBloodbankID($data[$i]['AdvertisementID']);
        }
        //print_r($data);die();

        for($i=0;$i<sizeof($data);$i++){
            $data[$i]['Bloodbank_Name']=$this->getAdBloodbankName($data[$i]['BloodbankID']);
        }
        //print_r($data);die();
        
        return $data;
    }

    public function getAdvertisementID($donationID){
        $data=$this->db->select("AdvertisementID","donation","WHERE DonationID=:DonationID",':DonationID',$donationID);
        //print_r($data);die();
        return $data[0]['AdvertisementID'];
    }

    public function getAdBloodbankID($advertisementID){
        $data=$this->db->select("BloodBankID","advertisement","WHERE AdvertisementID=:AdvertisementID",':AdvertisementID',$advertisementID);
        //print_r($data);die();
        return $data[0]['BloodBankID'];
    }

    public function getAdBloodbankName($bloodbankID){
        $data=$this->db->select("BloodBank_Name","bloodbank","WHERE BloodBankID=:BloodBankID",':BloodBankID',$bloodbankID);
        //print_r($data);die();
        return $data[0]['BloodBank_Name'];
    }

    public function getAdvertisementDescription($advertisementID){
        $data=$this->db->select("Description","advertisement","WHERE AdvertisementID=:AdvertisementID",':AdvertisementID',$advertisementID);
        //print_r($data);die();
        return $data[0]['Description'];
    }

    public function getAdvertisementItemName($advertisementID){
        $data=$this->db->select("InventoryCategory","donation","WHERE AdvertisementID=:AdvertisementID",':AdvertisementID',$advertisementID);
        //print_r($data);die();
        return $data[0]['InventoryCategory'];
    }

    

}