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

    public function loginValidate($data){
        $this->errors =[];
        
        if(empty($data['email'])){
            $this->errors['email'] ="Email is required";
        }
        if(empty($data['password'])){
            $this->errors['password'] ="Password is required";
        }
        
        if(empty($this->errors)){

            return true;
        }

        return false;
    }

    public function registerValidate($data){
        $this->errors =[];

        if(empty($data['first_name']) || empty($data['last_name']) || empty($data['email']) || empty($data['password'])){
            $this->errors['register'] ="All fields are required";
        }

        if(!preg_match("/^[a-zA-Z ]*$/",$data['first_name'])){
            $this->errors['first_name'] ="Only letters and white space allowed";
        }

        if(!preg_match("/^[a-zA-Z ]*$/",$data['last_name'])){
            $this->errors['last_name'] ="Only letters and white space allowed";
        }

        if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] ="Email is not valid";
        }

        if(strlen($data['password']) < 6){
            $this->errors['password'] ="Password must be at least 6 characters";
        }
        elseif(!preg_match("#[0-9]+#",$data['password'])){
            $this->errors['password'] ="Password must contain at least 1 number";
        }elseif(!preg_match("#[A-Z]+#",$data['password'])){
            $this->errors['password'] ="Password must contain at least 1 capital letter";
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

    public function preprocess($data){
        $hashpw = password_hash($data['password'], PASSWORD_DEFAULT);
        unset($data['password']);
        $data['password'] = $hashpw;
        $this->insert($data);

    }

}
