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
            'WHERE Date > :Date AND Status = 1 AND Archive = 0 ORDER BY Date ASC',
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

    public function get_campaign_ad($ad_id)
    {
        $ad = $this->db->select(
            'Advertisement_pic',
            'advertisement',
            'WHERE AdvertisementID=:AdvertisementID',
            ':AdvertisementID',
            $ad_id
        );
        $ret_ad = $ad[0][0];
        return $ret_ad;
    }

    public function getLastDonation($donorID)
    {
        $date1 = $this->db->select(
            'Date',
            'donor_bloodbank_bloodpacket',
            'WHERE DonorID = :DonorID ORDER BY Date DESC',
            ':DonorID',
            $donorID
        );
        $date2 = $this->db->select(
            'Date',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID ORDER BY Date DESC',
            ':DonorID',
            $donorID
        );
        if (empty($date1) && empty($date2)) {
            return false;
        } else if (empty($date1)) {
            return $date2[0]['Date'];
        } else if (empty($date2)) {
            return $date1[0]['Date'];
        } else {
            if ($date1[0]['Date'] > $date2[0]['Date']) {
                return $date1[0]['Date'];
            } else {
                return $date2[0]['Date'];
            }
        }
    }

    public function getCampDates($userid)
    {
        $data = $this->db->select(
            'Date',
            'donation_campaign',
            'WHERE CampaignID IN (SELECT CampaignID FROM register_to_campaign WHERE DonorID = :DonorID)',
            ':DonorID',
            $userid
        );
        $dates = [];
        for ($x = 0; $x < count($data); $x++) {
            array_push($dates, $data[$x]['Date']);
        }
        return $dates;
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

    public function get_timeslots($campid)
    {
        $timeslots = $this->db->select(
            'SlotID',
            'campaign_timeslots',
            'WHERE CampaignID =:CampaignID',
            ':CampaignID',
            $campid
        );
        // print_r($timeslots[0][0]);
        // die();
        return $timeslots;
    }

    public function get_timeslot_period($slotids)
    {
        $timeslot_periods = [];
        foreach ($slotids as $slotid) {
            $timeslot_period = $this->db->select(
                'Start_time,End_time',
                'timeslot',
                'WHERE SlotID =:SlotID',
                ':SlotID',
                $slotid[0]
            );
            array_push($timeslot_periods, $timeslot_period[0]);
        }
        return $timeslot_periods;
        // print_r($timeslot_periods);
        // die();
    }

    public function get_beds($campid)
    {
        $beds = $this->db->select(
            'BedQuantity ',
            'donation_campaign',
            'WHERE CampaignID =:CampaignID',
            ':CampaignID',
            $campid
        );
        return $beds[0][0];
    }

    public function get_reserved_timeslots($campid, $slotids)
    {
        $reserved_timeslots = [];
        foreach ($slotids as $slotid) {
            $reserved_timeslot = $this->db->select(
                'count',
                'register_to_campaign',
                'WHERE CampaignID =:CampaignID AND SlotID =:SlotID',
                [':CampaignID', ':SlotID'],
                [$campid, $slotid[0]]
            );
            // print_r($reserved_timeslot);
            array_push($reserved_timeslots, $reserved_timeslot);

        }
        // print_r($reserved_timeslots);
        // die();
        return $reserved_timeslots;

    }

    public function reserve_timeslot($campid, $slotid, $user_id)
    {
        $param = [':DonorID', ':CampaignID'];
        $inputs = [$user_id, $campid];
        //update register_to_campaign table

        $result1 = $this->db->update(
            'register_to_campaign',
            'SlotID',
            ':SlotID',
            $slotid,
            $param,
            $inputs,
            'WHERE DonorID = :DonorID AND CampaignID = :CampaignID'
        );
        //return
        // print_r($result1);
        // die();
        if ($result1 == 'Success') {
            return true;
        } else {
            print_r($result1);
        }
    }

    public function get_camp_na($campid)
    {
        $camp_na = $this->db->select(
            'Name,Location',
            'donation_campaign',
            'WHERE CampaignID =:CampaignID',
            ':CampaignID',
            $campid
        );
        return $camp_na[0];
    }

    public function get_donor_name($userid)
    {
        $name = $this->db->select(
            'Fullname',
            'donor',
            'WHERE UserID =:UserID',
            ':UserID',
            $userid
        );
        return $name[0][0];

    }

    public function timeslotreserved($campid, $userid)
    {
        //check if slotID is NULL
        $timeslot = $this->db->select(
            'SlotID',
            'register_to_campaign',
            'WHERE CampaignID =:CampaignID AND DonorID =:DonorID',
            [':CampaignID', ':DonorID'],
            [$campid, $userid]
        );

        // print_r($timeslot);
        // die();

        if ($timeslot[0][0] == NULL) {
            return false;
        } else {
            return $timeslot[0][0];
        }
    }

    public function get_ts_period($slotid)
    {
        $timeslot_period = $this->db->select(
            'Start_time,End_time',
            'timeslot',
            'WHERE SlotID =:SlotID',
            ':SlotID',
            $slotid
        );
        return $timeslot_period[0];
    }

    public function cancel_reserved_timeslot($campid, $timeslot, $user_id)
    {
        $param = [':DonorID', ':CampaignID'];
        $inputs = [$user_id, $campid];
        //update register_to_campaign table

        $result1 = $this->db->update(
            'register_to_campaign',
            'SlotID',
            ':SlotID',
            NULL,
            $param,
            $inputs,
            'WHERE DonorID = :DonorID AND CampaignID = :CampaignID'
        );
        //return
        // print_r($result1);
        // die();
        if ($result1 == 'Success') {
            return true;
        } else {
            print_r($result1);
        }
    }

    public function Campaignsofmonth($today, $month)
    {
        $data = $this->db->select(
            '*',
            'donation_campaign',
            'WHERE Date > :Date AND MONTH(Date) = :Month AND Status = 1 AND Archive = 0 ORDER BY Date ASC',
            [':Date', ':Month'],
            [$today, $month]
        );
        return $data;
    }

    public function Campaignsofdistrict($today, $district)
    {
        $data = $this->db->select(
            '*',
            'donation_campaign',
            'WHERE Date > :Date AND Status = 1 AND Archive = 0 AND District = :District ORDER BY Date ASC',
            [':Date', ':District'],
            [$today, $district]
        );
        return $data;
    }

    public function Campaignsofmonthdistict($today, $month, $district)
    {
        $data = $this->db->select(
            '*',
            'donation_campaign',
            'WHERE Date > :Date AND MONTH(Date) = :Month AND Status = 1 AND Archive = 0 AND District = :District ORDER BY Date ASC',
            [':Date', ':Month', ':District'],
            [$today, $month, $district]
        );
        return $data;
    }


}