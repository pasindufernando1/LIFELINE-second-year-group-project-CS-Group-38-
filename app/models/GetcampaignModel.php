<?php


class GetcampaignModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    
    public function getAllCampaigns()
    {
        $data = $this->db->select("*", "donation_campaign",null);
        return $data;
    }

     public function get_campaign_info($campid)
    {
        $data = $this->db->select("*", "donation_campaign","WHERE CampaignID =:CampaignID", ':CampaignID', $campid);
        //$org_name = $this->db->select("Name", "organization/society", "INNER JOIN donation_campaign ON organization/society.UserID = donation_campaign.OrganizationUserID", "WHERE CampaignID =:CampaignID", ':CampaignID', $campid);
        $ret_data = $data[0];
        //$ret_org_name = $org_name[0];
        //array_push($ret_data, $ret_org_name);
        return $ret_data;
    }

    public function get_org_name($org_id){
        $org_name = $this->db->select("Name", "organization_society", "WHERE UserID=:UserID", ":UserID", $org_id);
        $ret_org_name = $org_name[0][0];
        return $ret_org_name;
    }

    public function get_user_id($email)
    {
        $donorID = $this->db->select("UserID", "user","WHERE email =:email", ':email', $email);
        $ret_donorID = $donorID[0]['UserID'];
        return $ret_donorID;
    }

    public function ifregistered($user_ID, $campaign_ID)
    {
        if ($this->db->select('count', "register_to_campaign", "WHERE DonorID =:DonorID", ':DonorID', $user_ID) > 0) {
            if(($this->db->select('CampaignID', "register_to_campaign", "WHERE DonorID =:DonorID", ':DonorID', $user_ID))[0][0]==$campaign_ID){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
        
    }

    public function get_campreg_info($user_ID){
        $reg_data = ($this->db->select('Emergency_contact_no,Contact_no', "register_to_campaign", "WHERE DonorID =:DonorID", ':DonorID', $user_ID))[0];
        
        return $reg_data;


    }

    public function putregistraion($inputs)
    {
            $columns = array('DonorID', 'CampaignID','Emergency_contact_no', 'Contact_no');
            $param = array(':DonorID', ':CampaignID', ':Emergency_contact_no', ':Contact_no' );
            $result = $this->db->insert("register_to_campaign", $columns, $param, $inputs);
            if ($result == "Success") {
                return true;
            } else
                print_r($result);
    }

    public function get_reg_info($campid,$user_ID){
        $reg_info=$this->db->select('*', "register_to_campaign", "WHERE DonorID =:DonorID", ':DonorID', $user_ID) > 0 && $this->db->select('count', "register_to_campaign", "WHERE CampaignID =:CampaignID", ':CampaignID', $campid);
        $ret_reg_info = $reg_info[0];
        return $ret_reg_info;
    }

}