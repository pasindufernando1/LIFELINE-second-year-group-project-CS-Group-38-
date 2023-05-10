<?php

class UserManageModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    // Function to add Hospital/Medical Center
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

    // Function to add Organization/Society
    public function addOrganizationsociety($inputs1,$inputs2,$inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email','Password','Username','Userpic','UserType');
        $param1 = array(':Email',':Password',':Username',':Userpic',':UserType');
        $result1 = $this->db->insert("user", $columns1, $param1, $inputs1);


        //Updating the hospital/medical center table
        //Get the UserID from the last inserted user from the user table
        $UserID = $this->db->lastInsertId();
        array_unshift($inputs2, $UserID);

        $columns2 = array('UserID','Registration_no','Name','Number','LaneName','City','District','Province');
        $param2 = array(':UserID',':Registration_no',':Name',':Number',':LaneName',':City',':District',':Province');
        $result2 = $this->db->insert("organization_society", $columns2, $param2, $inputs2);

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

    // Function to add Donor
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

    // Function to add System User
    public function addSystemUser($inputs1,$inputs2,$inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email','Password','Username','Userpic','UserType');
        $param1 = array(':Email',':Password',':Username',':Userpic',':UserType');
        $result1 = $this->db->insert("user", $columns1, $param1, $inputs1);


        //Updating the hospital/medical center table
        //Get the UserID from the last inserted user from the user table
        $UserID = $this->db->lastInsertId();
        array_unshift($inputs2, $UserID);

        $columns2 = array('UserID','Fullname','NIC','BloodBankID');
        $param2 = array(':UserID',':Fullname',':NIC',':BloodBankID');
        $result2 = $this->db->insert("system_user", $columns2, $param2, $inputs2);

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

    // Function to add Admin
    public function addAdmin($inputs1, $inputs2, $inputs3)
    {
        //Updating the user table
        $columns1 = array('Email','Password','Username','Userpic','UserType');
        $param1 = array(':Email',':Password',':Username',':Userpic',':UserType');
        $result1 = $this->db->insert("user", $columns1, $param1, $inputs1);

        // Updating the admin table
        //Get the UserID from the last inserted user from the user table
        $UserID = $this->db->lastInsertId();
        array_unshift($inputs2, $UserID);

        $columns2 = array('UserID','Fullname');
        $param2 = array(':UserID',':Fullname');
        $result2 = $this->db->insert("admin", $columns2, $param2, $inputs2);

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

    //Function to get all the users 
    public function getAllUsers()
    {
        $data = $this->db->select("*", "user", "WHERE Deactivation = 0");
        return $data;
    }

    //Function to get all the users filtered by usertype
    public function getFilteredUsers($usertype){
        $data = $this->db->select("*", "user", "WHERE UserType = :usertype AND Deactivation = 0",':usertype',$usertype);
        return $data;
    }

    //Function to get all the deactivated users
    public function getDeactivatedUsers(){
        $data = $this->db->select("*", "user", "WHERE Deactivation = 1");
        return $data;
    }

    //Function to get all the deactivated users filtered by usertype
    public function getFilteredDeactivatedUsers($usertype){
        $data = $this->db->select("*", "user", "WHERE UserType = :usertype AND Deactivation = 1",':usertype',$usertype);
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
        $data2 = $this->db->select("Email,Username,Password,Userpic", "user", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select ContactNumber from usercontactnumber table
        $data3 = $this->db->select("ContactNumber", "usercontactnumber", "WHERE UserID = :user_id",':user_id',$user_id);
        $data = array_merge($data1,$data2,$data3);
        //Return data as a single array
        return $data;

    }

    //Function to get the details of the organization/society when user id is passed
    public function getOrgSocDetails($user_id)
    {
        $data1 = $this->db->select("*", "organization_society", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select Email,Username,Password from user table
        $data2 = $this->db->select("Email,Username,Password,Userpic", "user", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select ContactNumber from usercontactnumber table
        $data3 = $this->db->select("ContactNumber", "usercontactnumber", "WHERE UserID = :user_id",':user_id',$user_id);
        $data = array_merge($data1,$data2,$data3);
        //Return data as a single array
        return $data;

    }


    //Function to get the details of the donor when user id is passed
    public function getDonorDetails($user_id)
    {
        $data1 = $this->db->select("*", "donor", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select Email,Username,Password from user table
        $data2 = $this->db->select("Email,Username,Password,Userpic", "user", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select ContactNumber from usercontactnumber table
        $data3 = $this->db->select("ContactNumber", "usercontactnumber", "WHERE UserID = :user_id",':user_id',$user_id);
        $data = array_merge($data1,$data2,$data3);
        //Return data as a single array
        return $data;

    }

    //Function to get the details of the system user when user id is passed
    public function getSystemUserDetails($user_id)
    {
        $data1 = $this->db->select("*", "system_user", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select Email,Username,Password from user table
        $data2 = $this->db->select("Email,Username,Password,Userpic", "user", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select ContactNumber from usercontactnumber table
        $data3 = $this->db->select("ContactNumber", "usercontactnumber", "WHERE UserID = :user_id",':user_id',$user_id);
        $data = array_merge($data1,$data2,$data3);
        // Get the bloodbankname from bloodbank table
        $_SESSION['BloodBankName'] = $this->db->select("BloodBank_Name", "bloodbank", "WHERE BloodBankID = :bloodbankid",':bloodbankid',$data[0]['BloodBankID']);
        //Return data as a single array
        return $data;

    }

    //Function to get the details of the admin when user id is passed
    public function getAdminDetails($user_id)
    {
        $data1 = $this->db->select("*", "admin", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select Email,Username,Password from user table
        $data2 = $this->db->select("Email,Username,Password,Userpic", "user", "WHERE UserID = :user_id",':user_id',$user_id);
        //Select ContactNumber from usercontactnumber table
        $data3 = $this->db->select("ContactNumber", "usercontactnumber", "WHERE UserID = :user_id",':user_id',$user_id);
        $data = array_merge($data1,$data2,$data3);
        //Return data as a single array
        return $data;

    }

    // Function to edit Hospital/Medical Center
    public function editHospitalMedCenter($user_id,$inputs1,$inputs2,$inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email','Password','Username','UserType');
        $param1 = array(':Email',':Password',':Username',':UserType');
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

    // Function to edit organization/society
    public function editOrganizationSociety($user_id,$inputs1,$inputs2,$inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email','Password','Username','UserType');
        $param1 = array(':Email',':Password',':Username',':UserType');
        $result1 = $this->db->update("user", $columns1, $param1, $inputs1,':user_id',$user_id,"WHERE UserID = :user_id");


        // //Updating the hospital/medical center table
        $columns2 = array('Registration_no','Name','Number','LaneName','City','District','Province');
        $param2 = array(':Registration_no',':Name',':Number',':LaneName',':City',':District',':Province');
        $result2 = $this->db->update("organization_society", $columns2, $param2, $inputs2,':user_id',$user_id,"WHERE UserID = :user_id");

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

    // Function to edit donor
    public function editDonor($user_id,$inputs1,$inputs2,$inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email','Password','Username','UserType');
        $param1 = array(':Email',':Password',':Username',':UserType');
        $result1 = $this->db->update("user", $columns1, $param1, $inputs1,':user_id',$user_id,"WHERE UserID = :user_id");


        // //Updating the hospital/medical center table
        $columns2 = array('Fullname','NIC','Gender','DOB','BloodType', 'Number', 'LaneName', 'City', 'District', 'Province','DonorCard_Img');
        $param2 = array(':Fullname', ':NIC',':Gender',':DOB',':BloodType', ':Number', ':LaneName', ':City', ':District', ':Province',':DonorCard_Img');
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


    // Function to edit system user
    public function editSystemUser($user_id,$inputs1,$inputs2,$inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email','Password','Username','UserType');
        $param1 = array(':Email',':Password',':Username',':UserType');
        $result1 = $this->db->update("user", $columns1, $param1, $inputs1,':user_id',$user_id,"WHERE UserID = :user_id");


        // //Updating the hospital/medical center table
        $columns2 = array('Fullname','NIC','BloodBankID');
        $param2 = array(':Fullname',':NIC',':BloodBankID');
        $result2 = $this->db->update("system_user", $columns2, $param2, $inputs2,':user_id',$user_id,"WHERE UserID = :user_id");

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

    // Function to edit admin
    public function editAdmin($user_id,$inputs1,$inputs2,$inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email','Password','Username','UserType');
        $param1 = array(':Email',':Password',':Username',':UserType');
        $result1 = $this->db->update("user", $columns1, $param1, $inputs1,':user_id',$user_id,"WHERE UserID = :user_id");
        
        //Updating Admin table
        $columns2 = array("Fullname");
        $param2 = array(":Fullname");
        $result2 = $this->db->update("admin", $columns2, $param2, $inputs2,':user_id',$user_id,"WHERE UserID = :user_id");

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

    // Function to deactivate the hospital/medical center
    function deleteHosMedDetails($user_id)
    {
        //Set the deactivation status of the user to 1 (Deactivated)
        $result1 = $this->db->update("user", "Deactivation", ":Deactivation", "1", ":user_id", $user_id, "WHERE UserID = :user_id");
        if ($result1 == "Success") {
            return true;
        } else 
        {   
            print_r($result1);
        }
    }

    // Function to deactivate the organization/society
    function deleteOrgSocDetails($user_id)
    {
        //Set the deactivation status of the user to 1 (Deactivated)
        $result1 = $this->db->update("user", "Deactivation", ":Deactivation", "1", ":user_id", $user_id, "WHERE UserID = :user_id");
        if ($result1 == "Success") {
            return true;
        } else 
        {   
            print_r($result1);
        }
    }

    // Function to deactivate the system user
    function deleteSysUserDetails($user_id)
    {
        //Set the deactivation status of the user to 1 (Deactivated)
        $result1 = $this->db->update("user", "Deactivation", ":Deactivation", "1", ":user_id", $user_id, "WHERE UserID = :user_id");
        if ($result1 == "Success") {
            return true;
        } else 
        {   
            print_r($result1);
        }
    }

    // Function to deactivate the admin
    function deleteDonorDetails($user_id)
    {
        //Set the deactivation status of the user to 1 (Deactivated)
        $result1 = $this->db->update("user", "Deactivation", ":Deactivation", "1", ":user_id", $user_id, "WHERE UserID = :user_id");
        if ($result1 == "Success") {
            return true;
        } else 
        {   
            print_r($result1);
        }
    }

    // Function to deactivate the admin
    function deleteAdminDetails($user_id)
    {
        //Set the deactivation status of the user to 1 (Deactivated)
        $result1 = $this->db->update("user", "Deactivation", ":Deactivation", "1", ":user_id", $user_id, "WHERE UserID = :user_id");
        if ($result1 == "Success") {
            return true;
        } else 
        {   
            print_r($result1);
        }
    }

    // Function to reactivate user
    public function reactivateUser($user_id)
    {
        //Set the deactivation status of the user to 0 (Activated)
        $result1 = $this->db->update("user", "Deactivation", ":Deactivation", "0", ":user_id", $user_id, "WHERE UserID = :user_id");
        if ($result1 == "Success") {
            return true;
        } else 
        {   
            print_r($result1);
        }
    }

    // Function to get the blood bank id and blood bank name from table blood bank
    public function getBloodBankName()
    {
        $data = $this->db->select("BloodBankID,BloodBank_Name", "bloodbank",null);
        return $data;
    }

    // Function to get blood bank details
    public function getBloodBanks(){
        // Get all blood bank details
        $data = $this->db->select("BloodBankID,BloodBank_Name,District,Province,Email", "bloodbank",null);
        // For each BloodBankID get the contact number
        foreach ($data as $key => $value) {
            $BloodBankID = $value['BloodBankID'];
            $data[$key]['ContactNumber'] = $this->db->select("ContactNumber", "bloodbankcontactnumber", "WHERE BloodBankID = :BloodBankID",':BloodBankID',$BloodBankID);
        }
        return $data;
    }

    // Function to get blood bank details filtered by province
    public function getFilteredBanks($Province){
        // Get all blood bank details
        $data = $this->db->select("BloodBankID,BloodBank_Name,District,Province,Email", "bloodbank","WHERE Province = :Province",':Province',$Province);
        // For each BloodBankID get the contact number
        foreach ($data as $key => $value) {
            $BloodBankID = $value['BloodBankID'];
            $data[$key]['ContactNumber'] = $this->db->select("ContactNumber", "bloodbankcontactnumber", "WHERE BloodBankID = :BloodBankID",':BloodBankID',$BloodBankID);
        }
        return $data;
    }

    // Function to add blood bank details
    public function addBloodBank($inputs1, $inputs2){
        
        //Inserting the blood bank details to the bloodbank table
        $columns1 = array('BloodBank_Name','Number','LaneName','City','District','Province','Email','BloodBank_pic');
        $param1 = array(':BloodBank_Name',':Number',':LaneName',':City',':District',':Province',':Email',':BloodBank_pic');
        $result1 = $this->db->insert("bloodbank", $columns1, $param1, $inputs1);

        //Get the BloodBankID from the last inserted blood bank from the bloodbank table
        $BloodBankID = $this->db->lastInsertId();

        // Prepend the BloodBankID to the inputs2 array
        array_unshift($inputs2, $BloodBankID);

        //Inserting the blood bank contact numbers to the bloodbankcontactnumber table
        $columns2 = array('BloodBankID','ContactNumber');
        $param2 = array(':BloodBankID',':ContactNumber');
        $result2 = $this->db->insert("bloodbankcontactnumber", $columns2, $param2, $inputs2,':BloodBankID',$BloodBankID);

        if($result1=="Success" && $result2=="Success"){
            return true;
        }
        else{
            print_r($result1);
            print_r($result2);
        }
    }



}