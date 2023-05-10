<?php

class AdprofileModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    // Function to get the contact number based on the email
    public function getUserContactNo($email)
    { 
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $user_details = $this->db->select("UserID","user","WHERE email =:email",':email',$email);    
            $user_contact = $this ->db->select("ContactNumber","usercontactnumber", "WHERE userid = :userid", ':userid', $user_details[0]['UserID']);
            return ($user_contact[0][0]);
        } 

    }

    // Function to get the UserId based on the email
    public function getUserId($email)
    { 
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $user_details = $this->db->select("UserID","user","WHERE email =:email",':email',$email);    
            return ($user_details[0]['UserID']);
        } 

    }

    // Update the user details
    public function editAdmin($userid,$inputs1, $inputs2)
    {    
        // Update the user table
        $columns1 = array('Email', 'Password', 'Username','Userpic');
        $param1 = array(':Email', ':Password', ':Username',':Userpic');
        $result1 = $this->db->update('user', $columns1, $param1, $inputs1, ':UserID', $userid, "WHERE UserID = :UserID");

        // Update the usercontactnumber table
        $columns2 = array('ContactNumber');
        $param2 = array(':ContactNumber');
        $result2 = $this->db->update('usercontactnumber', $columns2, $param2, $inputs2, ':UserID', $userid, "WHERE UserID = :UserID");

        if ($result1 && $result2) {
            return true;
        } else {
            return false;
        }

    }

    // Function to get the Username based on the UserID
    public function getUserName($userid)
    {
        if ($this->db->select('count', "user", "WHERE UserID = :UserID;", ':UserID', $userid) > 0) {
            $user_name = $this->db->select("Username","user","WHERE UserID =:UserID",':UserID',$userid);
            $name_user = $user_name[0]['Username'];
            return $name_user;
        } 
    } 

    // Function to get the userimage based on the userid
    public function getuserimg($userid)
    {
        if ($this->db->select('count', "user", "WHERE UserID = :UserID;", ':UserID', $userid) > 0) {
            $type = $this->db->select("Userpic","user","WHERE UserID =:UserID",':UserID',$userid);
            $user_pic = $type[0]['Userpic'];
            return $user_pic;
        } 
    }

    
}