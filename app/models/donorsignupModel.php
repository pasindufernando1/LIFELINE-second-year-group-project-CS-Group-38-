<?php


class DonorsignupModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }




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

}