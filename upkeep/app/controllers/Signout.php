<?php

class Signout {

    use Controller;
    public function index (){
        
        if(!empty($_SESSION['USER']))
            unset($_SESSION['USER']);
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_role']);
            
        redirect("Home");
    }

}
