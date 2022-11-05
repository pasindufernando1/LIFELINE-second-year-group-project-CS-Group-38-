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
}