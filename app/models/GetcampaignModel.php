<?php

use LDAP\Result;

class GetcampaignModel extends Model
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

    // public function iftimeokay($user_ID, $camp_ID)
    // {
    //     //If donor havent registered for any campaign and have not donated blood yet
    //     // print_r(
    //     //     $this->db->select(
    //     //         'count',
    //     //         'regiser_to_campaigm',
    //     //         'WHERE DonorID =:DonorID',
    //     //         ':DonorID',
    //     //         $user_ID
    //     //     )
    //     // );
    //     // die();
    //     if (
    //         $this->db->select(
    //             'count',
    //             'register_to_campaign',
    //             'WHERE DonorID =:DonorID',
    //             ':DonorID',
    //             $user_ID
    //         ) == 0 &&
    //         $this->db->select(
    //             'count',
    //             'donor_bloodbank_bloodpacket',
    //             'WHERE DonorID =:DonorID',
    //             ':DonorID',
    //             $user_ID
    //         ) == 0 &&
    //         $this->db->select(
    //             'count',
    //             'donor_campaign_bloodpacket',
    //             'WHERE DonorID =:DonorID',
    //             ':DonorID',
    //             $user_ID
    //         )
    //     ) {
    //         return true;
    //     } else {
    //         $camp_date = $this->db->select(
    //             'Date',
    //             'donation_campaign',
    //             'WHERE CampaignID =:CampaignID',
    //             ':CampaignID',
    //             $camp_ID
    //         )[0]['Date'];
    //         $params = [':DonorID', ':Date'];
    //         $columns = [$user_ID, $camp_date];
    //         if (
    //             $this->db->select(
    //                 'count',
    //                 'donor_campaign_bloodpacket',
    //                 'WHERE DonorID =:DonorID AND DATEDIFF(Date,:Date) < -56',
    //                 $params,
    //                 $columns
    //             ) == 0 ||
    //             $this->db->select(
    //                 'count',
    //                 'donor_campaign_bloodpacket',
    //                 'WHERE DonorID =:DonorID AND DATEDIFF(Date,:Date) > 56',
    //                 $params,
    //                 $columns
    //             ) == 0
    //         ) {
    //             if (
    //                 $this->db->select(
    //                     'count',
    //                     'donor_bloodbank_bloodpacket',
    //                     'WHERE DonorID =:DonorID AND DATEDIFF(Date,:Date) < -56',
    //                     $params,
    //                     $columns
    //                 ) == 0 ||
    //                 $this->db->select(
    //                     'count',
    //                     'donor_bloodbank_bloodpacket',
    //                     'WHERE DonorID =:DonorID AND DATEDIFF(Date,:Date) > 56',
    //                     $params,
    //                     $columns
    //                 ) == 0
    //             ) {
    //                 $registered_camps = $this->db->select(
    //                     'CampaignID',
    //                     'register_to_campaign',
    //                     'WHERE DonorID =:DonorID',
    //                     ':DonorID',
    //                     $user_ID
    //                 );
    //                 // $register_dates=[];
    //                 for ($x = 0; $x < sizeof($registered_camps); $x++) {
    //                     $other_date = $this->db->select(
    //                         'Date',
    //                         'donation_campaign',
    //                         'WHERE CampaignID =:CampaignID',
    //                         ':CampaignID',
    //                         $registered_camps[$x]
    //                     );
    //                     $other_date = date('Y-m-d', $other_date);
    //                     if (
    //                         date_diff($camp_date, $other_date) < 56 &&
    //                         date_diff($camp_date, $other_date) > -56
    //                     ) {
    //                         return false;
    //                     }
    //                 }
    //                 return true;
    //             } else {
    //                 return false;
    //             }
    //         } else {
    //             return false;
    //         }
    //     }
    //     // return false;
    // }

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