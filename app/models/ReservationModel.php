<?php


class ReservationModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }


    public function addReserve($inputs)
        
    {
        $columns = array('quantity', 'TypeID', 'Status');
        $param = array(':quantity', ':TypeID', ':Status');
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
        $data = $this->db->select("*", "bloodcategory",null);
        return $data;
    }

    public function getAllPackets()
    {
        $packets = $this->db->select("*","bloodpacket","INNER JOIN bloodcategory on bloodcategory.TypeID = bloodpacket.TypeID");
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
        $columns = array('Name', 'Storing_temperature', 'Expiry_constraint');
        $param = array(':Name', ':Storing_temperature', ':Expiry_constraint');
        $result = $this->db->insert("bloodcategory", $columns, $param, $inputs);
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
}