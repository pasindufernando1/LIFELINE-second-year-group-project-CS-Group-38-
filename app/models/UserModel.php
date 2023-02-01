<?php


class UserModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function authenticate($email, $pwd)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $hashed = $this->db->select("password", "user", "WHERE email = :email ;", ':email', $email);

            if (password_verify($pwd, $hashed[0]['password'])) {
                return true;
            } else return false;
        
        } else return false;
    
    }

    public function getUserName($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $user_name = $this->db->select("username","user","WHERE email =:email",':email',$email);
            $name_user = $user_name[0]['username'];
            return $name_user;

        
        } 

    }

    public function gettype($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $type = $this->db->select("usertype","user","WHERE email =:email",':email',$email);
            $type_of_user = $type[0]['usertype'];
            return $type_of_user;
        
        } 
    }
    public function getBloodBankName($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $bloodbankname = $this->db->select("BloodBank_Name","bloodbank","INNER JOIN system_user on system_user.BloodBankID = bloodbank.BloodBankID  INNER JOIN user on user.UserID = system_user.UserID WHERE user.email =:email",':email',$email);
            $blood_bank_name = $bloodbankname[0]['BloodBank_Name'];
            return $blood_bank_name;
        
        } 

    }

    public function getuserimg($email)
    {
        if ($this->db->select('count', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $type = $this->db->select("userpic","user","WHERE email =:email",':email',$email);
            $user_pic = $type[0]['userpic'];
            return $user_pic;
        
        } 
    }

    
}
