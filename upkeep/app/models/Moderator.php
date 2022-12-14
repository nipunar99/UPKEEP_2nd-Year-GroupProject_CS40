<?php 

class Moderator 
{
    use Model;

    protected $table = "moderators";

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
        $user = $this->first(['email'=>$email]);
        if($user){
            return $user;
        }else{
            return false;
        }
    }


}
