<?php

class Findjobs{

    Use Controller;
    Use Auth;

    public function index(){
        $this->technicianAuth();
            
        $this->view('Technician/findjobs');
    }

}