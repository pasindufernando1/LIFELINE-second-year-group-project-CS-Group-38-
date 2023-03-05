<?php


class ValidationModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function findByEmail($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            
            return true;
        
        } else return false;
    
    }

    public function findByRegno($regno)
    {
        if ($this->db->select('count', "hospital_medicalcenter", "WHERE Registration_no = :Registration_no;", ':Registration_no', $regno) > 0) {
            
            return true;
        
        } else return false;
    
    }

    public function findByOrgRegno($orgregno)
    {
        if ($this->db->select('count', "organization_society", "WHERE Registration_no = :Registration_no;", ':Registration_no', $orgregno) > 0) {
            
            return true;
        
        } else return false;
    
    }
}