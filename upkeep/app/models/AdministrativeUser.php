<?php 

class AdministrativeUser 
{
    use Model;

    protected $table = "administrative_users";

    protected $allowedColumns = [
        "nic",
        "address",
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


    public function getAllModerators(){
        $query = "Select * from administrative_users Where account_status =:account_status" ;
        $data['account_status']='active';
        // $abc =$this->query($query,$data);
        // return $abc;


        // $query = "Select u.*, m.nic, m.address from users u INNER JOIN moderators m ON u.user_id=m.user_id  Where user_role =:user_role";
        // $data['user_role']='moderator';
        $aa = $this->query($query,$data);
        return $aa;
}

    public function insertModerator($data){
        $this->insert($data);
    }

}
?>
