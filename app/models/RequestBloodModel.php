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

    public function getRequestID($uname)
    {
        if ($this->db->select('count', "hospital_blood_requests", "WHERE email = :email;", ':email', $uname) > 0) {
            $ID = $this->db->select("RequestID","hospital_blood_requests","WHERE email =:email",':email',$uname);
            $RequestID = $ID[0]['RequestID'];
            return $RequestID;
        } 
    }

    public function addBloodRequest($inputs) 
    {
        $columns = array('BloodBankID','HospitalID','Blood_group', 'Blood_component', 'Quantity','Date_requested', 'Date_accepted');
        $param = array(':BloodBankID',':HospitalID',':Blood_group' ,':Blood_component', ':Quantity',':Date_requested', ':Date_accepted');
        $result = $this->db->insert("hospital_blood_requests", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }
    
    

    public function getAllBloodBanks($district)
    {
        //print_r($province);die();
        
        
        $data = $this->db->select("*", "bloodbank","WHERE District =:District ", ':District', $district);
        //print_r($data);die();
        return $data;

    }

    





    public function getBloodBankName($BloodBankID)
    {
        $data = $this->db->select("BloodBankID,BloodBank_Name", "bloodbank","WHERE BloodBankID =:BloodBankID", ':BloodBankID', $BloodBankID);
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
        //print_r($data);die();
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
        $data2 = $this->db->select("Email,Username,UserType,Password,Userpic", "user", "WHERE UserID = :UserID",':UserID',$User_ID);
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
        /* $columns1 = array( 'Password','Username','UserPic');
        $param1 = array(':Password',':Username',':UserPic');
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
        } */

        //Updating the user table
        $columns1 = array('Password', 'Username', 'Userpic');
        $param1 = array(':Password', ':Username', ':Userpic');
        $result1 = $this->db->update("user", $columns1, $param1, $inputs1, ':User_ID', $User_ID, "WHERE UserID = :User_ID");


        // //Updating the hospital/medical center table
        // //Get the UserID from the last inserted user from the user table
        // $UserID = $this->db->lastInsertId();
        // array_unshift($inputs2, $UserID);

        $columns2 = array('Name', 'Number', 'LaneName', 'City', 'District', 'Province');
        $param2 = array(':Name', ':Number', ':LaneName', ':City', ':District', ':Province');
        $result2 = $this->db->update("hospital_medicalcenter", $columns2, $param2, $inputs2, ':User_ID', $User_ID, "WHERE UserID = :User_ID");

        //Updating the usercontactnumber table
        $columns3 = array('ContactNumber');
        $param3 = array(':ContactNumber');

        // array_unshift($inputs3, $UserID);
        $result3 = $this->db->update("usercontactnumber", $columns3, $param3, $inputs3, ':User_ID', $User_ID, "WHERE UserID = :User_ID");

        if ($result1 == "Success" && $result2 == "Success" && $result3 == "Success") {
            return true;
        } else {
            print_r($result1);
            print_r($result2);
            print_r($result3);
        }
    }

    public function getuserimg($userid)
    {
        if ($this->db->select('count', "user", "WHERE UserID = :UserID;", ':UserID', $userid) > 0) {
            $type = $this->db->select("Userpic","user","WHERE UserID =:UserID",':UserID',$userid);
            $user_pic = $type[0]['Userpic'];
            //print_r($user_pic);die();
            return $user_pic;
        } 
    }

    public function check_password($userid,$password)
    {
        $result=($this->db->select('Password','User','WHERE UserID = :UserID',':UserID',$userid));
        //print_r($result);die();
        if(password_verify($password,$result[0]['Password'])){
            //print_r($result);die();
            return true;
        }
        else{
            return false;
        }
        // return $result;
    }

    public function update_email($userid,$email){
        $result=$this->db->update('user','Email',':Email',$email,':UserID',$userid,'WHERE UserID =:UserID');
        if($result=='Success'){
            return true;
        }
        else{
            return false;
        }
    }

    

    public function filter_out($blood_group)
    {
        // Get all the type Ids for a given type name
        $data = $this->db->select("RequestID", "hospital_blood_requests", "WHERE Blood_group = :Blood_group", "Blood_group", $blood_group);

        // Get the type ids from the array
        $request_ids = array_column($data, 'RequestID');
        
        // For each type id get the reserve details as a single array
        $output = array();
        foreach ($request_ids as $key => $value) {
            $rows = $this->getRequestDetails($value);
            $output = array_merge($output,$rows);
        }
       //print_r($output);die();
        return $output;
    }

    public function filter_out_subtypes($type_name,$subtype)
    {
        $columns = array(":Blood_group",":Blood_component");
        $values = array($type_name,$subtype);

        // Get all the type Ids for a given type name
        $data = $this->db->select("RequestID", "hospital_blood_requests", "WHERE Blood_group = :Blood_group AND Blood_component= :Blood_component", $columns, $values);
        
        // Get the type ids from the array
        $request_ids = array_column($data, 'RequestID');
        
        // For each type id get the reserve details as a single array
        $output = array();
        foreach ($request_ids as $key => $value) {
            $rows = $this->getRequestDetails($value);
            $output = array_merge($output,$rows);
        }
        //print_r($output);die();
        return $output;
    }

    public function getRequestDetails($ReqId)
    {
        // Get all the reserve details for a given type id
        $data = $this->db->select("*", "hospital_blood_requests", "WHERE RequestID = :RequestID", "RequestID", $ReqId);
        
        //print_r($data[0]['BloodBankID']);die();
        //$bloodbankID=$data[0]['BloodBankID'];
        //print_r($bloodbankID);die();
        //print_r($this->getBloodBankName($bloodbankID));die();
        //For each bloodbankid take the bloodbank name and add it to the array
        
        //print_r($bloodbankDet);die();
        foreach ($data as $key => $value) {
            //print_r($value['BloodBankID']);
            $data[$key]['BloodBank_Name'] = $this->getBankName($value['BloodBankID'])['BloodBank_Name'];
            if($value['Status']==0){
                $data[$key]['Status']="Pending";
            }
            else {
                $data[$key]['Status']="Accepted";
            }
            
            
        }
        
        // For each TypeID take the Type name and add it to the array
        /* foreach ($data as $key => $value) {
            $data[$key]['Blood_group'] = $this->getTypeName($value['RequestID']);
            $data[$key]['Blood_component'] = $this->getSubtypeName($value['RequestID']);
        } */
        //print_r($data);die();
        return $data;
    }

    public function getBankName($bank_id)
    {
        $data = $this->db->select("BloodBank_Name", "bloodbank", "WHERE BloodBankID = :BloodBankID", "BloodBankID", $bank_id);
        // return as an array
        //print_r($data);die();
        return $data[0];

    }

    // Get the blood type name for a given blood type id
    /* public function getTypeName($type_id)
    {
        $data = $this->db->select("Blood_group", "hospital_blood_requests", "WHERE RequestID = :RequestID", "RequestID", $type_id);
        return $data[0]['Blood_group'];
    }

    // Get the blood subtype name for a given blood type id
    public function getSubtypeName($type_id)
    {
        $data = $this->db->select("Blood_component", "hospital_blood_requests", "WHERE RequestID = :RequestID", "RequestID", $type_id);
        return $data[0]['Blood_component'];
    }
 */


    
}  