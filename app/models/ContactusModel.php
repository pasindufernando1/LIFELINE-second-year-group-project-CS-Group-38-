<?php

use LDAP\Result;

class ContactusModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getbanknames()
    {
        $data = $this->db->select(
            'BloodBankID,BloodBank_Name',
            'bloodbank',
            null,
            null
        );
        return $data;
    }

    public function getbankinfo($bankid)
    {
        $data = $this->db->select(
            '*',
            'bloodbank',
            'WHERE BloodBankID= :BloodBankID',
            ':BloodBankID',
            $bankid
        )[0];
        return $data;
    }

    public function getbloodbankcontact($bankid)
    {
        $data = $this->db->select(
            'ContactNumber',
            'bloodbankcontactnumber',
            'WHERE BloodBankID= :BloodBankID',
            ':BloodBankID',
            $bankid
        )[0];
        return $data;
    }
}
