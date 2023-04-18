<?php

class Dashboard{

    Use Controller;
    use Auth;

    public function index(){
        $this->technicianAuth();

        
        $this->view('Technician/dashboard');
            
    }

    public function sample(){
        $user = new User;
        $userDetails = json_encode($user->findAll());
        echo($userDetails);

    }

}