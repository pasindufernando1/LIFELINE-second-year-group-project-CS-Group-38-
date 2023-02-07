<?php

class sys_donorsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }



    public function addDonor($inputs1,$inputs2,$inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email','Password','Username','Userpic','UserType');
        $param1 = array(':Email',':Password',':Username',':Userpic',':UserType');
        $result1 = $this->db->insert("user", $columns1, $param1, $inputs1);


        //Updating the hospital/medical center table
        //Get the UserID from the last inserted user from the user table
        $UserID = $this->db->lastInsertId();
        array_unshift($inputs2, $UserID);

        $columns2 = array('UserID','Fullname','NIC','DOB','BloodType','Number','LaneName','City','District','Province','DonorCard_Img');
        $param2 = array(':UserID',':Fullname',':NIC',':DOB',':BloodType',':Number',':LaneName',':City',':District',':Province',':DonorCard_Img');
        $result2 = $this->db->insert("donor", $columns2, $param2, $inputs2);

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
        $data = $this->db->select("*", "user", "WHERE UserType != 'Admin'");
        return $data;
    }


    //Function to get the type of the user when user id is passed
    public function getUserType($user_id)
    {     
        $data = $this->db->select("UserType", "user", "WHERE UserID = :user_id",':user_id',$user_id);
        return $data[0]['UserType'];
    }

    //Function to get the details of the hospital/medical center when user id is passed
    
    public function editDonor($user_id,$inputs1,$inputs2,$inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email','Password','Username','Userpic','UserType');
        $param1 = array(':Email',':Password',':Username',':Userpic',':UserType');
        $result1 = $this->db->update("user", $columns1, $param1, $inputs1,':user_id',$user_id,"WHERE UserID = :user_id");


        // //Updating the hospital/medical center table
        // //Get the UserID from the last inserted user from the user table
        // $UserID = $this->db->lastInsertId();
        // array_unshift($inputs2, $UserID);

        $columns2 = array('Fullname', 'NIC','DOB','BloodType', 'Number', 'LaneName', 'City', 'District', 'Province','DonorCard_Img');
        $param2 = array(':Fullname', ':NIC',':DOB',':BloodType', ':Number', ':LaneName', ':City', ':District', ':Province',':DonorCard_Img');
        $result2 = $this->db->update("donor", $columns2, $param2, $inputs2,':user_id',$user_id,"WHERE UserID = :user_id");

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


    

    function deleteDonorrDetails($user_id)
    {
        //Set foreign key checks to 0
        $this->db->query("SET FOREIGN_KEY_CHECKS=0");
        $result1 = $this->db->delete("user", "WHERE  UserID = :user_id ;", ':user_id', $user_id);
        $result2 = $this->db->delete("donor", "WHERE  UserID = :user_id ;", ':user_id', $user_id);
        $result3 = $this->db->delete("usercontactnumber", "WHERE  UserID = :user_id ;", ':user_id', $user_id);
        $this->db->query("SET FOREIGN_KEY_CHECKS=1");
        if ($result1 == "Success" && $result2 == "Success" && $result3 == "Success") {
            return true;
        } else 
        {   
            print_r($result1);
            print_r($result2);
            print_r($result3);
            
        }
    }

    // Function to get the blood bank id and blood bank name from table blood bank
    public function getBloodBankName()
    {
        $data = $this->db->select("BloodBankID,BloodBank_Name", "bloodbank",null);
        return $data;
    }




}