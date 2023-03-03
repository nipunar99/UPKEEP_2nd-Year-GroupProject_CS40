<?php


class Getverified{

    Use Controller;
    Use Auth;

    public function index(){
        $this->technicianAuth();

        $this->view('Technician/getverified');
        
    }

}