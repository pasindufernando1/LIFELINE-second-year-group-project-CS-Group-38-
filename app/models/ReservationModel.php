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

    public function getCountReservationId()
    {
        $countReservation = $this->db->select("*", "reservation",null);
        
    }

    public function getCountTypeID()
    {
        $countTypeID = $this->db->select("*", "bloodcategory",null);
        
    }

    public function addReserveTypes($inputs)
        
    {
        $columns = array('Name', 'Expiry_constraint', 'Storing_temperature');
        $param = array(':Name', ':Expiry_constraint', ':eStoring_temperature');
        $result = $this->db->insert("bloodcategory", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }
}