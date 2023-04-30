<?php


class SignupModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    ////////////////////////////Donor/////////////////////////////

    public function ifinsystem($email)
    {
        if ($this->db->select('count', "user", "WHERE Email =:Email", ':Email', $email) > 0) { {
                return true;
            }
        }

    }

    public function get_user_id($email)
    {
        $donorID = $this->db->select("UserID", "user", "WHERE email =:email", ':email', $email);
        $ret_donorID = $donorID[0]['UserID'];
        return $ret_donorID;
    }

    public function insertuser($user_inputs)
    {
        $columns = array('Email', 'Password', 'Username', 'UserType', 'Userpic');
        $param = array(':Email', ':Password', ':Username', ':UserType', ':Userpic');
        $result = $this->db->insert("User", $columns, $param, $user_inputs);
        if ($result == "Success") {
            return true;
        } else {
            print_r($result);
        }
    }

    public function insertdonor($donor_inputs)
    {
        $columns = array('UserID', 'Fullname', 'NIC', 'DOB', 'Gender', 'BloodType', 'Number', 'LaneName', 'City', 'District', 'Province');
        $param = array(':UserID', ':Fullname', ':NIC', ':DOB', ':Gender', ':BloodType', ':Number', ':LaneName', ':City', ':District', ':Province');
        $result = $this->db->insert("donor", $columns, $param, $donor_inputs);
        if ($result == "Success") {
            return true;
        } else {
            print_r($result);
        }
    }

    public function insertcontact($user_ID, $tellno)
    {
        $columns = array('UserID', 'ContactNumber');
        $param = array(':UserID', ':ContactNumber');
        $inputs = array($user_ID, $tellno);
        $result = $this->db->insert("usercontactnumber", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else {
            print_r($result);
        }
    }

    ////////////////////////////Hospital/////////////////////////////

    public function signupHospital($inputs1, $inputs2, $inputs3)
    {

        //Updating the user table
        $columns1 = array('Email', 'Password', 'Username', 'Userpic', 'UserType');
        $param1 = array(':Email', ':Password', ':Username', ':Userpic', ':UserType');
        $result1 = $this->db->insert("user", $columns1, $param1, $inputs1);


        //Updating the hospital/medical center table
        //Get the UserID from the last inserted user from the user table
        $UserID = $this->db->lastInsertId();

        array_unshift($inputs2, $UserID);

        $columns2 = array('UserID', 'Registration_no', 'Name', 'Number', 'LaneName', 'City', 'District', 'Province', 'Status');
        $param2 = array(':UserID', ':Registration_no', ':Name', ':Number', ':LaneName', ':City', ':District', ':Province', ':Status');
        $result2 = $this->db->insert("hospital_medicalcenter", $columns2, $param2, $inputs2);

        //Updating the usercontactnumber table
        $columns3 = array('UserID', 'ContactNumber');
        $param3 = array(':UserID', ':ContactNumber');
        array_unshift($inputs3, $UserID);
        $result3 = $this->db->insert("usercontactnumber", $columns3, $param3, $inputs3);

        if ($result1 == "Success" && $result2 == "Success" && $result3 == "Success") {
            return true;
        } else {
            print_r($result1);
            print_r($result2);
            print_r($result3);
        }
    }


    ////////////////////////////Organization/////////////////////////////

    public function signupOrganization($inputs1, $inputs2, $inputs3)
    {

        //Updating the user table
        $columns1 = array('Email', 'Password', 'Username', 'Userpic', 'UserType');
        $param1 = array(':Email', ':Password', ':Username', ':Userpic', ':UserType');
        $result1 = $this->db->insert("user", $columns1, $param1, $inputs1);


        //Updating the hospital/medical center table
        //Get the UserID from the last inserted user from the user table
        $UserID = $this->db->lastInsertId();
        array_unshift($inputs2, $UserID);

        $columns2 = array('UserID', 'Registration_no', 'Name', 'Number', 'LaneName', 'City', 'District', 'Province');
        $param2 = array(':UserID', ':Registration_no', ':Name', ':Number', ':LaneName', ':City', ':District', ':Province');
        $result2 = $this->db->insert("organization_society", $columns2, $param2, $inputs2);

        //Updating the usercontactnumber table
        $columns3 = array('UserID', 'ContactNumber');
        $param3 = array(':UserID', ':ContactNumber');
        array_unshift($inputs3, $UserID);
        $result3 = $this->db->insert("usercontactnumber", $columns3, $param3, $inputs3);

        if ($result1 == "Success" && $result2 == "Success" && $result3 == "Success") {
            return true;
        } else {
            print_r($result1);
            print_r($result2);
            print_r($result3);
        }
    }




}