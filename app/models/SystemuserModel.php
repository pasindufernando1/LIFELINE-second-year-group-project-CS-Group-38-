<?php


class SystemuserModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function authenticate($email, $pwd)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $hashed = $this->db->select("password", "user", "WHERE email = :email ;", ':email', $email);

            if (password_verify($pwd, $hashed[0]['password'])) {
                return true;
            } else return false;
        
        } else return false;
    
    }

    public function getUserName($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $user_name = $this->db->select("username","user","WHERE email =:email",':email',$email);
            $name_user = $user_name[0]['username'];
            return $name_user;

        
        } 

    }

    public function gettype($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $type = $this->db->select("usertype","user","WHERE email =:email",':email',$email);
            $type_of_user = $type[0]['usertype'];
            return $type_of_user;
        
        } 
    }
    public function getBloodBankName($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $bloodbankname = $this->db->select("BloodBank_Name","bloodbank","INNER JOIN system_user on system_user.BloodBankID = bloodbank.BloodBankID  INNER JOIN user on user.UserID = system_user.UserID WHERE user.email =:email",':email',$email);
            $blood_bank_name = $bloodbankname[0]['BloodBank_Name'];
            return $blood_bank_name;
        
        } 

    }

    public function getuserimg($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $type = $this->db->select("userpic","user","WHERE email =:email",':email',$email);
            $user_pic = $type[0]['userpic'];
            return $user_pic;
        
        } 
    }

    public function getAllDonorDetailsJoin()
    {
        // Get all the donor details
        $data = $this->db->select("*, MAX(donor_bloodbank_bloodpacket.date) as lastdate", "donor","
        LEFT JOIN donor_bloodbank_bloodpacket on donor.UserID = donor_bloodbank_bloodpacket.DonorID
        INNER JOIN user on donor.UserID = user.UserID 
        GROUP BY donor.UserID ORDER BY donor_bloodbank_bloodpacket.Date DESC",null);
        return $data;
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
