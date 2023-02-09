<?php

class DonoruserModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function authenticate($email, $pwd)
    {
        if (
            $this->db->select(
                'count',
                'user',
                'WHERE email = :email;',
                ':email',
                $email
            ) > 0
        ) {
            $hashed = $this->db->select(
                'password',
                'user',
                'WHERE email = :email ;',
                ':email',
                $email
            );

            if (password_verify($pwd, $hashed[0]['password'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getUserName($email)
    {
        if (
            $this->db->select(
                'count',
                'user',
                'WHERE email = :email;',
                ':email',
                $email
            ) > 0
        ) {
            $user_name = $this->db->select(
                'username',
                'user',
                'WHERE email =:email',
                ':email',
                $email
            );
            $name_user = $user_name[0]['username'];
            return $name_user;
        }
    }

    public function gettype($email)
    {
        if (
            $this->db->select(
                'count',
                'user',
                'WHERE email = :email;',
                ':email',
                $email
            ) > 0
        ) {
            $type = $this->db->select(
                'usertype',
                'user',
                'WHERE email =:email',
                ':email',
                $email
            );
            $type_of_user = $type[0]['usertype'];
            return $type_of_user;
        }
    }

    public function get_user_id($email)
    {
        $donorID = $this->db->select(
            'UserID',
            'user',
            'WHERE email =:email',
            ':email',
            $email
        );
        $ret_donorID = $donorID[0]['UserID'];
        return $ret_donorID;
    }

    public function checkMail($email)
    {
        $res = $this->db->select(
            'userID',
            'user',
            'WHERE email = :email;',
            ':email',
            $email
        );
        if (!empty($res)) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($email, $pwd)
    {
        $passw = password_hash($pwd, PASSWORD_DEFAULT);
        $result = $this->db->update(
            'user',
            'password',
            ':password',
            $passw,
            ':email',
            $email,
            'WHERE email = :email'
        );
        if ($result == 'Success') {
            return true;
        } else {
            print_r($result);
        }
    }

    // public function get_campaign_info($campaignid)
    // {
    //     if (
    //         $this->db->select(
    //             'count',
    //             'donation_campaign',
    //             'WHERE campaignid = :campaignid;',
    //             ':campaignid',
    //             $campaignid
    //         ) > 0
    //     ) {
    //         $data = $this->db->select(
    //             '*',
    //             'donation_campaign',
    //             'WHERE campaignid =:campaignid',
    //             ':campaignid',
    //             $campaignid
    //         );
    //         $campaign_data = $data[0]['*'];
    //         return $campaign_data;
    //     }
    // }
    public function getAllCampaigns($today)
    {
        $data = $this->db->select(
            '*',
            'donation_campaign',
            'WHERE Date > :Date AND Status = 1 ORDER BY Date ASC',
            ':Date',
            $today
        );
        return $data;
    }

    public function get_campaign_info($campid)
    {
        $data = $this->db->select(
            '*',
            'donation_campaign',
            'WHERE CampaignID =:CampaignID',
            ':CampaignID',
            $campid
        );
        $ret_data = $data[0];
        return $ret_data;
    }

    public function get_org_name($org_id)
    {
        $org_name = $this->db->select(
            'Name',
            'organization_society',
            'WHERE UserID=:UserID',
            ':UserID',
            $org_id
        );
        $ret_org_name = $org_name[0][0];
        return $ret_org_name;
    }
}
