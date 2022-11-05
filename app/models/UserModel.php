<?php


class UserModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function authenticate($name, $pwd)
    {
        if ($this->db->select('count', "users", "WHERE name = :name;", ':name', $name) > 0) {
            $hashed = $this->db->select("password", "users", "WHERE name = :name ;", ':name', $name);

            if (password_verify($pwd, $hashed[0]['password'])) {
                return true;
            } else return false;
        
        } else return false;
    
    }
    public function gettype($name)
    {
        if ($this->db->select('count', "users", "WHERE name = :name;", ':name', $name) > 0) {
            $type = $this->db->select("type","users","WHERE name =:name",':name',$name);
            $type_of_user = $type[0]['type'];
            return $type_of_user;
        
        } 
    }

    
}
