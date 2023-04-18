<?php

class Dashboard{

    Use Controller;
    use Auth;

    public function index(){
        $this->technicianAuth();

        $this->view('Technician/dashboard');
            
    }

    

}