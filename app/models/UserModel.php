<?php

class UserModel extends Model
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
                'WHERE email = :email
                AND Deactivation = 0;',
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
    public function getBloodBankName($email)
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
            $bloodbankname = $this->db->select(
                'BloodBank_Name',
                'bloodbank',
                'INNER JOIN system_user on system_user.BloodBankID = bloodbank.BloodBankID  INNER JOIN user on user.UserID = system_user.UserID WHERE user.email =:email',
                ':email',
                $email
            );
            $blood_bank_name = $bloodbankname[0]['BloodBank_Name'];
            return $blood_bank_name;
        }
    }

    public function getuserimg($email)
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
                'userpic',
                'user',
                'WHERE email =:email',
                ':email',
                $email
            );
            $user_pic = $type[0]['userpic'];
            return $user_pic;
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


    public function getHospitals()
    {
        $hospitals = $this->db->select(
            ['UserID', 'Name', 'District', 'Status'],
            'hospital_medicalcenter',
            'WHERE Status = :Status ;',
            ':Status',
            0
        );
        return $hospitals;
    }

    public function getpassword($email)
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
            $user_password = $this->db->select(
                'Password',
                'user',
                'WHERE email =:email',
                ':email',
                $email
            );
            $password_user = $user_password[0]['Password'];
            return $password_user;
        }
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

    public function getUserId($email)
    {
        if (
            $this->db->select(
                'UserID',
                'user',
                'WHERE email = :email;',
                ':email',
                $email
            ) > 0
        ) {
            $user_ID = $this->db->select(
                'UserID',
                'user',
                'WHERE email =:email',
                ':email',
                $email
            );
            $user_ID = $user_ID[0]['UserID'];
            return $user_ID;
        }
    }

    public function insertToken($email)
    {
        if (
            $this->db->select(
                'UserID',
                'user',
                'WHERE email = :email;',
                ':email',
                $email
            ) > 0
        ) {
            $user_ID = $this->db->select(
                'UserID',
                'user',
                'WHERE email =:email',
                ':email',
                $email
            );
            $user_ID = $user_ID[0]['user_ID'];
            return $user_ID;
        }
    }

    public function getUserDistrict($User_ID)
    {
        $ID = $this->db->select(
            'District',
            'hospital_medicalcenter',
            'WHERE UserID =:User_ID',
            ':User_ID',
            $User_ID
        );
        $District = $ID[0]['District'];
        return $District;
    }

    public function viewNearbyBloodbanks($District)
    {
        $BBinfo = $this->db->select(
            '*',
            'bloodbank',
            'WHERE District =:District',
            ':District',
            $District
        );

        // $HosName = $HosName['Name'];
        return $BBinfo;
    }

    public function viewBloodBankContact($BloodBankinfo)
    {
        $BBinfos = [];
        foreach ($BloodBankinfo as $BloodBank) {
            $bbid = $BloodBank['BloodBankID'];
            $BBinfo = $this->db->select(
                'ContactNumber',
                'bloodbankcontactnumber',
                'WHERE BloodBankID =:BloodBankID',
                ':BloodBankID',
                $bbid
            );
            array_push($BBinfos, $BBinfo);
        }

        // $HosName = $HosName['Name'];
        return $BBinfo;
    }

    public function view_campaign_info($orgid)
    {
        $today = date('Y-m-d H:i:s');
        //print_r($today);die();
        $upCampid = $this->db->select("CampaignID", "donation_campaign", "WHERE OrganizationUserID=:OrganizationUserID", ':OrganizationUserID', $orgid);
        //print_r($upCampid);die();
        //$upCampid = $upCampid[0]['CampaignID'];
        //print_r($upCampid);die();
        for ($i = 0; $i < count($upCampid); $i++) {
            $upCampid[$i] = $upCampid[$i]['CampaignID'];

        }
        //print_r($upCampid);die();
        $upCampid = implode(",", $upCampid);
        //print_r($upCampid);die();
        $data = $this->db->select("Name,Date,Location", "donation_campaign", " WHERE CampaignID IN ($upCampid) && Status =1 && Date >= :Date", ':Date', $today);
        //print_r($data);die();
        // $data = $this->db->select("Name,Date,Location","donation_campaign"," WHERE OrganizationUserID=:OrganizationUserID && Status =1 && Date >= :Date",':OrganizationUserID' ,':Date',$orgid,$today);

        //print_r($data);die();
        return $data;
    }

    public function view_past_campaign_info($orgid)
    {
        $today = date('Y-m-d H:i:s');
        //print_r($today);die();
        $upCampid = $this->db->select("CampaignID", "donation_campaign", "WHERE OrganizationUserID=:OrganizationUserID", ':OrganizationUserID', $orgid);
        //print_r($upCampid);die();
        //$upCampid = $upCampid[0]['CampaignID'];
        //print_r($upCampid);die();
        for ($i = 0; $i < count($upCampid); $i++) {
            $upCampid[$i] = $upCampid[$i]['CampaignID'];

        }
        //print_r($upCampid);die();
        $upCampid = implode(",", $upCampid);
        //print_r($upCampid);die();
        $data = $this->db->select("Name,Date,Location", "donation_campaign", " WHERE CampaignID IN ($upCampid) && Status =1 && Date < :Date", ':Date', $today);
        //print_r($data);die();
        // $data = $this->db->select("Name,Date,Location","donation_campaign"," WHERE OrganizationUserID=:OrganizationUserID && Status =1 && Date >= :Date",':OrganizationUserID' ,':Date',$orgid,$today);

        //print_r($data);die();
        return $data;
    }


    public function getAllTypes($blood_bank_id)
    {
        $data = $this->db->select("*", "bloodcategory", " WHERE blood_bank_id =:blood_bank_id", ':blood_bank_id', $blood_bank_id);
        return $data;
    }

    public function getAllPackets($blood_bank_id)
    {
        $packets = $this->db->select("*", "bloodpacket", "INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID WHERE bloodpacket.blood_bank_id =:blood_bank_id", ':blood_bank_id', $blood_bank_id);
        return $packets;
    }

    public function getBloodBankid($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $bloodbankid = $this->db->select("BloodBankID", "system_user", "INNER JOIN user on user.userID = system_user.userID WHERE user.email =:email", ':email', $email);
            $blood_bank_id = $bloodbankid[0]['BloodBankID'];
            return $blood_bank_id;

        }

    }

    // Admin Dashboard related functions
    public function getDashboardStats()
    {
        // Total bank donations today
        $Today_bankdonations = $this->db->select("count(*) as count", "donor_bloodbank_bloodpacket", "WHERE Date = CURDATE()");
        $Today_bankdonations = $Today_bankdonations[0]['count'];

        //Total camp donations today
        $Today_campdonations = $this->db->select("count(*) as count", "donor_campaign_bloodpacket", "WHERE Date = CURDATE()");
        $Today_campdonations = $Today_campdonations[0]['count'];

        //Total donations today
        $Today_donations = $Today_bankdonations + $Today_campdonations;

        //Total unread feedbacks
        $Unread_feedbacks = $this->db->select("count(*) as count", "organization_feedback", "WHERE Read_status = 0");
        $Unread_feedbacks = $Unread_feedbacks[0]['count'];

        // Total Cash donations today
        $Today_cash_donations = $this->db->select("sum(Amount) as sum", "cash_donation", "WHERE Date = CURDATE()");
        $Today_cash_donations = $Today_cash_donations[0]['sum'];

        // Total hospital approval requests
        $Total_hospital_requests = $this->db->select("count(*) as count", "hospital_medicalcenter", "WHERE Status = 0");
        $Total_hospital_requests = $Total_hospital_requests[0]['count'];

        //Merging all the data into an array
        $data = array(
            "Today_donations" => $Today_donations,
            "Unread_feedbacks" => $Unread_feedbacks,
            "Today_cash_donations" => $Today_cash_donations,
            "Total_hospital_requests" => $Total_hospital_requests
        );

        //print_r($data);die();
        return $data;
    }

    //Function to total blood donations of past 12 months including this month
    public function getdonations()
    {
        // Create an array for the past 12 months including this month with keynames as year-month
        $months = array();
        for ($i = 0; $i < 12; $i++) {
            $months[date('Y-m', strtotime("-$i months"))] = 0;
        }
        $bank_donations = $this->db->select("count(*) as count, Date", "donor_bloodbank_bloodpacket", "GROUP BY MONTH(Date),YEAR(Date)");
        // If the year and month of the donation is in the array, add the count to the array
        foreach ($bank_donations as $donation) {
            $year_month = date('Y-m', strtotime($donation['Date']));
            if (array_key_exists($year_month, $months)) {
                $months[$year_month] += $donation['count'];
            }
        }


        $camp_donations = $this->db->select("count(*) as count, Date", "donor_campaign_bloodpacket", "GROUP BY MONTH(Date),YEAR(Date)");
        // If the year and month of the donation is in the array, add the count to the array
        foreach ($camp_donations as $donation) {
            $year_month = date('Y-m', strtotime($donation['Date']));
            if (array_key_exists($year_month, $months)) {
                $months[$year_month] += $donation['count'];
            }
        }

        //Rename the key of the array to month plus year 
        $months = array_combine(array_map(function ($key) {
            return date('F Y', strtotime($key));
        }, array_keys($months)), array_values($months));

        //Reverse the array to show the earliest month first
        $months = array_reverse($months);
        return $months;
    }

    //Function to get the donor composition(Male and Female)
    public function getdonorcomposition()
    {
        $donor_composition = $this->db->select("count(*) as count, Gender", "donor", "GROUP BY Gender");
        //Format the array in the required format for the chart
        $new_array = array();
        foreach ($donor_composition as $entry) {
            $gender = $entry["Gender"];
            $count = $entry["count"];
            $new_array[$gender] = $count;
        }
        return $new_array;
    }



    // Admin related
    public function getAdminuserID($uname)
    {
        $userID = $this->db->select("UserID", "user", "WHERE email =:email", ':email', $uname);
        $userID = $userID[0]['UserID'];
        return $userID;
    }

    // Donor related
    public function getAllCampaigns($today)
    {
        // $columns=['']
        $inputs = [':Date'];
        $values = [$today];
        $data = $this->db->select(
            '*',
            'donation_campaign',
            'WHERE Date > :Date AND Status = 1 AND Archive = 0 ORDER BY Date ASC',
            $inputs,
            $values
        );
        return $data;
    }

    public function getCampAds($camps)
    {
        $camp_ads = [];
        foreach ($camps as $camp) {
            $data = $this->db->select(
                'Advertisement_Pic',
                'advertisement',
                'WHERE AdvertisementID = :AdvertisementID',
                ':AdvertisementID',
                $camp['AdvertisementID']
            );
            array_push($camp_ads, $data);
        }
        return $camp_ads;

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

    public function getTotalDonatedAmount($donorID)
    {
        $blood_packet_ids = $this->db->select(
            'PacketID',
            'donor_bloodbank_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $donorID
        );
        $amount1 = 0;
        foreach ($blood_packet_ids as $blood_packet_id) {
            $amount1 += $this->db->select(
                'Quantity',
                'bloodpacket',
                'WHERE PacketID = :PacketID',
                ':PacketID',
                $blood_packet_id['PacketID']
            )[0]['Quantity'];
        }

        $blood_packet_ids = $this->db->select(
            'PacketID',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $donorID
        );
        $amount2 = 0;
        foreach ($blood_packet_ids as $blood_packet_id) {
            $amount2 += $this->db->select(
                'Quantity',
                'bloodpacket',
                'WHERE PacketID = :PacketID',
                ':PacketID',
                $blood_packet_id['PacketID']
            )[0]['Quantity'];
        }
        return $amount1 + $amount2;
    }

    public function getNoOfCampDonations($donorID)
    {
        $data = $this->db->select(
            'count',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $donorID
        );
        return $data;
    }

    public function getNoOfBankDonations($donorID)
    {
        $data = $this->db->select(
            'count',
            'donor_bloodbank_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $donorID
        );
        return $data;
    }

    public function getdonordistrict($userid)
    {
        $data = $this->db->select(
            'District',
            'donor',
            'WHERE UserID = :UserID',
            ':UserID',
            $userid
        );

        return $data[0]['District'];

    }

    public function getMonthlyDonation($BloodBankID)
    {
        $months = array();
        for ($i = 0; $i < 12; $i++) {
            $months[date('Y-m', strtotime("-$i months"))] = 0;
        }
        $bank_donations = $this->db->select("count(*) as count, Date", "donor_bloodbank_bloodpacket", "
        WHERE BloodBankID = :BloodBankID
        GROUP BY MONTH(Date),YEAR(Date)",
        ':BloodBankID',
        $BloodBankID);
        // If the year and month of the donation is in the array, add the count to the array
        foreach ($bank_donations as $donation) {
            $year_month = date('Y-m', strtotime($donation['Date']));
            if (array_key_exists($year_month, $months)) {
                $months[$year_month] += $donation['count'];
            }
        }


        //Rename the key of the array to month plus year 
        $months = array_combine(array_map(function ($key) {
            return date('F Y', strtotime($key));
        }, array_keys($months)), array_values($months));

        //Reverse the array to show the earliest month first
        $months = array_reverse($months);
        return $months;
    }

    public function getTodayDonation($BloodBankID,$date){
        $params = [':BloodBankID', ':date'];
        $inputs = [$BloodBankID, $date];
        $data = $this->db->select(
            'count',
            'donor_bloodbank_bloodpacket',
            'WHERE BloodBankID = :BloodBankID
            AND Date = :date',
            $params,
            $inputs
        );
        return $data;
    }

    public function getCardIssued()
    {
        $default = "default_image";
        $count = $this->db->select('count', "donor", "WHERE DonorCard_Img <> :name;", ':name', $default);
        return $count;
        
         
    }

    public function getAdCount($BloodBankID)
    {
        $Archive = 0;
        $params = [':BloodBankID', ':Archive'];
        $inputs = [$BloodBankID, $Archive];
        $count = $this->db->select('count', "advertisement", "WHERE BloodBankID = :BloodBankID AND Archive = :Archive;", $params, $inputs);
        return $count;
        
         
    }

    public function getCampReqCount($BloodBankID)
    {
        $Status = 0;
        $params = [':BloodBankID', ':Status'];
        $inputs = [$BloodBankID, $Status];
        $count = $this->db->select('count', "donation_campaign", "WHERE BloodBankID = :BloodBankID AND Status = :Status;", $params, $inputs);
        return $count;
        
         
    }
}