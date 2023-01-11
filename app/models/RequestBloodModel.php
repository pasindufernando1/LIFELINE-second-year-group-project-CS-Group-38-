<?php

class RequestBloodModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function getUserID($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $ID = $this->db->select("userID","user","WHERE email =:email",':email',$email);
            $HospitalID = $ID[0]['userID'];
            return $HospitalID;
        } 
    }
    public function addBloodRequest($inputs) 
    {
        $columns = array('BloodBankID','HospitalID','Blood_group', 'Blood_component', 'Quantity');
        $param = array(':BloodBankID',':HospitalID',':Blood_group' ,':Blood_component', ':Quantity');
        $result = $this->db->insert("hospital_blood_requests", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }
    public function getBloodBankID($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $ID = $this->db->select("userID","user","WHERE email =:email",':email',$email);
            $user_ID = $ID[0]['userID'];
            return $user_ID;
        
        } 
    }
    public function getAllBloodBanks()
    {
        $data = $this->db->select("*", "bloodbank",null);
        return $data;
    }

    public function getAllRequests($HospitalID)
    {
        $data = $this->db->select("*", "hospital_blood_requests", "WHERE HospitalID = :HospitalID", ":HospitalID", $HospitalID);
        // for($data as $value){
        //     // $data["BloodBankID"];
        //     print_r($data[][1]);
        //     die();
        // }
        return $data;
    }
    
}  