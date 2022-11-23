<?php

class ForgetPasswordModel extends Model
{
    function __construct()
    {
        parent::__construct();
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

    public function getUserId($email)
    {
        if ($this->db->select('UserID', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $user_ID = $this->db->select("UserID","user","WHERE email =:email",':email',$email);
            $user_ID = $user_ID[0]['user_ID'];
            return $user_ID;

        
        } 

    }
    public function insertToken($email)
    {
        if ($this->db->select('UserID', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $user_ID = $this->db->select("UserID","user","WHERE email =:email",':email',$email);
            $user_ID = $user_ID[0]['user_ID'];
            return $user_ID;

        
        } 

    }

    public function updatePassword($email, $pwd)
    {

        $columns = array('Name', 'Storing_temperature', 'Expiry_constraint');
        $param = array(':Name', ':Storing_temperature', ':Expiry_constraint');
        $result = $this->db->update("user", $password, $param, $inputs, ':type_id', $type_id, "WHERE TypeID = :type_id;");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

}
