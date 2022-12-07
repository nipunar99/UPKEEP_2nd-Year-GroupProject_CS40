<?php 

class User 
{
    use Model;

    protected $table = "admin";

    protected $allowedColumns = [
        "first_name",
        "last_name",
        "email",
        "password",
    ];

    public function validate($data){
        $this->errors =[];
        
        if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] ="Email is not valid";
        }
        
        if(empty($this->errors)){

            return true;
        }

        return false;
    }

    public function getUserByEmail($email){
        $admin = $this->first(['email'=>$email]);
        if($admin){
            return $admin;
        }else{
            return false;
        }
    }

}
