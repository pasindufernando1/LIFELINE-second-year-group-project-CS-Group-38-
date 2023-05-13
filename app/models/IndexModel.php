<?php

class IndexModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAdvertisements()
    
    {
        $result = $this->db->select('*', 'advertisement','WHERE Archive = 0 ORDER BY PublishedDate ASC');
        for($i=0;$i<count($result);$i++){
            $bloodbank = $this->db->select('BloodBank_Name', 'bloodbank','WHERE BloodBankID = :BloodBankID',':BloodBankID',$result[$i]['BloodBankID']);  
            $result[$i]['BloodBank_Name'] = $bloodbank[0]['BloodBank_Name'];
        }
        return $result;
    }


}
