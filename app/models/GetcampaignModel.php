<?php

use LDAP\Result;

class GetcampaignModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function campregistraions($userid){
        $data = $this->db->select("CampaignID", "register_to_campaign", "WHERE DonorID = :DonorID", ':DonorID', $userid);
        $registered_campaign_data = array();
        for ($x = 0; $x < count($data); $x++){
            $campaign_data = $this->db->select("*", "donation_campaign","WHERE CampaignID =:CampaignID", ':CampaignID', $data[$x][0]);
            array_push($registered_campaign_data,$campaign_data);
        }
        return $registered_campaign_data;
    }

    
    public function getAllCampaigns()
    {
        $data = $this->db->select("*", "donation_campaign",null);
        return $data;
    }

     public function get_campaign_info($campid)
    {
        $data = $this->db->select("*", "donation_campaign","WHERE CampaignID =:CampaignID", ':CampaignID', $campid);
        $ret_data = $data[0];
        return $ret_data;
    }

    public function get_org_name($org_id){
        $org_name = $this->db->select("Name", "organization_society", "WHERE UserID=:UserID", ":UserID", $org_id);
        $ret_org_name = $org_name[0][0];
        return $ret_org_name;
    }

    // public function iftimeokay($user_ID,$camp_ID){
    //     $camp_date = $this->db->select('Date',"donation_campaign","WHERE CampaignID =:CampaignID", ':CampaignID', $camp_ID);
    //     $params = array(':DonorID',':Date');
    //     $columns = array($user_ID,$camp_date);
    //     if(($this->db->select('count', "donor_bloodbank_bloodpacket","WHERE DonorID =:DonorID ", ':DonorID', $user_ID ))>0 ||($this->db->select('count', "donor_campaign_bloodpacket","WHERE DonorID =:DonorID", ':DonorID', $user_ID ))>0 ){
    //         $this->db->select('Date', "donor_bloodbank_bloodpacket","WHERE DonorID =:DonorID && DATEDIFF(Date,:Date)", $params, $columns);
    //     }
    // }

    public function get_user_id($email)
    {
        $donorID = $this->db->select("UserID", "user","WHERE email =:email", ':email', $email);
        $ret_donorID = $donorID[0]['UserID'];
        return $ret_donorID;
    }

    public function ifregistered($user_ID, $campaign_ID)
    {
        $count=$this->db->select('count', "register_to_campaign", "WHERE DonorID =:DonorID", ':DonorID', $user_ID);
        if ( $count> 0) {
            for ($x = 0; $x <= $count-1; $x++) {
                if(($this->db->select('CampaignID', "register_to_campaign", "WHERE DonorID =:DonorID", ':DonorID', $user_ID))[$x][0]==$campaign_ID){
                    return true;
                }
            }
            return false;
            
        }
        else{
            return false;
        }
        
    }

    public function get_campreg_info($user_ID){
        $emcontno = ($this->db->select('Emergency_contact_no', "register_to_campaign", "WHERE DonorID =:DonorID", ':DonorID', $user_ID))[0];
        $contno = ($this->db->select('ContactNumber', "usercontactnumber", "WHERE UserID =:UserID", ':UserID', $user_ID))[0];
        $reg_data = array($emcontno[0], $contno[0]);
        // print_r($reg_data);
        // die();
        return $reg_data;
    }

    public function getcontno($user_id){
        $contno = ($this->db->select('ContactNumber','usercontactnumber',"WHERE UserID =:UserID", ':UserID', $user_id ))[0];
        return $contno;
    }

    public function putregistraion($inputs,$contno,$user_id)
    {
            $columns = array('DonorID', 'CampaignID','Emergency_contact_no');
            $param = array(':DonorID', ':CampaignID', ':Emergency_contact_no' );
            $result1 = $this->db->insert("register_to_campaign", $columns, $param, $inputs);
            $result2 = $this->db->update("usercontactnumber", 'ContactNumber', ':ContactNumber', $contno, ':user_id',$user_id,"WHERE UserID = :user_id");
            if ($result1 == "Success" && $result2 == "Success") {
                return true;
            } else
                print_r($result1);
                print_r($result2);
    }

    public function get_reg_info($campid,$user_ID){
        $reg_info=$this->db->select('*', "register_to_campaign", "WHERE DonorID =:DonorID", ':DonorID', $user_ID) > 0 && $this->db->select('count', "register_to_campaign", "WHERE CampaignID =:CampaignID", ':CampaignID', $campid);
        $ret_reg_info = $reg_info[0];
        return $ret_reg_info;
    }

}