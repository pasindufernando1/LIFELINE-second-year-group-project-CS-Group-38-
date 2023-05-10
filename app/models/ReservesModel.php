<?php

class ReservesModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    // Function to get all the reserve details
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
        return $data;

    }

    // Function to filter out reserves according to type name
    public function filter_out($type_name)
    {
        // Get all the type Ids for a given type name
        $data = $this->db->select("TypeID", "bloodcategory", "WHERE Name = :Name", "Name", $type_name);

        // Get the type ids from the array
        $type_ids = array_column($data, 'TypeID');
        
        // For each type id get the reserve details as a single array
        $output = array();
        foreach ($type_ids as $key => $value) {
            $rows = $this->getReserveDetails($value);
            $output = array_merge($output,$rows);
        }
        return $output;
    }

    //Function to filter out reseves based on type name and subtype
    public function filter_out_subtypes($type_name,$subtype)
    {
        $columns = array(":Name",":Subtype");
        $values = array($type_name,$subtype);

        // Get all the type Ids for a given type name
        $data = $this->db->select("TypeID", "bloodcategory", "WHERE Name = :Name AND Subtype = :Subtype",$columns, $values);

        // Get the type ids from the array
        $type_ids = array_column($data, 'TypeID');
        
        // For each type id get the reserve details as a single array
        $output = array();
        foreach ($type_ids as $key => $value) {
            $rows = $this->getReserveDetails($value);
            $output = array_merge($output,$rows);
        }
        return $output;
    }

    
    //Function to get reserve details
    public function getReserveDetails($TypeId)
    {
        // Get all the reserve details for a given type id
        $data = $this->db->select("*", "bank_blood_categories", "WHERE TypeID = :TypeID", "TypeID", $TypeId);
        // For each bloodbankid take the bloodbank name and add it to the array
        foreach ($data as $key => $value) {
            $data[$key]['BloodBank_Details'] = $this->getBankDetails($value['BloodBankID']);
        }
        
        // For each TypeID take the Type name and add it to the array
        foreach ($data as $key => $value) {
            $data[$key]['Type_Name'] = $this->getTypeName($value['TypeID']);
            $data[$key]['Subtype'] = $this->getSubtypeName($value['TypeID']);
        }
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