<?php

class sys_donorsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }



    public function addDonor($inputs1,$inputs2,$inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email','Password','Username','Userpic','UserType');
        $param1 = array(':Email',':Password',':Username',':Userpic',':UserType');
        $result1 = $this->db->insert("user", $columns1, $param1, $inputs1);

        
        //Updating the hospital/medical center table
        //Get the UserID from the last inserted user from the user table
        $UserID = $this->db->lastInsertId();
        array_unshift($inputs2, $UserID);

        
        

        $columns2 = array('UserID','Fullname','NIC','DOB','Gender','BloodType','Number','LaneName','City','District','Province','DonorCard_Img');
        $param2 = array(':UserID',':Fullname',':NIC',':DOB',':Gender',':BloodType',':Number',':LaneName',':City',':District',':Province',':DonorCard_Img');
        $result2 = $this->db->insert("donor", $columns2, $param2, $inputs2);

        //Updating the usercontactnumber table
        $columns3 = array('UserID', 'ContactNumber');
        $param3 = array(':UserID', ':ContactNumber');
        array_unshift($inputs3, $UserID);
        $result3 = $this->db->insert("usercontactnumber", $columns3, $param3, $inputs3);
        
        if($result1=="Success" && $result2=="Success" && $result3=="Success"){
            return true;
        }
        else{
            print_r($result1);
            print_r($result2);
            print_r($result3);
        }
    }




    
    public function getAllUsers()
    {
        $data = $this->db->select("*", "user", "WHERE UserType != 'Admin'");
        return $data;
    }


    //Function to get the type of the user when user id is passed
    public function getUserType($user_id)
    {     
        $data = $this->db->select("UserType", "user", "WHERE UserID = :user_id",':user_id',$user_id);
        return $data[0]['UserType'];
    }

    //Function to get the details of the hospital/medical center when user id is passed
    
    public function editDonor($user_id,$inputs1,$inputs2,$inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email');
        $param1 = array(':Email');
        $result1 = $this->db->update("user", $columns1, $param1, $inputs1,':user_id',$user_id,"WHERE UserID = :user_id");


        // //Updating the hospital/medical center table
        // //Get the UserID from the last inserted user from the user table
        // $UserID = $this->db->lastInsertId();
        // array_unshift($inputs2, $UserID);

        $columns2 = array('Fullname', 'NIC','DOB','Gender','BloodType', 'Number', 'LaneName', 'City', 'District', 'Province');
        $param2 = array(':Fullname', ':NIC',':DOB',':Gender',':BloodType', ':Number', ':LaneName', ':City', ':District', ':Province');
        $result2 = $this->db->update("donor", $columns2, $param2, $inputs2,':user_id',$user_id,"WHERE UserID = :user_id");

        //Updating the usercontactnumber table
        $columns3 = array('ContactNumber');
        $param3 = array(':ContactNumber');
        // array_unshift($inputs3, $UserID);
        $result3 = $this->db->update("usercontactnumber", $columns3, $param3, $inputs3,':user_id',$user_id,"WHERE UserID = :user_id");
        
        if($result1=="Success" && $result2=="Success" && $result3=="Success"){
            return true;
        }
        else{
            print_r($result1);
            print_r($result2);
            print_r($result3);
        }
    }


    

    function deleteDonorrDetails($user_id)
    {
        //Set foreign key checks to 0
        $this->db->query("SET FOREIGN_KEY_CHECKS=0");
        $result1 = $this->db->delete("user", "WHERE  UserID = :user_id ;", ':user_id', $user_id);
        $result2 = $this->db->delete("donor", "WHERE  UserID = :user_id ;", ':user_id', $user_id);
        $result3 = $this->db->delete("usercontactnumber", "WHERE  UserID = :user_id ;", ':user_id', $user_id);
        $this->db->query("SET FOREIGN_KEY_CHECKS=1");
        if ($result1 == "Success" && $result2 == "Success" && $result3 == "Success") {
            return true;
        } else 
        {   
            print_r($result1);
            print_r($result2);
            print_r($result3);
            
        }
    }

    // Function to get the blood bank id and blood bank name from table blood bank
    public function getBloodBankName()
    {
        $data = $this->db->select("BloodBankID,BloodBank_Name", "bloodbank",null);
        return $data;
    }

    public function getAllDonorDetails()
    {
        // Get all the donor details
        $data = $this->db->select("*", "donor","Null");
        return $data;
    }

    public function getBloodBankid($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $bloodbankid = $this->db->select("BloodBankID","system_user","INNER JOIN user on user.userID = system_user.userID WHERE user.email =:email",':email',$email);
            $blood_bank_id = $bloodbankid[0]['BloodBankID'];
            return $blood_bank_id;
        
        } 

    }

    public function getDonorDetails($id)
    {
        $donor = $this->db->select("*","donor","INNER JOIN user on donor.UserID = user.UserID INNER JOIN usercontactnumber on usercontactnumber.UserID = user.UserID WHERE donor.userID =:userID",':userID',$id);
        return $donor;
    }

    public function getDonorbloodtype($nic)
    {
        $bloodtype = $this->db->select("bloodtype","donor","WHERE nic =:nic",':nic',$nic);
        return $bloodtype[0]['bloodtype'];
    }

    public function getDonorbloodtypeID($name,$subtype)
    {
         $param = array(':name',':subtype');
         $inputs = array($name,$subtype);

        $bloodtypeid = $this->db->select("TypeID","bloodcategory","WHERE name =:name AND Subtype = :subtype",$param,$inputs);
        return $bloodtypeid[0]['TypeID'];
    }

    public function getDonorID($nic)
    {
        $userID = $this->db->select("UserID","donor","WHERE nic =:nic",':nic',$nic);
        return $userID[0]['UserID'];
    }

    public function addpacket($inputs1) 
    {

        
        $columns1 = array('PacketID','Sub_PacketID','Status','TypeID','blood_bank_ID');
        $param1 = array(':PacketID',':Sub_PacketID',':Status',':TypeID',':blood_bank_ID');
        $result1 = $this->db->insert("bloodpacket", $columns1, $param1, $inputs1);

        
        
        $UserID = $this->db->lastInsertId();
        return $UserID;

    }

    public function adddonation($inputs1) 
    {

        
        $columns1 = array('DonorID','BloodBankID','PacketID','Date','Complication');
        $param1 = array(':DonorID',':BloodBankID',':PacketID',':Date',':Complication');
        $result1 = $this->db->insert("donor_bloodbank_bloodpacket", $columns1, $param1, $inputs1);

        if($result1){
            return true;
        }
        else{
            return false;
        };

    }

    public function getAllDonations($BloodBankID)
    {
        $donation = $this->db->select("*","donor","
        INNER JOIN donor_bloodbank_bloodpacket on donor.UserID = donor_bloodbank_bloodpacket.DonorID  
        WHERE donor_bloodbank_bloodpacket.BloodBankID =:BloodBankID
        ORDER BY donor_bloodbank_bloodpacket.Date DESC "
        ,':BloodBankID',$BloodBankID);
        return $donation;
    }

    public function getMaxID()
    {
        $ID =$this->db->select("MAX(PacketID)","bloodpacket",null);
        return $ID[0]['MAX(PacketID)'] ;
    }

    public function getAllDonorDetailsJoin()
    {
        // Get all the donor details
        $data = $this->db->select("*, MAX(donor_bloodbank_bloodpacket.date) as lastdate", "donor","
        LEFT JOIN donor_bloodbank_bloodpacket on donor.UserID = donor_bloodbank_bloodpacket.DonorID 
        GROUP BY donor.UserID ORDER BY donor_bloodbank_bloodpacket.Date DESC",null);
        return $data;
    }

     public function getAllBadges()
    {
        // Get all the donor details
        $data = $this->db->select("*", "badge","ORDER BY Donation_Constraint ASC",null);
        return $data;
    }

    public function getDonationCount($nic)
    {
        $count = $this->db->select('count', "donor_bloodbank_bloodpacket", "INNER JOIN donor ON donor_bloodbank_bloodpacket.DonorID = donor.UserID WHERE donor.NIC = :nic;", ':nic', $nic);
        return $count;
    }

    public function getDonorBadgeCount($nic)
    {
        $count = $this->db->select('count', "donor_badges", "INNER JOIN donor ON donor_badges.DonorUserID = donor.UserID WHERE donor.NIC = :nic;", ':nic', $nic);
        return $count;
    }

    public function insertDonorBadge($donor_id,$badge_id)
    {
        $columns1 = array('DonorUserID','BadgeID');
        $param1 = array(':DonorUserID',':BadgeID');
        $inputs1 = array($donor_id,$badge_id);
        $result1 = $this->db->insert("donor_badges", $columns1, $param1, $inputs1);

        if($result1){
            return true;
        }
        else{
            return false;
        };
    }

    public function updateDonorBadge($donor_id,$badge_id)
    {
        $columns1 = array('BadgeID');
        $param1 = array(':BadgeID');
        $inputs1 = array($badge_id);


        $result1 = $this->db->update("donor_badges", $columns1, $param1, $inputs1,':DonorUserID',$donor_id,"WHERE DonorUserID = :DonorUserID");

        if($result1){
            return true;
        }
        else{
            return false;
        };
    }

    public function getDonorBadge($id)
    {
        $badge = $this->db->select("*","donor_badges","INNER JOIN badge on donor_badges.BadgeID = badge.BadgeID WHERE donor_badges.DonorUserID =:userID",':userID',$id);
        return $badge;
    }

    public function getPastDonations($donorID)
    {
        $donation = $this->db->select("*","donor","INNER JOIN donor_bloodbank_bloodpacket on donor.UserID = donor_bloodbank_bloodpacket.DonorID  WHERE donor_bloodbank_bloodpacket.DonorID =:donorID ORDER BY donor_bloodbank_bloodpacket.date DESC",':donorID',$donorID);
        return $donation;
    }

    public function updateDonorCard($id,$img)
    {
        $columns1 = array('DonorCard_Img');
        $param1 = array(':DonorCard_Img');
        $inputs1 = array($img);

        $result1 = $this->db->update("donor", $columns1, $param1, $inputs1,':id',$id,"WHERE UserID = :id");

        if($result1){
            return true;
        }
        else{
            return false;
        };
    }

    public function getFilteredDonorDetailsNIC($nic)
    {
        $columns = array(":NIC");
        $values = array($nic);
        $data = $this->db->select("*, MAX(donor_bloodbank_bloodpacket.date) as lastdate", "donor", "
        LEFT JOIN donor_bloodbank_bloodpacket on donor.UserID = donor_bloodbank_bloodpacket.DonorID 
        WHERE NIC = :NIC
        GROUP BY donor.UserID ORDER BY donor_bloodbank_bloodpacket.Date DESC",$columns, $values);
        return $data;
    }

     public function getFilteredDonorDetails_District_BloodCategory($district,$bloodtype)
    {
        $columns = array(":District",":BloodType");
        $values = array($district,$bloodtype);
        $data = $this->db->select("*,MAX(donor_bloodbank_bloodpacket.date) as lastdate", "donor", "
        LEFT JOIN donor_bloodbank_bloodpacket on donor.UserID = donor_bloodbank_bloodpacket.DonorID
        WHERE District = :District AND BloodType = :BloodType
        GROUP BY donor.UserID ORDER BY donor_bloodbank_bloodpacket.Date DESC",$columns, $values);
        return $data;
    }

    public function getFilteredDonorDetails_BloodCategory($bloodtype)
    {
        $columns = array(":BloodType");
        $values = array($bloodtype);
        $data = $this->db->select("*,MAX(donor_bloodbank_bloodpacket.date) as lastdate", "donor", "
        LEFT JOIN donor_bloodbank_bloodpacket on donor.UserID = donor_bloodbank_bloodpacket.DonorID
        WHERE BloodType = :BloodType
        GROUP BY donor.UserID ORDER BY donor_bloodbank_bloodpacket.Date DESC",$columns, $values);
        return $data;
    }

    public function getFilteredDonorDetails_District($district)
    {
        $columns = array(":District");
        $values = array($district);
        $data = $this->db->select("*,MAX(donor_bloodbank_bloodpacket.date) as lastdate", "donor", "
        LEFT JOIN donor_bloodbank_bloodpacket on donor.UserID = donor_bloodbank_bloodpacket.DonorID
        WHERE District = :District
        GROUP BY donor.UserID ORDER BY donor_bloodbank_bloodpacket.Date DESC",$columns, $values);
        return $data;
    }

    public function getfilterdon($type,$blood_bank_id,$start,$end)
    {
        $params = array(':type',':blood_bank_ID',':start',':end');
        $inputs = array($type,$blood_bank_id,$start,$end);
        $pack = $this->db->select("*","donor_bloodbank_bloodpacket","
        INNER JOIN donor on donor_bloodbank_bloodpacket.DonorID = donor.UserID  
        WHERE donor_bloodbank_bloodpacket.BloodBankID =:blood_bank_ID  
        AND donor.BloodType = :type 
        AND donor_bloodbank_bloodpacket.Date >= :start 
        AND donor_bloodbank_bloodpacket.Date <= :end "
        ,$params,$inputs);
        return $pack;
    }

    public function getPastDonationsByNIC($nic)
    {
        $donation = $this->db->select("*","donor","INNER JOIN donor_bloodbank_bloodpacket on donor.UserID = donor_bloodbank_bloodpacket.DonorID  WHERE donor.NIC =:nic ORDER BY donor_bloodbank_bloodpacket.date DESC",':nic',$nic);
        return $donation;
    }

    public function getDonorIDCheck($nic)
    {
        $count = $this->db->select('count', "donor", "WHERE nic = :nic;", ':nic', $nic);
        return $count;
    }


}