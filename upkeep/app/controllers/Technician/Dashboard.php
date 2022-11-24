<?php

class Dashboard{

    Use Controller;



    public function index(){
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="technician"){
            redirect('/Home');
        }

        $this->view('Technician/dashboard');
    }

}