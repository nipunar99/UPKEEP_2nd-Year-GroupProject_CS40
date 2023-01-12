<?php 

class User 
{
    use Model;

    protected $table = "users";

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
        $user = $this->first(['email' =>$email]);
        if($user){
            return $user;
        }else{
            return false;
        }
    }

    public function preprocess($data){
        $hashpw = password_hash($data['password'], PASSWORD_DEFAULT);
        unset($data['password']);
        $data['password'] = $hashpw;
        $this->insert($data);

    }

}
