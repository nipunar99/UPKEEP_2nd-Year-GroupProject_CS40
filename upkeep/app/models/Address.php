<?php

class Address
{

    use Model;
    protected $table = "address";

    public function getLastAddress(){
        $query = "select * FROM address where user_id  = ".$_SESSION['user_id']." ORDER BY address_id DESC LIMIT 1 ";
        return $this->query($query);
    }

}