<?php

class UserManageModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function addHospitalMedCenter($inputs1,$inputs2,$inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email','Password','Username','Userpic','UserType');
        $param1 = array(':Email',':Password',':Username',':Userpic',':UserType');
        $result1 = $this->db->insert("user", $columns1, $param1, $inputs1);


        //Updating the hospital/medical center table
        //Get the UserID from the last inserted user from the user table
        $UserID = $this->db->lastInsertId();
        array_unshift($inputs2, $UserID);

        $columns2 = array('UserID','Registration_no','Name','Number','LaneName','City','District','Province','Status');
        $param2 = array(':UserID',':Registration_no',':Name',':Number',':LaneName',':City',':District',':Province',':Status');
        $result2 = $this->db->insert("hospital_medicalcenter", $columns2, $param2, $inputs2);

        //Updating the usercontactnumber table
        $columns3 = array('UserID', 'ContactNumber');
        $param3 = array(':UserID', ':ContactNumber');
        array_unshift($inputs3, $UserID);
        $result3 = $this->db->insert("usercontactnumber", $columns3, $param3, $inputs3);
        
        if($result1=="Success" && $result2=="Success" && $result3=="Success"){
            return true;
        }
        else{
            print_r($result1);
            print_r($result2);
            print_r($result3);
        }
    }

    
    public function getAllUsers()
    {
        $data = $this->db->select("*", "user",null);
        return $data;
    }


    //Function to get the type of the user when user id is passed
    public function getUserType($user_id)
    {     
        $data = $this->db->select("UserType", "user", "WHERE UserID = :user_id",':user_id',$user_id);
        return $data[0]['UserType'];
    }

    //Function to get the details of the hospital/medical center when user id is passed
    public function getHosMedDetails($user_id)
    {
        $data1 = $this->db->select("*", "hospital_medicalcenter", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select Email,Username,Password from user table
        $data2 = $this->db->select("Email,Username,Password", "user", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select ContactNumber from usercontactnumber table
        $data3 = $this->db->select("ContactNumber", "usercontactnumber", "WHERE UserID = :user_id",':user_id',$user_id);
        $data = array_merge($data1,$data2,$data3);
        //Return data as a single array
        return $data;

    }

    public function editHospitalMedCenter($user_id,$inputs1,$inputs2,$inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email','Password','Username','Userpic','UserType');
        $param1 = array(':Email',':Password',':Username',':Userpic',':UserType');
        $result1 = $this->db->update("user", $columns1, $param1, $inputs1,':user_id',$user_id,"WHERE UserID = :user_id");


        // //Updating the hospital/medical center table
        // //Get the UserID from the last inserted user from the user table
        // $UserID = $this->db->lastInsertId();
        // array_unshift($inputs2, $UserID);

        $columns2 = array('Registration_no','Name','Number','LaneName','City','District','Province','Status');
        $param2 = array(':Registration_no',':Name',':Number',':LaneName',':City',':District',':Province',':Status');
        $result2 = $this->db->update("hospital_medicalcenter", $columns2, $param2, $inputs2,':user_id',$user_id,"WHERE UserID = :user_id");

        //Updating the usercontactnumber table
        $columns3 = array('ContactNumber');
        $param3 = array(':ContactNumber');
        // array_unshift($inputs3, $UserID);
        $result3 = $this->db->update("usercontactnumber", $columns3, $param3, $inputs3,':user_id',$user_id,"WHERE UserID = :user_id");
        
        if($result1=="Success" && $result2=="Success" && $result3=="Success"){
            return true;
        }
        else{
            print_r($result1);
            print_r($result2);
            print_r($result3);
        }
    }

    function deleteHosMedDetails($user_id)
    {
        $result = $this->db->delete("user", "WHERE  UserID = :user_id ;", ':user_id', $user_id);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    
    }




}