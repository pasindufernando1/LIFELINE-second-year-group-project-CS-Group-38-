<?php

class blood_requestsModel extends Model
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

    public function getAllRequests($BloodBankID)
    {
        $req = $this->db->select("*","hospital_blood_requests","
        INNER JOIN hospital_medicalcenter 
        ON hospital_blood_requests.HospitalID = hospital_medicalcenter.UserID 
        WHERE hospital_blood_requests.BloodBankID =:BloodBankID",':BloodBankID',$BloodBankID);
        return $req;
    }

    public function getfiltertype($group,$blood_bank_id,$start,$end)
    {
        $param1 = array(':group',':blood_bank_id',':start',':end');
        $inputs1 = array($group,$blood_bank_id,$start,$end);
        $req = $this->db->select("*","hospital_blood_requests","
        INNER JOIN hospital_medicalcenter 
        ON hospital_blood_requests.HospitalID = hospital_medicalcenter.UserID 
        WHERE hospital_blood_requests.BloodBankID =:blood_bank_id
        AND hospital_blood_requests.Blood_group =:group
        AND hospital_blood_requests.Date_requested >= :start
        AND hospital_blood_requests.Date_requested <= :end
        "
        
        ,$param1,$inputs1
        
        );
        return $req;
    }
    public function getfiltertypes($group,$blood_bank_id,$sub,$start,$end)
    {
        $param1 = array(':group',':blood_bank_id',':sub',':start',':end');
        $inputs1 = array($group,$blood_bank_id,$sub,$start,$end);
        $req = $this->db->select("*","hospital_blood_requests","
        INNER JOIN hospital_medicalcenter 
        ON hospital_blood_requests.HospitalID = hospital_medicalcenter.UserID 
        WHERE hospital_blood_requests.BloodBankID =:blood_bank_id
        AND hospital_blood_requests.Blood_group =:group
        AND hospital_blood_requests.Blood_component =:sub
        AND hospital_blood_requests.Date_requested >= :start
        AND hospital_blood_requests.Date_requested <= :end
        "
        
        ,$param1,$inputs1
        
        );
        return $req;
    }

    public function getRequest($ID)
    {
        $req = $this->db->select("*","hospital_blood_requests","
        INNER JOIN hospital_medicalcenter 
        ON hospital_blood_requests.HospitalID = hospital_medicalcenter.UserID 
        INNER JOIN user
        ON hospital_medicalcenter.UserID = user.UserID
        INNER JOIN usercontactnumber 
        ON user.UserID = usercontactnumber.UserID
        WHERE hospital_blood_requests.RequestID =:ID",':ID',$ID);
        return $req;
    }

    public function getQuantity($group,$component)
    {
        $param1 = array(':group',':component');
        $inputs1 = array($group,$component);
        $quan = $this->db->select("SUM(Quantity) AS sumquan","bloodpacket","
        INNER JOIN bloodcategory 
        ON bloodcategory.TypeID = bloodpacket.TypeID 
        WHERE bloodcategory.Name =:group AND
        bloodcategory.Subtype =:component AND
        bloodpacket.Status = 1
        ",$param1,$inputs1);
        return $quan[0][0];
    }

    public function getAllPacks($group,$component)
    {
        $param1 = array(':group',':component');
        $inputs1 = array($group,$component);
        $pack = $this->db->select("*","bloodpacket","
        INNER JOIN bloodcategory 
        ON bloodcategory.TypeID = bloodpacket.TypeID 
        INNER JOIN donor_bloodbank_bloodpacket 
        ON donor_bloodbank_bloodpacket.PacketID = bloodpacket.PacketID 
        WHERE bloodcategory.Name =:group AND
        bloodcategory.Subtype =:component AND
        bloodpacket.Status = 1
        ORDER BY donor_bloodbank_bloodpacket.Date ASC
        ",$param1,$inputs1);
        return $pack;
    }

    public function changeStatus($pid,$sub)
    {
        $status = 3;
        $columns1 = array('Status');
        $param1 = array(':Status');
        $inputs1 = array($status);

        $param2 = array(':pid',':sub');
        $inputs2 = array($pid,$sub);

        $result1 = $this->db->update("bloodpacket", $columns1, $param1, $inputs1,$param2,$inputs2,"WHERE PacketID = :pid AND Sub_packetID = :sub ");

        if($result1){
            return true;
        }
        else{
            return false;
        };
    }

    public function changeDate($id,$date)
    {
        $columns1 = array('Date_accepted');
        $param1 = array(':date');
        $inputs1 = array($date);

        $result1 = $this->db->update("hospital_blood_requests", $columns1, $param1, $inputs1,':id',$id,"WHERE RequestID = :id ");

        if($result1){
            return true;
        }
        else{
            return false;
        };
    }

    public function changeStatusR($id)
    {
        $Status = 2;

        $columns1 = array('Status');
        $param1 = array(':Status');
        $inputs1 = array($Status);

        $result1 = $this->db->update("hospital_blood_requests", $columns1, $param1, $inputs1,':id',$id,"WHERE RequestID = :id ");

        if($result1){
            return true;
        }
        else{
            return false;
        };
    }

}