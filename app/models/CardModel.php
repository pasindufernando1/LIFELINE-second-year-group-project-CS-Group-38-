<?php

use LDAP\Result;

class CardModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function campregistraions($userid)
    {
        $data = $this->db->select(
            'CampaignID',
            'register_to_campaign',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $userid
        );
        $registered_campaign_data = [];
        for ($x = 0; $x < count($data); $x++) {
            $campaign_data = $this->db->select(
                '*',
                'donation_campaign',
                'WHERE CampaignID =:CampaignID',
                ':CampaignID',
                $data[$x][0]
            );
            array_push($registered_campaign_data, $campaign_data);
        }
        return $registered_campaign_data;
    }

    public function getAllCampaigns($today)
    {
        $data = $this->db->select(
            '*',
            'donation_campaign',
            'WHERE Date > :Date AND Status = 1',
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

    public function iftimeokay($user_ID, $camp_ID)
    {
        $camp_date = $this->db->select(
            'Date',
            'donation_campaign',
            'WHERE CampaignID =:CampaignID',
            ':CampaignID',
            $camp_ID
        )[0]['Date'];
        // $camp_date = $camp_date['Date'];
        // print_r(gettype($camp_date));
        $params = [':DonorID', ':Date'];
        $columns = [$user_ID, $camp_date];
        if (
            $this->db->select(
                'count',
                'donor_bloodbank_bloodpacket',
                'WHERE DonorID =:DonorID AND DATEDIFF(Date,:Date) < -56',
                $params,
                $columns
            ) > 0 ||
            ($this->db->select(
                'count',
                //donation campaign inner join date
                'donation_campaign',
                'INNER JOIN register_to_campaign on donation_campaign.CampaignID = register_to_campaign.CampaignID WHERE DonorID =:DonorID AND DATEDIFF(Date,:Date) > 56',
                $params,
                $columns
            ) > 0 ||
                $this->db->select(
                    'count',
                    //donation campaign inner join date
                    'donation_campaign',
                    'INNER JOIN register_to_campaign on donation_campaign.CampaignID = register_to_campaign.CampaignID WHERE DonorID =:DonorID AND DATEDIFF(Date,:Date) < -56',
                    $params,
                    $columns
                ) > 0)
        ) {
            return $this->db->select(
                'count',
                //donation campaign inner join date
                'donation_campaign',
                'INNER JOIN register_to_campaign on donation_campaign.CampaignID = register_to_campaign.CampaignID WHERE DonorID =:DonorID AND DATEDIFF(Date,:Date) > 56',
                $params,
                $columns
            );
        } else {
            return 0;
        }
    }

    public function ifregistered($user_id, $campaign_id)
    {
        $param = [':DonorID', ':CampaignID'];
        $inputs = [$user_id, $campaign_id];
        $count = $this->db->select(
            'count',
            'register_to_campaign',
            'WHERE DonorID = :DonorID AND CampaignID = :CampaignID',
            $param,
            $inputs
        );
        return $count;
    }

    public function get_campreg_info($user_ID)
    {
        $emcontno = $this->db->select(
            'Emergency_contact_no',
            'register_to_campaign',
            'WHERE DonorID =:DonorID',
            ':DonorID',
            $user_ID
        )[0];
        $contno = $this->db->select(
            'ContactNumber',
            'usercontactnumber',
            'WHERE UserID =:UserID',
            ':UserID',
            $user_ID
        )[0];
        $reg_data = [$emcontno[0], $contno[0]];
        // print_r($reg_data);
        // die();
        return $reg_data;
    }

    public function getcontno($user_id)
    {
        $contno = $this->db->select(
            'ContactNumber',
            'usercontactnumber',
            'WHERE UserID =:UserID',
            ':UserID',
            $user_id
        )[0];
        // print_r($contno);
        // die();
        return $contno;
    }

    public function putregistraion($inputs, $contno, $user_id)
    {
        $columns = ['DonorID', 'CampaignID', 'Emergency_contact_no'];
        $param = [':DonorID', ':CampaignID', ':Emergency_contact_no'];
        $result1 = $this->db->insert(
            'register_to_campaign',
            $columns,
            $param,
            $inputs
        );
        $result2 = $this->db->update(
            'usercontactnumber',
            'ContactNumber',
            ':ContactNumber',
            $contno,
            ':user_id',
            $user_id,
            'WHERE UserID = :user_id'
        );
        if ($result1 == 'Success' && $result2 == 'Success') {
            return true;
        } else {
            print_r($result1);
        }
        print_r($result2);
    }
    public function editregistraion($campaign_id, $contno, $emcontno, $user_id)
    {
        $param = [':DonorID', ':CampaignID'];
        $inputs = [$user_id, $campaign_id];
        $result1 = $this->db->update(
            'register_to_campaign',
            'Emergency_contact_no',
            ':Emergency_contact_no',
            $emcontno,
            $param,
            $inputs,
            'WHERE DonorID = :DonorID AND CampaignID = :CampaignID'
        );
        $result2 = $this->db->update(
            'usercontactnumber',
            'ContactNumber',
            ':ContactNumber',
            $contno,
            ':user_id',
            $user_id,
            'WHERE UserID = :user_id'
        );
        if ($result1 == 'Success' && $result2 == 'Success') {
            return 'Success';
        } else {
            print_r($result1);
            print_r($result2);
        }
    }

    public function deleteregistration($user_id, $campaign_id)
    {
        $campaign_id = intval($campaign_id);
        $param = [':DonorID', ':CampaignID'];
        $inputs = [$user_id, $campaign_id];
        $result = $this->db->delete(
            'register_to_campaign',
            'WHERE DonorID = :DonorID AND CampaignID = :CampaignID',
            $param,
            $inputs
        );
        if ($result == 'Success') {
            return true;
        } else {
            print_r($result);
        }
    }

    public function get_reg_info($campid, $user_ID)
    {
        $reg_info =
            $this->db->select(
                '*',
                'register_to_campaign',
                'WHERE DonorID =:DonorID',
                ':DonorID',
                $user_ID
            ) > 0 &&
            $this->db->select(
                'count',
                'register_to_campaign',
                'WHERE CampaignID =:CampaignID',
                ':CampaignID',
                $campid
            );
        $ret_reg_info = $reg_info[0];
        return $ret_reg_info;
    }
}