<?php

class ReportsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllReportDetails()
    {
        // $data = $this->db->select("*", "bank_inventory_categories","Null");
        // // Take the blood bank name for each blood bank id and add it to the array
        // foreach ($data as $key => $value) {
        //     $data[$key]['BloodBank_Name'] = $this->getBankName($value['BloodBankID']);
        // }
        // //Take the inventory type name and category for each inventory type id and add it to the array
        // foreach ($data as $key => $value) {
        //     $data[$key]['Inventory_Name'] = $this->getInventoryTypeName($value['InventoryID']);
        //     $data[$key]['Inventory_Category'] = $this->getInventoryCategoryName($value['InventoryID']);
        // }
        // // print_r($data);die();
        // return $data;

        $data = $this->db->select("*", "report","Null");
        return $data;

    }

    
}