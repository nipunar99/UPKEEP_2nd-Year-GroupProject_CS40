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
        'first_name' => [
            'alpha',
            'required',
        ],

        'last_name' => [
            'alpha',
            'required',
        ],

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

    public function getTechnicians($user_id){
        $query = "select u.user_id, u.first_name, u.last_name, c.latest_msg, c.time, c.owner_unread_count as 'unread_count' from users u INNER JOIN (SELECT * FROM conversation where owner_id=" . $user_id.") c  ON u.user_id = c.technician_id";
        return $this->query($query);
        }
   
    public function getItemowners($user_id){
        $query = "select u.user_id, u.first_name, u.last_name, c.latest_msg, c.time, c.technician_unread_count as 'unread_count' from users u INNER JOIN (SELECT * FROM conversation where technician_id=" . $user_id.") c  ON u.user_id = c.owner_id";
        return $this->query($query);
    }

    public function searchTechnicians($text){
        $query = "select u.user_id, u.first_name, u.last_name, c.latest_msg, c.time, c.owner_unread_count as 'unread_count' from users u INNER JOIN (SELECT * FROM conversation where owner_id=" . $_SESSION['user_id'].") c  ON u.user_id =  c.technician_id where u.first_name like '%".$text."%' OR u.last_name like '%".$text."%' ";
        // show($query);
        return $this->query($query);
    }
    public function searchOwners($text){
        $query = "select u.user_id, u.first_name, u.last_name, c.latest_msg, c.time, c.owner_unread_count as 'unread_count' from users u INNER JOIN (SELECT * FROM conversation where technician_id=" . $_SESSION['user_id'].") c  ON u.user_id =  c.owner_id where u.first_name like '%".$text."%' OR u.last_name like '%".$text."%' ";
        return $this->query($query);
    }

    public function resetUserReadCount($userCount,$technician,$owner){
        // $query = "select u.user_id, u.first_name, u.last_name, c.latest_msg, c.time, c.technician_unread_count as 'unread_count' from users u INNER JOIN (SELECT * FROM conversation where technician_id=" . $user_id.") c  ON u.user_id = c.owner_id";
        $query = "update conversation set ".$userCount." = 0 where technician_id=" . $technician." AND owner_id = " . $owner."";
        return $this->query($query);
    }

    public function getProfileDataForUser($user_id){
        if($_SESSION['user_role']!='technician'){
            $result = $this->where(['user_id' => $user_id]);
        }else{
            $query = "SELECT * FROM $this->table u 
                        INNER JOIN technicians t 
                        ON u.user_id = t.user_id 
                        WHERE u.user_id = :user_id";

            $result= $this->query($query,['user_id' => $user_id]);
        }
        return $result[0];
    }

    public function updateProfile($user_id,$data){
        $this->update($user_id,$data,'user_id');
        return $this->getProfileDataForUser($user_id);
    }

    public function hasProfilePicture($user_id){
        $profile_picture = $this->getColumns(['profile_picture'],['user_id' => $user_id]);
        if($profile_picture[0]->profile_picture == null){
            return false;
        }else{
            return $profile_picture[0]->profile_picture;
        }
    }

    public function removeProfilePicture($user_id){
        $this->update($user_id,['profile_picture' => null],'user_id');
    }

    public function validatePassword($user_id, $currentPassword)
    {
        $user = $this->getUserById($user_id);
        if (password_verify($currentPassword, $user->password)) {
            return true;
        } else {
            return false;
        }
    }

    public function validateNewPassword($newPassword, $confirmPassword)
    {
        if ($newPassword == $confirmPassword) {
            return true;
        } else {
            return false;
        }
    }

    public function getTechnicianById($user_id)
    {
        $query = "SELECT * FROM $this->table u 
                        INNER JOIN technicians t 
                        ON u.user_id = t.user_id 
                        WHERE u.user_id = :user_id";

        $result= $this->query($query,['user_id' => $user_id]);
        return $result[0];
    }
}
