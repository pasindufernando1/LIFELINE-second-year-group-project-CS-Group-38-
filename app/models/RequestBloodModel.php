<?php

class RequestBloodModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    /* public function getUserID($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $ID = $this->db->select("userID","user","WHERE email =:email",':email',$email);
            $HospitalID = $ID[0]['userID'];
            return $HospitalID;
        } 
    } */

    public function getRequestID($email)
    {
        if ($this->db->select('count', "hospital_blood_requests", "WHERE email = :email;", ':email', $email) > 0) {
            $ID = $this->db->select("RequestID","hospital_blood_requests","WHERE email =:email",':email',$email);
            $RequestID = $ID[0]['RequestID'];
            return $RequestID;
        } 
    }

    public function addBloodRequest($inputs) 
    {
        $columns = array('BloodBankID','HospitalID','Blood_group', 'Blood_component', 'Quantity','Date_requested');
        $param = array(':BloodBankID',':HospitalID',':Blood_group' ,':Blood_component', ':Quantity',':Date_requested');
        $result = $this->db->insert("hospital_blood_requests", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else print_r($result);
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

    public function dltReq($RequestID)
    {

        //$_SESSION['RequestID'] = $RequestID;
        $result = $this->db->delete("hospital_blood_requests", "WHERE  RequestID = :RequestID ;", ':RequestID', $RequestID);
        if ($result == "Success") {
            return true;
        } else{
            print_r($result);
        } 
    
    }

    public function get_telno($User_ID)
    {
        $data1 = $this->db->select("*", "hospital_medicalcenter", "WHERE UserID = :User_ID",':User_ID',$User_ID);
        
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
        $result2 = $this->db->update("hospital_medicalcenter", $columns2, $param2, $inputs2,':User_ID',$User_ID,"WHERE UserID = :User_ID");
        
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

    
}  