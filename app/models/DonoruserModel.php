<?php


class DonoruserModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function authenticate($email, $pwd)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $hashed = $this->db->select("password", "user", "WHERE email = :email ;", ':email', $email);

            if (password_verify($pwd, $hashed[0]['password'])) {
                return true;
            } else return false;
        
        } else return false;
    
    }

    public function getUserName($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $user_name = $this->db->select("username","user","WHERE email =:email",':email',$email);
            $name_user = $user_name[0]['username'];
            return $name_user;

        
        } 

    }

    public function gettype($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $type = $this->db->select("usertype","user","WHERE email =:email",':email',$email);
            $type_of_user = $type[0]['usertype'];
            return $type_of_user;
        
        } 
    }


        public function checkMail($email)
    {
        $res = ($this->db->select('userID', "user", "WHERE email = :email;", ':email', $email));
        if(!empty($res)){
            return true;
        }
        else{
            return false;
        }

    }

    public function updatePassword($email, $pwd)
    {
        $passw = password_hash($pwd, PASSWORD_DEFAULT);
        $result = $this->db->update("user", "password", ":password", $passw, ':email', $email, "WHERE email = :email");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    public function get_campaign_info($campaignid)
    {
        if ($this->db->select('count', "donation_campaign", "WHERE campaignid = :campaignid;", ':campaignid', $campaignid) > 0) {
            $data = $this->db->select("*","donation_campaign","WHERE campaignid =:campaignid",':campaignid',$campaignid);
            $campaign_data = $data[0]['*'];
            return $campaign_data;
        } 

    }
    

    
}