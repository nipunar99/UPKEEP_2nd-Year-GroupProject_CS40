<?php
class AddMod {

use Model;

protected $table ="moderators";

protected $allowedColumns = [
    "nic",
    "mod_name",
    "email",
    "password",
    "join_date",
    "address",
    "user_role",

    
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

}