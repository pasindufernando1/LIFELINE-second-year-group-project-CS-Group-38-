<?php

use LDAP\Result;

class ContactusModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getbb()
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
        // print_r($data);
        // die();
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

    public function getbloodbankreserves($bankid, $btype)
    {
        $typeids = $this->db->select(
            'TypeID',
            'bloodcategory',
            'WHERE Name= :Name',
            ':Name',
            $btype
        );

        // print_r($typeids);
        // die();


        $total_packets = 0;

        foreach ($typeids as $typeid) {
            // print_r($typeid['TypeID'] . '\n');
            $data = $this->db->select(
                'COUNT(*) as total_packets',
                'bloodpacket',
                'WHERE blood_bank_ID= :blood_bank_ID AND TypeID= :TypeID',
                [':blood_bank_ID', ':TypeID'],
                [$bankid, $typeid['TypeID']]
            )[0];
            // print_r($data['total_packets']);
            $total_packets += $data['total_packets'];
        }
        // die();
        return $total_packets;


        // return $data;
    }
}