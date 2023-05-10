<?php

class DonorsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    // Get all the donor details
    public function getAllDonorDetails()
    {
        // Get all the donor details
        $data = $this->db->select("*", "donor","Null");
        return $data;
    }
    
    //Get the donors based on the NIC
    public function getFilteredDonorDetailsNIC($nic)
    {
        $columns = array(":NIC");
        $values = array($nic);
        $data = $this->db->select("*", "donor", "WHERE NIC = :NIC",$columns, $values);
        return $data;
    }

    // Get the donors based on the blood type
    public function getFilteredDonorDetails_BloodCategory($bloodtype)
    {
        $columns = array(":BloodType");
        $values = array($bloodtype);
        $data = $this->db->select("*", "donor", "WHERE BloodType = :BloodType",$columns, $values);
        return $data;
    }

    //Get the donor details based on  the district
    public function getFilteredDonorDetails_District($district)
    {
        $columns = array(":District");
        $values = array($district);
        $data = $this->db->select("*", "donor", "WHERE District = :District",$columns, $values);
        return $data;
    }

    // Get the donor details based on the district and blood type
    public function getFilteredDonorDetails_District_BloodCategory($district,$bloodtype)
    {
        $columns = array(":District",":BloodType");
        $values = array($district,$bloodtype);
        $data = $this->db->select("*", "donor", "WHERE District = :District AND BloodType = :BloodType",$columns, $values);
        return $data;
    }

    // Function to add donor
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

        $columns2 = array('UserID','Fullname','NIC','Gender','DOB','BloodType','Number','LaneName','City','District','Province','DonorCard_Img');
        $param2 = array(':UserID',':Fullname',':NIC',':Gender',':DOB',':BloodType',':Number',':LaneName',':City',':District',':Province',':DonorCard_Img');
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

    //Function to get the details of the donor when user id is passed
    public function getDonorDetails($user_id)
    {
        $data1 = $this->db->select("*", "donor", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select Email,Username,Password from user table
        $data2 = $this->db->select("Email,Username,Password", "user", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select ContactNumber from usercontactnumber table
        $data3 = $this->db->select("ContactNumber", "usercontactnumber", "WHERE UserID = :user_id",':user_id',$user_id);
        $data = array_merge($data1,$data2,$data3);
        //Return data as a single array
        return $data;

    }


    
}