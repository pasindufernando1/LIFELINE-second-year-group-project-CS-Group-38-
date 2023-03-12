<?php

class UserModel extends Model
{
    public function __construct()
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

    // Donor's Functions

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

    public function getnewestbadge($userid)
    {
        $camp_donations = $this->db->select(
            'COUNT(*)',
            'donor_campaign_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $userid
        )[0][0];

        $bank_donations = $this->db->select(
            'COUNT(*)',
            'donor_bloodbank_bloodpacket',
            'WHERE DonorID = :DonorID',
            ':DonorID',
            $userid
        )[0][0];
        $donations=$camp_donations + $bank_donations;

        $newest_badge = $this->db->select(
            'BadgePic',
            'badge',
            'WHERE Donation_Constraint <= :Donations ORDER BY Donation_Constraint DESC',
            ':Donations',
            $donations
        )[0][0];
        return $newest_badge;
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

    // EO Donor's Functions

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

    public function view_campaign_info()
    {

        $data = $this->db->select("Name,Date", "donation_campaign", "WHERE Status ='Accepted'");

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

}