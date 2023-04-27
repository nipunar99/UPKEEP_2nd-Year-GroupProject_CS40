<?php

class Findjobs
{

    use Controller;
    use Auth;

    public function index(){

        $this->technicianAuth();
        $this->view('Technician/findjobs');
        
    }
}
