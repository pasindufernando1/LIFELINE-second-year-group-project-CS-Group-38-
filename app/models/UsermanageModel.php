<?php

class UserManageModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function addSystemUser($inputs)
        
    {
        $columns = array('Name', 'Expiry_constraint', 'Storing_temperature');
        $param = array(':Name', ':Expiry_constraint', ':Storing_temperature');
        $result = $this->db->insert("bloodcategory", $columns, $param, $inputs);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }


}
