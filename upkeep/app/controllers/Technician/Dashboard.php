<?php

class Dashboard{

    Use Controller;



    public function index(){
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="technician"){
            redirect('/Home');
        }else{
            show($_SESSION);
            $this->view('Technician/dashboard');
        }    
    }

}