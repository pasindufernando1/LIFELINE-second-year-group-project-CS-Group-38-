<?php

class InventoryModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllInventoryDetails()
    {
        $data = $this->db->select("*", "bank_inventory_categories","Null");
        // Take the blood bank name for each blood bank id and add it to the array
        foreach ($data as $key => $value) {
            $data[$key]['BloodBank_Name'] = $this->getBankName($value['BloodBankID']);
        }
        //Take the inventory type name and category for each inventory type id and add it to the array
        foreach ($data as $key => $value) {
            $data[$key]['Inventory_Name'] = $this->getInventoryTypeName($value['InventoryID']);
            $data[$key]['Inventory_Category'] = $this->getInventoryCategoryName($value['InventoryID']);
        }
        // print_r($data);die();
        return $data;
    }

    // Get the blood bank name for a given blood bank id
    public function getBankName($bank_id)
    {
        $data = $this->db->select("BloodBank_Name", "bloodbank", "WHERE BloodBankID = :BloodBankID", "BloodBankID", $bank_id);
        return $data[0]['BloodBank_Name'];
    }

    // Get the inventory type name for a given inventory type id
    public function getInventoryTypeName($inventory_type_id)
    {
        $data = $this->db->select("Name", "inventory", "WHERE InventoryID = :InventoryID", "InventoryID", $inventory_type_id);
        return $data[0]['Name'];
    }

    // Get the inventory category name for a given inventory type id
    public function getInventoryCategoryName($inventory_type_id)
    {
        $data = $this->db->select("Type", "inventory", "WHERE InventoryID = :InventoryID", "InventoryID", $inventory_type_id);
        return $data[0]['Type'];
    }

    public function getAllInventoryDonations()
    {
        $data = $this->db->select("*", "donation","WHERE DonationType = :Inventory","Inventory","Inventory");
        // Get the inventory category,quantity and date for each donation id and add it to the array
        foreach ($data as $key => $value) {
            $data[$key]['Inventory_Category'] = $this->getInventoryCatName($value['DonationID']);
            $data[$key]['Quantity'] = $this->getInventoryQuantity($value['DonationID']);
            $data[$key]['Date'] = $this->getInventoryDate($value['DonationID']);
        }
        // print_r($data);die();
        return $data;
    }

    // Get the inventory category name for a given donation id
    public function getInventoryCatName($donation_id)
    {
        $data = $this->db->select("Inventory_category", "inventory_donation", "WHERE DonationID = :DonationID", "DonationID", $donation_id);
        return $data[0]['Inventory_category'];
    }

    // Get the inventory quantity for a given donation id
    public function getInventoryQuantity($donation_id)
    {
        $data = $this->db->select("Quantity", "inventory_donation", "WHERE DonationID = :DonationID", "DonationID", $donation_id);
        return $data[0]['Quantity'];
    }

    // Get the inventory date for a given donation id
    public function getInventoryDate($donation_id)
    {
        $data = $this->db->select("Accepted_date", "inventory_donation", "WHERE DonationID = :DonationID", "DonationID", $donation_id);
        if($data[0]['Accepted_date'] == NULL)
            return "Pending";
        else
            return "Validated";
    }

}