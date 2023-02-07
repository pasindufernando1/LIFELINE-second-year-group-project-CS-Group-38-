<?php

class ProfileModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }



public function getUserContactNo($email)
    {
        
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $user_details = $this->db->select("UserID","user","WHERE email =:email",':email',$email);
            
            $user_contact = $this ->db->select("ContactNumber","usercontactnumber", "WHERE userid = :userid", ':userid', $user_details[0]['UserID']);
            return ($user_contact[0][0]);
        } 

    }

}