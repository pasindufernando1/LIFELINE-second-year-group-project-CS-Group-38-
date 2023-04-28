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
        $columns = ['Email', 'Password', 'Username'];
        $param = [':Email', ':Password', ':Username'];
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
        $columns = ['Email', 'Username'];
        $param = [':Email', ':Username'];
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
}
