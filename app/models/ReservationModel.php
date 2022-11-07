<?php


class ReservationModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }


    public function addReserve($inputs)
        
    {
        $columns = array('blood_group', 'quantity', 'expiry_constraints');
        $param = array(':blood_group', ':quantity', ':expiry_constraints');
        $result = $this->db->insert("reservation", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }
    public function getAllTypes()
    {
        $data = $this->db->select("*", "bloodcategory",null);
        return $data;
    }

    public function getCountReservationId()
    {
        $countReservation = $this->db->select("*", "reservation",null);
        
    }

    public function getMaxTypeID()
    {
        $MaxTypeID = $this->db->select("MAX(TypeID)", "bloodcategory",null);
        return ($MaxTypeID[0]['MAX(TypeID)']);
        
    }

    public function addReserveTypes($inputs)
        
    {
        $columns = array('Name', 'Expiry_constraint', 'Storing_temperature');
        $param = array(':Name', ':Expiry_constraint', ':Storing_temperature');
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
}