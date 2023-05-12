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

    protected $validationRules = [

        'email' => [
            'email',
            'unique',
            'required',
        ],
        'username' => [
            'alpha',
            'required',
        ],
        'password' => [
            'not_less_than_8_chars',
            'required',
        ],
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
        $user = $this->first(['email' =>$email]);
        if($user){
            return $user;
        }else{
            return false;
        }
    }

    public function getUserById($id){
        $user = $this->first(['user_id' =>$id]);
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

    public function countAllWhereUserName($username){
        $query = "SELECT COUNT(*) FROM $this->table WHERE user_name = '$username'";

        $this->query($query);

    }

    public function generateUserName($first_name,$last_name){
        $user_name = lcfirst($first_name).lcfirst($last_name);
        $n=$this->countAllWhereUserName($user_name);
        $user_name=$user_name.$n;
        return $user_name;
    }


//Moderator functions
    

    public function getTotalUser(){
        //$query ="SELECT COUNT(*) AS count FROM users WHERE user_role =:user_role1 OR user_role=:user_role2;";
        $query2 ="SELECT user_role, COUNT(user_role) AS count FROM users GROUP BY user_role";
        $data['user_role1']='item_owner';
        $data['user_role2']='technician';
        $bb = $this->query($query2);

        return $bb;



    }

    public function getVerifyTechnician(){
        $query = "Select u.user_id, u.first_name, u.last_name, u.email, t.identity_verification from users u INNER JOIN technicians t ON u.user_id=t.user_id  Where user_role =:user_role";
        $data['user_role']='technician';
        $aa = $this->query($query,$data);
        return $aa;
    }

    public function getBannedAcc(){
        //$query ="SELECT COUNT(*) AS count FROM users WHERE user_role =:user_role1 OR user_role=:user_role2;";
        $query ="SELECT account_status, COUNT(account_status) AS count FROM users GROUP BY account_status";
        $data['account_status']='banned';
        
        $cc = $this->query($query);

        return $cc;



    }
    public function getAllModerators(){
        $query = "Select u.user_id, u.first_name, u.last_name, u.email, u.mobile_no, au.address from users u INNER JOIN administrative_users au ON u.user_id=au.user_id  Where user_role =:user_role";
        $data['user_role']='moderator';
        // $abc =$this->query($query,$data);
        // return $abc;


        // $query = "Select u.*, m.nic, m.address from users u INNER JOIN moderators m ON u.user_id=m.user_id  Where user_role =:user_role";
        // $data['user_role']='moderator';
        $aa = $this->query($query,$data);
        return $aa;
}

    public function getAllAdmin(){
        $query = "Select u.user_id, u.first_name, u.last_name, u.user_name, u.email, u.mobile_no, u.registered_date, u.user_role, au.address, au.nic from users u INNER JOIN administrative_users au ON u.user_id=au.user_id  Where user_role =:user_role or user_role =:user_role1";

        // $query = "SELECT * FROM users WHERE user_role =:user_role or user_role =:user_role1";
        $data['user_role']='admin';
        $data['user_role1']='moderator';
        return $this->query($query,$data);
        
    }

    // public function insertModerator(){
    //     $query = "INSERT INTO user"
    // }

    public function getTotalTechnician(){
        //$query ="SELECT COUNT(*) AS count FROM users WHERE user_role =:user_role1 OR user_role=:user_role2;";
        $query2 ="SELECT user_role, COUNT(user_role) AS count FROM users GROUP BY user_role";
        $data['user_role']='technician';
        return $this->query($query2);



    }
    
    public function getTotalItemOwners(){
        //$query ="SELECT COUNT(*) AS count FROM users WHERE user_role =:user_role1 OR user_role=:user_role2;";
        $query2 ="SELECT user_role, COUNT(user_role) AS count FROM users GROUP BY user_role";
        $data['user_role']='item_owner';
        return $this->query($query2);;



    }

    public function getTotalAdministrativeUser(){
        //$query ="SELECT COUNT(*) AS count FROM users WHERE user_role =:user_role1 OR user_role=:user_role2;";
        $query ="SELECT user_role, COUNT(user_role) AS count FROM users GROUP BY user_role";
        $data['user_role1']='admin';
        $data['user_role2']='moderator';
        return $this->query($query);



    }

    public function getTotalAdmin(){
        //$query ="SELECT COUNT(*) AS count FROM users WHERE user_role =:user_role1 OR user_role=:user_role2;";
        $query ="SELECT user_role, COUNT(user_role) AS count FROM users GROUP BY user_role";
        $data['user_role']='admin';
        return $this->query($query);



    }

    public function getTotalModerator(){
        //$query ="SELECT COUNT(*) AS count FROM users WHERE user_role =:user_role1 OR user_role=:user_role2;";
        $query ="SELECT user_role, COUNT(user_role) AS count FROM users GROUP BY user_role";
        $data['user_role']='moderator';
        return $this->query($query);



    }

    // public function updateAdmin(){
    //     $query = "UPDATE users JOIN administrative_users ON users.first_name"
    // }
}
