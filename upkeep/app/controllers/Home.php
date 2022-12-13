<?php

class Home {

    use Controller;
    public function index (){
        

        if(!isset($_SESSION['user_name'])){
            $this->view('home');
        }
        else{
            $userRole = $_SESSION['user_role'];
            redirect($userRole.'/Dashboard');
        }

    }
    
}
