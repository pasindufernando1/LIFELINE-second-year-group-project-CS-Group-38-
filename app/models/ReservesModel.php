<?php

class ReservesModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllReserveDetails()
    {
        // Get all the reserve details
        $data = $this->db->select("*", "bank_blood_categories","Null");
        // For each bloodbankid take the bloodbank name and add it to the array
        foreach ($data as $key => $value) {
            $data[$key]['BloodBank_Details'] = $this->getBankDetails($value['BloodBankID']);
        }
        
        // For each TypeID take the Type name and add it to the array
        foreach ($data as $key => $value) {
            $data[$key]['Type_Name'] = $this->getTypeName($value['TypeID']);
            $data[$key]['Subtype'] = $this->getSubtypeName($value['TypeID']);
        }
        // Print the blood bank name
        // print_r($data[0]['BloodBank_Details']['BloodBank_Name']);die();
        return $data;

    }

    // Get the blood bank name,district,province for a given blood bank id
    public function getBankDetails($bank_id)
    {
        $data = $this->db->select("BloodBank_Name,District,Province", "bloodbank", "WHERE BloodBankID = :BloodBankID", "BloodBankID", $bank_id);
        // return as an array
        return $data[0];

    }

    // Get the blood type name for a given blood type id
    public function getTypeName($type_id)
    {
        $data = $this->db->select("Name", "bloodcategory", "WHERE TypeID = :TypeID", "TypeID", $type_id);
        return $data[0]['Name'];
    }

    // Get the blood subtype name for a given blood type id
    public function getSubtypeName($type_id)
    {
        $data = $this->db->select("Subtype", "bloodcategory", "WHERE TypeID = :TypeID", "TypeID", $type_id);
        return $data[0]['Subtype'];
    }

    
}