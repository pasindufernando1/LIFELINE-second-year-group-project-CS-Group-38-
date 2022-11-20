<?php


class AdminuserModel extends Model
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
    

    
}
