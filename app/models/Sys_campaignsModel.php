<?php

class sys_campaignsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
     public function getBloodBankid($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $bloodbankid = $this->db->select("BloodBankID","system_user","INNER JOIN user on user.userID = system_user.userID WHERE user.email =:email",':email',$email);
            $blood_bank_id = $bloodbankid[0]['BloodBankID'];
            return $blood_bank_id;
        
        } 

    }

    function getCamp($blood_bank_id)
    {
        $camp = $this->db->select("*","donation_campaign","WHERE BloodBankID =:id",':id',$blood_bank_id);
        return $camp;
    }

    function getfiltertype($blood_bank_id,$status,$start,$end)
    {
        $param1 = array(':blood_bank_id',':status',':start',':end');
        $inputs1 = array($blood_bank_id,$status,$start,$end);
        $camp = $this->db->select("*","donation_campaign","WHERE BloodBankID =:blood_bank_id
        AND Status =:status
        AND Date >= :start
        AND Date <= :end",
        
        $param1,$inputs1);
        return $camp;
    }

    function get_camp_info($id)
    {
        $camp = $this->db->select("*","donation_campaign","
        INNER JOIN organization_society ON donation_campaign.OrganizationUserID = organization_society.UserID WHERE donation_campaign.CampaignID =:id",':id',$id);
        return $camp;
    }

    function get_ad_count($id)
    {
        $adcount = $this->db->select('count', "donation_campaign", "
        INNER JOIN advertisement
        ON donation_campaign.AdvertisementID = advertisement.AdvertisementID
        WHERE donation_campaign.CampaignID = :id;", ':id', $id);
        return $adcount;
    }

    function addadvert($cur_date,$des)
    {
        $inputs1 = array($cur_date,$des);
        $columns1 = array('PublishedDate','Description');
        $param1 = array(':PublishedDate',':Description');
        $result1 = $this->db->insert("advertisement", $columns1, $param1, $inputs1);

        
        
        $adid = $this->db->lastInsertId();
        return $adid;
    }

    function updatead($cid,$ad_id)
    {
        $columns1 = array('AdvertisementID');
        $param1 = array(':AdvertisementID');
        $inputs1 = array($ad_id);


        $result1 = $this->db->update("donation_campaign", $columns1, $param1, $inputs1,':cid',$cid,"WHERE CampaignID = :cid");

        if($result1){
            return true;
        }
        else{
            return false;
        };
    }

    function adimg($ad_id,$fileName)
    {
        $inputs1 = array($ad_id,$fileName);
        $columns1 = array('AdvertisementID','AdvertisementPic');
        $param1 = array(':AdvertisementID',':AdvertisementPic');
        $result1 = $this->db->insert("advertisementpic", $columns1, $param1, $inputs1);

        if($result1){
            return true;
        }
        else{
            return false;
        };
    }

    function get_ad_id($id)
    {
        $adid = $this->db->select("AdvertisementID","donation_campaign","WHERE CampaignID =:id",':id',$id);
        return $adid[0]['AdvertisementID'];
    }

    function get_ad_det($adid)
    {
        $adcount = $this->db->select('*', "advertisement", "
        INNER JOIN advertisementpic
        ON advertisement.AdvertisementID = advertisementpic.AdvertisementID
        WHERE advertisement.AdvertisementID = :adid;", ':adid', $adid);
        return $adcount;
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
        $donation = $this->db->select("*","donor","INNER JOIN donor_bloodbank_bloodpacket on donor.UserID = donor_bloodbank_bloodpacket.DonorID  WHERE donor_bloodbank_bloodpacket.BloodBankID =:BloodBankID",':BloodBankID',$BloodBankID);
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
        $data = $this->db->select("*, MAX(donor_bloodbank_bloodpacket.date) as lastdate", "donor","LEFT JOIN donor_bloodbank_bloodpacket on donor.UserID = donor_bloodbank_bloodpacket.DonorID GROUP BY donor.UserID ORDER BY donor_bloodbank_bloodpacket.Date DESC",null);
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

    public function adddonationcamp($inputs1) 
    {

        
        $columns1 = array('DonorID','CampaignID','PacketID','Date','Complication');
        $param1 = array(':DonorID',':CampaignID',':PacketID',':Date',':Complication');
        $result1 = $this->db->insert("donor_campaign_bloodpacket", $columns1, $param1, $inputs1);

        if($result1){
            return true;
        }
        else{
            return false;
        };

    }

    public function getDonorID($nic)
    {
        $userID = $this->db->select("UserID","donor","WHERE nic =:nic",':nic',$nic);
        return $userID[0]['UserID'];
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

    public function acceptcamp($id)
    {
        $status = 1;
        $columns1 = array('Status');
        $param1 = array(':Status');
        $inputs1 = array($status);


        $result1 = $this->db->update("donation_campaign", $columns1, $param1, $inputs1,':id',$id,"WHERE CampaignID = :id");

        if($result1){
            return true;
        }
        else{
            return false;
        };
    }

    public function deleteadv($id)
    {
        $AdvertisementID = NULL;
        $columns1 = array('AdvertisementID');
        $param1 = array(':AdvertisementID');
        $inputs1 = array($AdvertisementID);


        $result1 = $this->db->update("donation_campaign", $columns1, $param1, $inputs1,':id',$id,"WHERE CampaignID = :id");

        if($result1){
            return true;
        }
        else{
            return false;
        };
    }

}