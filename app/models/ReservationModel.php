<?php


class ReservationModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }


    public function addReserve($inputs)
        
    {
        $columns = array('quantity', 'TypeID', 'Status' , 'blood_bank_ID');
        $param = array(':quantity', ':TypeID', ':Status' ,':blood_bank_ID');
        $result = $this->db->insert("bloodpacket", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function editReserve($reserve_id, $inputs)
    {
        $_SESSION['reserve_id'] = $reserve_id;
        $columns = array('quantity', 'TypeID', 'Status');
        $param = array(':quantity', ':TypeID', ':Status');
        $result = $this->db->update("bloodpacket", $columns, $param, $inputs, ':reserve_id', $reserve_id, "WHERE packetID = :reserve_id;");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }
    public function getAllTypes()
    {
        $data = $this->db->select("*", "bloodcategory" ,null);
        return $data;
    }

    public function getAllPackets($blood_bank_id)
    {
        $packets = $this->db->select("*","bloodpacket","
        INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID 
        WHERE bloodpacket.blood_bank_ID =:blood_bank_ID 
        AND bloodpacket.Quantity IS NOT NULL 
        ORDER BY bloodpacket.PacketID DESC"
        ,':blood_bank_ID',$blood_bank_id);
        return $packets;
    }

    public function getMaxPacketID()
    {
        $MaxPacketID = $this->db->select("MAX(PacketID)", "bloodpacket",null);
        return ($MaxPacketID[0]['MAX(PacketID)']);
        
    }

    public function getTypeIDFromName($bloodtype)
    {
        $TypeIDFromName = $this->db->select("TypeID","bloodcategory","WHERE  Name = :bloodtype",':bloodtype',$bloodtype);
        return $TypeIDFromName[0]['TypeID'];
    }

    public function getMaxTypeID()
    {
        $MaxTypeID = $this->db->select("MAX(TypeID)", "bloodcategory",null);
        return ($MaxTypeID[0]['MAX(TypeID)']);
        
    }

    public function addReserveTypes($inputs)
        
    {
        $columns = array('Name', 'Storing_temperature', 'Expiry_constraint' , 'blood_bank_ID');
        $param = array(':Name', ':Storing_temperature', ':Expiry_constraint', ':blood_bank_ID');
        $result = $this->db->insert("bloodcategory", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function deleteReserve($type_id)
    {
        $result = $this->db->delete("bloodpacket", "WHERE  PacketID = :type_id ;", ':type_id', $type_id);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    
    }


    function deleteReserveTypes($type_id)
    {
        $result = $this->db->delete("bloodcategory", "WHERE  TypeID = :type_id ;", ':type_id', $type_id);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    
    }

    function editReserveTypes($type_id, $inputs)
    {
        $_SESSION['type_id'] = $type_id;
        $columns = array('Name', 'Storing_temperature', 'Expiry_constraint');
        $param = array(':Name', ':Storing_temperature', ':Expiry_constraint');
        $result = $this->db->update("bloodcategory", $columns, $param, $inputs, ':type_id', $type_id, "WHERE TypeID = :type_id;");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    public function getBloodBankid($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $bloodbankid = $this->db->select("BloodBankID","system_user","INNER JOIN user on user.userID = system_user.userID WHERE user.email =:email",':email',$email);
            $blood_bank_id = $bloodbankid[0]['BloodBankID'];
            return $blood_bank_id;
        
        } 

    }

    public function getfullcount($blood_bank_id)
    {
        $count = $this->db->select("CONCAT(name, ' ', subtype) AS type,SUM(quantity) as totalquantity,COUNT(Subtype)","bloodpacket","INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID WHERE bloodpacket.blood_bank_id =:blood_bank_id AND bloodpacket.Quantity IS NOT NULL  GROUP BY Subtype,name",':blood_bank_id',$blood_bank_id);
        
        return $count;
        
    }

    public function getAllPacks($blood_bank_id)
    {
        $pack = $this->db->select("*","donor_bloodbank_bloodpacket","INNER JOIN bloodpacket on donor_bloodbank_bloodpacket.PacketID = bloodpacket.PacketID INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID WHERE bloodpacket.blood_bank_ID =:blood_bank_ID ",':blood_bank_ID',$blood_bank_id);
        return $pack;
    }

    public function  changeStatus($packetID)
    {
        $status = 2;
        $columns = array('Status');
        $param = array(':Status');
        $inputs = array($status);
        $result = $this->db->update("bloodpacket", $columns, $param, $inputs, ':packetID', $packetID, "WHERE packetID = :packetID;");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    public function getAllExpiredPacks($blood_bank_id)
    {
        $pack = $this->db->select("*","donor_bloodbank_bloodpacket","
        INNER JOIN bloodpacket on donor_bloodbank_bloodpacket.PacketID = bloodpacket.PacketID 
        INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID 
        WHERE bloodpacket.blood_bank_ID =:blood_bank_ID 
        AND bloodpacket.status = 2
        ORDER BY bloodpacket.PacketID DESC"
        ,':blood_bank_ID',$blood_bank_id);
        return $pack;
    }

    public function getAllExpiredPacksCount($blood_bank_id)
    {
        $pack = $this->db->select("CONCAT(name, ' ', subtype) AS type,SUM(quantity) as totalquantity","bloodcategory","LEFT OUTER JOIN bloodpacket on bloodpacket.TypeID = bloodcategory.TypeID WHERE bloodpacket.blood_bank_id =:blood_bank_id AND Status = 2 GROUP BY Subtype,name",':blood_bank_id',$blood_bank_id);
        return $pack;

    }

    public function getfiltertype($type,$blood_bank_id)
    {
        $params = array(':type',':blood_bank_ID');
        $inputs = array($type,$blood_bank_id);
        $pack = $this->db->select("*","donor_bloodbank_bloodpacket","INNER JOIN bloodpacket on donor_bloodbank_bloodpacket.PacketID = bloodpacket.PacketID INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID WHERE bloodpacket.blood_bank_ID =:blood_bank_ID AND bloodpacket.status = 2 AND bloodcategory.Name = :type",$params,$inputs);
        return $pack;
    }

    public function getfiltertypeRes($type,$blood_bank_id)
    {
        $params = array(':type',':blood_bank_ID');
        $inputs = array($type,$blood_bank_id);
        $pack = $this->db->select("*","donor_bloodbank_bloodpacket","INNER JOIN bloodpacket on donor_bloodbank_bloodpacket.PacketID = bloodpacket.PacketID INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID WHERE bloodpacket.blood_bank_ID =:blood_bank_ID  AND bloodcategory.Name = :type",$params,$inputs);
        return $pack;
    }

    public function getfiltertypes($type,$blood_bank_id,$subtype)
    {
        $params = array(':type',':blood_bank_ID','subtype');
        $inputs = array($type,$blood_bank_id,$subtype);
        $pack = $this->db->select("*","donor_bloodbank_bloodpacket","INNER JOIN bloodpacket on donor_bloodbank_bloodpacket.PacketID = bloodpacket.PacketID INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID WHERE bloodpacket.blood_bank_ID =:blood_bank_ID AND bloodpacket.status = 2 AND bloodcategory.Name = :type AND bloodcategory.subtype = :subtype",$params,$inputs);
        return $pack;
    }

    public function getfiltertypesRes($type,$blood_bank_id,$subtype)
    {
        $params = array(':type',':blood_bank_ID','subtype');
        $inputs = array($type,$blood_bank_id,$subtype);
        $pack = $this->db->select("*","donor_bloodbank_bloodpacket","INNER JOIN bloodpacket on donor_bloodbank_bloodpacket.PacketID = bloodpacket.PacketID INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID WHERE bloodpacket.blood_bank_ID =:blood_bank_ID  AND bloodcategory.Name = :type AND bloodcategory.subtype = :subtype",$params,$inputs);
        return $pack;
    }

    public function getAllNullQuantity($blood_bank_id)
    {
        $pack = $this->db->select("*","donor_bloodbank_bloodpacket","
        INNER JOIN bloodpacket on donor_bloodbank_bloodpacket.PacketID = bloodpacket.PacketID 
        INNER JOIN donor on donor.UserID = donor_bloodbank_bloodpacket.DonorID 
        WHERE bloodpacket.blood_bank_ID =:blood_bank_ID 
        AND Quantity IS NULL GROUP BY bloodpacket.PacketID
        ORDER BY bloodpacket.PacketID"
        ,':blood_bank_ID',$blood_bank_id);
        return $pack;
    }

    public function updateQuantity($packID,$subtype,$quantity)
    {
        $columns = array('Quantity');
        $params = array(':quantity');
        $inputs = array($quantity);

        $para = array(':packID', ':subgroup');
        $inp = array($packID,$subtype);

         $result = $this->db->update("bloodpacket", $columns, $params, $inputs,$para, $inp, "WHERE PacketID = :packID AND Sub_PacketID = :subgroup;");
        if ($result == "Success") {
            return true;
        } else print_r($result);


    }

    public function getfullcounts($blood_bank_id)
    {
        $count = $this->db->select("name,subtype,SUM(quantity) as totalquantity,COUNT(Subtype)","bloodpacket","INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID WHERE bloodpacket.blood_bank_id =:blood_bank_id AND bloodpacket.Quantity IS NOT NULL  GROUP BY Subtype,name",':blood_bank_id',$blood_bank_id);
        
        return $count;
        
    }

     public function checkTotalTableCount($type_id,$blood_bank_id) 
    {
        $params = array(':type_id',':blood_bank_id');
        $inputs = array($type_id,$blood_bank_id);
        $pack = $this->db->select("count","bank_blood_categories","
        WHERE TypeID =:type_id 
        AND BloodBankID = :blood_bank_id",$params,$inputs);
        return $pack;
    }

     public function getTypeId($name,$sub) 
    {
        $params = array(':name',':sub');
        $inputs = array($name,$sub);
        $pack = $this->db->select("*","bloodcategory","
        WHERE Name =:name 
        AND Subtype = :sub",$params,$inputs);
        return $pack;
    }

    public function addTotalTableCount($type_id,$blood_bank_id,$quantity)
        
    {
        $columns = array('BloodBankID', 'TypeID', 'Quantity');
        $param = array(':BloodBankID', ':TypeID', ':Quantity');
        $inputs =  array($blood_bank_id,$type_id,$quantity);
        $result = $this->db->insert("bank_blood_categories", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    public function updateTotalTableCount($type_id,$blood_bank_id,$quantity)
        
    {        
        $columns = array('Quantity');
        $params = array(':Quantity');
        $inputs = array($quantity);

        $para = array(':BloodBankID', ':TypeID');
        $inp = array($blood_bank_id,$type_id);
    
        $result = $this->db->update("bank_blood_categories", $columns, $params, $inputs,$para, $inp, "
        WHERE BloodBankID = :BloodBankID 
        AND TypeID = :TypeID;");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

}