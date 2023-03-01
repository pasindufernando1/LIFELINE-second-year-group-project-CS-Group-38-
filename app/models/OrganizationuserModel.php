<?php


class OrganizationuserModel extends Model
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

    public function signupOrganization($inputs1,$inputs2,$inputs3) 
    {

        //Updating the user table
        $columns1 = array('Email','Password','Username','Userpic','UserType');
        $param1 = array(':Email',':Password',':Username',':Userpic',':UserType');
        $result1 = $this->db->insert("user", $columns1, $param1, $inputs1);


        //Updating the hospital/medical center table
        //Get the UserID from the last inserted user from the user table
        $UserID = $this->db->lastInsertId();
        array_unshift($inputs2, $UserID);

        $columns2 = array('UserID','Registration_no','Name','Number','LaneName','City','District','Province');
        $param2 = array(':UserID',':Registration_no',':Name',':Number',':LaneName',':City',':District',':Province');
        $result2 = $this->db->insert("organization_society", $columns2, $param2, $inputs2);

        //Updating the usercontactnumber table
        $columns3 = array('UserID', 'ContactNumber');
        $param3 = array(':UserID', ':ContactNumber');
        array_unshift($inputs3, $UserID);
        $result3 = $this->db->insert("usercontactnumber", $columns3, $param3, $inputs3);
        
        if($result1=="Success" && $result2=="Success" && $result3=="Success"){
            return true;
        }
        else{
            print_r($result1);
            print_r($result2);
            print_r($result3);
        }
    }
    
    public function checkMail($email)
    {
        $res = ($this->db->select('userID', "user", "WHERE email = :email;", ':email', $email));
        if(!empty($res)){
            return true;
        }
        else{
            return false;
        }

    }


    public function insertToken($email)
    {
        if ($this->db->select('UserID', "user", "WHERE email = :email;", ':email', $email) > 0) {
            $user_ID = $this->db->select("UserID","user","WHERE email =:email",':email',$email);
            $user_ID = $user_ID[0]['user_ID'];
            return $user_ID;

        
        } 

    }

    public function updatePassword($email, $pwd)
    {
        $passw = password_hash($pwd, PASSWORD_DEFAULT);
        $result = $this->db->update("user", "password", ":password", $passw, ':email', $email, "WHERE email = :email");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }


<<<<<<< Updated upstream
=======
    // public function view_campaign_info()
    // {
        
    //         $data = $this->db->select("Date,OrganizationUserID","donation_campaign","WHERE Status ='Accepted'");
            
    //         return $data;
        
        
    // }

    public function view_campaign_info()
    {
        
            $data = $this->db->select("Name,Date","donation_campaign","WHERE Status ='Accepted'");
            
            return $data;
        
        
    }
    

>>>>>>> Stashed changes
    
}
