<?php

class RequestApprovalModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function getAllBloodBanks()
    {
        $data = $this->db->select("*", "bloodbank",null);
        return $data;
    }

    public function getUserID($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $ID = $this->db->select("userID","user","WHERE email =:email",':email',$email);
            $orgID = $ID[0];
            /* print_r($orgID);die(); */
            return $orgID;
        } 
    }

    public function addApprovalRequest($inputs) 
    {
        $columns = array('BloodBankID','Name','Number','Lane','City','District','Province','BedQuantity','Date','Starting_time','Ending_time','Number_of_donors','AdvertisementID','OrganizationUserID','Status');
        $param = array(':BloodBankID',':Name',':Number',':Lane',':City',':District',':Province',':BedQuantity',':Date',':Starting_time',':Ending_time',':Number_of_donors',':AdvertisementID',':OrganizationUserID',':Status');
        $result = $this->db->insert("donation_campaign", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    public function getCampaigns($User_ID)
    {
            
            $data = $this->db->select("*","donation_campaign","WHERE OrganizationUserID =:OrganizationUserID",':OrganizationUserID',$User_ID);
            return $data;
            
        
    }
    public function getSlotIDs($campid){
            
            $data = $this->db->select("SlotID","campaign_timeslots","WHERE CampaignID =:campid",':campid',$campid);
            return $data;
            print_r($data);die();
            
            
    }

    public function get_campaign_info($campid)
    {
        $data = $this->db->select("*", "donation_campaign","WHERE CampaignID =:CampaignID", ':CampaignID', $campid);
        $ret_data = $data[0];
        return $ret_data;
    }
    public function getAcceptedCampaigns($User_ID)
    {
            
            $data = $this->db->select("*","donation_campaign","WHERE OrganizationUserID =:OrganizationUserID AND Status= 1 " ,':OrganizationUserID',$User_ID);
            return $data;
            
        
    }

    public function getfeedbackInfo($campid)
    {
            
            $data = $this->db->select("DonorID,Feedback","donor_campaign_bloodpacket","WHERE CampaignID =:campid" ,':campid',$campid);
            return $data;
            
            
        
    }
    

    public function get_telno($User_ID)
    {
        $data1 = $this->db->select("*", "organization_society", "WHERE UserID = :User_ID",':User_ID',$User_ID);
        
        //Select Email,Username,Password from user table
        $data2 = $this->db->select("Email,Username,UserType", "user", "WHERE UserID = :UserID",':UserID',$User_ID);
        //Select ContactNumber from usercontactnumber table
        $data3 = $this->db->select("ContactNumber", "usercontactnumber", "WHERE UserID = :UserID",':UserID',$User_ID);
        $data = array_merge($data1,$data2,$data3);
        //Return data as a single array
        
        return $data;
        /* $data = $this->db->select("ContactNumber", "usercontactnumber","WHERE UserID =:UserID", ':UserID', $User_ID);
        return $data; */
    }

    public function editProfile($User_ID,$inputs1, $inputs2, $inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email','Username');
        $param1 = array(':Email',':Username');
        $result1 = $this->db->update("user", $columns1, $param1, $inputs1,':User_ID',$User_ID,"WHERE UserID = :User_ID");
        

        // //Updating the hospital/medical center table
        // //Get the UserID from the last inserted user from the user table
        // $UserID = $this->db->lastInsertId();
        // array_unshift($inputs2, $UserID);

        $columns2 = array('Name','Number','LaneName','City','District','Province');
        $param2 = array(':Name',':Number',':LaneName',':City',':District',':Province');
        $result2 = $this->db->update("organization_society", $columns2, $param2, $inputs2,':User_ID',$User_ID,"WHERE UserID = :User_ID");
        
        //Updating the usercontactnumber table
        $columns3 = array('ContactNumber');
        $param3 = array(':ContactNumber');
        
        // array_unshift($inputs3, $UserID);
        $result3 = $this->db->update("usercontactnumber", $columns3, $param3, $inputs3,':User_ID',$User_ID,"WHERE UserID = :User_ID");
        
        if($result1=="Success" && $result2=="Success" && $result3=="Success"){
            return true;
        }
        else{
            print_r($result1);
            print_r($result2);
            print_r($result3);
        }
    }

    public function getSlotDetails($timeslots){
            
        $data = $this->db->select("*","timeslot","WHERE SlotID =:timeslots",':timeslots',$timeslots);
        return $data;
        
        
    }
    
    
}
 

