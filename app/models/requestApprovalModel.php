<?php

class RequestApprovalModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllBloodBanks()
    {
        $data = $this->db->select("*", "bloodbank", null);
        print_r($data);
        die();
        return $data;
    }
    public function getadvertisementIDs()
    {
        $donationType = "Inventory";
        $data = $this->db->select("AdvertisementID", "donation", "WHERE DonationType = :DonationType;", ':DonationType', $donationType);
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
    public function addinventoryItem($inputs)
    {
        /* $columns1 = array('DonationID','Inventory_category');
        $param1 = array(':AdvertisementID',':Total_amount');
        $result1 = $this->db->update("donation", $columns1, $param1, $inputs1,':AdvertisementID',$AdvertisementID,"WHERE AdvertisementID = :AdvertisementID"); */
        $columns = array('DonationID', 'Inventory_category', 'Quantity', 'Accepted_date', 'Admin_verify');
        $param = array(':DonationID', ':Inventory_category', ':Quantity', ':Accepted_date', ':Admin_verify');
        $result = $this->db->insert("inventory_donation", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else
            print_r($result);
    }

    public function getCampaigns($User_ID)
    {

        $data = $this->db->select("*", "donation_campaign", "WHERE OrganizationUserID =:OrganizationUserID", ':OrganizationUserID', $User_ID);
        return $data;


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

        $data = $this->db->select("DonorID,Feedback,Date", "donor_campaign_bloodpacket", "WHERE CampaignID =:campid", ':campid', $campid);
        return $data;



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
        $columns1 = array('Email', 'Password', 'Username', 'Userpic');
        $param1 = array(':Email', ':Password', ':Username', ':Userpic');
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

    public function getcashads()
    {
        $data = $this->db->select("*", "donation", "WHERE DonationType = 'cash'");
        // print_r($data);die();
        return $data;


    }

    public function getcashadpics($cash_ads)
    {
        $ad_info = [];
        foreach ($cash_ads as $cash_ad) {
            $data = $this->db->select("*", "advertisement", "WHERE AdvertisementID =:cash_ads", ':cash_ads', $cash_ad[4]);
            array_push($ad_info, $data);
        }
        // print_r($ad_info);die();
        return $ad_info;
        // return $data;

    }

    public function getcashbbs($adinfo)
    {
        $bb_info = [];
        foreach ($adinfo as $ad) {
            $data = $this->db->select("BloodBank_Name", "bloodbank", "WHERE BloodBankID =:adinfo", ':adinfo', $ad[0][3]);
            array_push($bb_info, $data);
        }
        // print_r($bb_info);die();
        return $bb_info;
        // return $data;
    }

    public function getreceivedcashamounts($cash_ads)
    {
        $amounts = [];
        foreach ($cash_ads as $cash_ad) {
            $count = $this->db->select("COUNT(Amount)", "cash_donation", "WHERE DonationID =:cash_ads", ':cash_ads', $cash_ad[0]);
            // print_r($count[0][0]);
            if ($count[0][0] > 0) {
                // print_r('wft');
                $data = $this->db->select("SUM(Amount)", "cash_donation", "WHERE DonationID =:cash_ads", ':cash_ads', $cash_ad[0]);
            } else {
                $data = '0';
            }
            array_push($amounts, $data);
        }
        // print_r($amounts);die();
        return $amounts;
        // return $data;
    }

    public function insertDonation($donationid, $donationamount)
    {
        $columns = array('DonationID', 'Amount');
        $param = array(':DonationID', ':Amount');
        $inputs = array($donationid, $donationamount);
        $result = $this->db->insert("cash_donation", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else
            print_r($result);
    }


}