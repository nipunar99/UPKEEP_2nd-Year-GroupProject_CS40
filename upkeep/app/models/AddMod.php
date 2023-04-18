<?php
class AddMod {

use Model;

protected $table ="moderators";

protected $allowedColumns = [
    "user_id",
    "user_name",
    "first_name",
    "last_name",
    "email",
    "password",
    "mobile_no",
    "account_status",
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

function get_table_data() {
    // Connect to the database 
    $conn = new mysqli("localhost", "", "", "upkeep"); 
    // Query the database 
    $result = $conn->query("SELECT * FROM moderators"); 
    // Close the connection 
    $conn->close(); 
    // Return the result
    return $result;
   }

}