<?php

use LDAP\Result;

class DonorprofileModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getdonorinfo($userid)
    {
        $data = $this->db->select(
            '*',
            'donor',
            'WHERE UserID = :UserID',
            ':UserID',
            $userid
        )[0];
        return $data;
    }

    public function getdonorcontact($userid)
    {
        $data = $this->db->select(
            '*',
            'usercontactnumber',
            'WHERE UserID = :UserID',
            ':UserID',
            $userid
        )[0];
        return $data;
    }

    public function updateuserp($user_input, $userid)
    {
        $columns = ['Password', 'Username','UserPic'];
        $param = [':Password', ':Username',':UserPic'];
        $result = $this->db->update(
            'user',
            $columns,
            $param,
            $user_input,
            ':UserID',
            $userid,
            'WHERE UserID =:UserID'
        );
        if ($result == 'Success') {
            return true;
        } else {
            print_r($result);
        }
    }
    public function updateuser($user_input, $userid)
    {
        $columns = ['Username','UserPic'];
        $param = [':Username',':UserPic'];
        $result = $this->db->update(
            'user',
            $columns,
            $param,
            $user_input,
            ':UserID',
            $userid,
            'WHERE UserID =:UserID'
        );
        if ($result == 'Success') {
            return true;
        } else {
            print_r($result);
        }
    }

    public function updatedonor($userid, $user_input)
    {
        $columns = [
            'Fullname',
            'NIC',
            'DOB',
            'Number',
            'LaneName',
            'City',
            'District',
            'Province',
        ];
        $param = [
            ':Fullname',
            ':NIC',
            ':DOB',
            ':Number',
            ':LaneName',
            ':City',
            ':District',
            ':Province',
        ];
        $result = $this->db->update(
            'donor',
            $columns,
            $param,
            $user_input,
            ':UserID',
            $userid,
            'WHERE UserID =:UserID'
        );
        if ($result == 'Success') {
            return true;
        } else {
            print_r($result);
        }
    }

    public function updateusercontact($userid, $contno)
    {
        $result = $this->db->update(
            'usercontactnumber ',
            'ContactNumber',
            ':ContactNumber',
            $contno,
            ':UserID',
            $userid,
            'WHERE UserID =:UserID'
        );
        if ($result == 'Success') {
            return true;
        } else {
            print_r($result);
        }
    }

     public function check_password($userid,$password)
    {
        $result=($this->db->select('Password','User','WHERE UserID = :UserID',':UserID',$userid));
        if(password_verify($password,$result[0]['Password'])){
            return true;
        }
        else{
            return false;
        }
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

    public function delete_profile($userid){
        $result = $this->db->update('user','Deactivation',':Deactivation','1',':UserID',$userid,'WHERE UserID =:UserID');
        if($result=='Success'){
            return true;
        }
        else{
            return false;
        } 
    }
}