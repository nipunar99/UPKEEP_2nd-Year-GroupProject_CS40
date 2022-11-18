<?php

class Dashboard{

    Use Controller;

    public function index(){
        $this->view('Technician/dashboard');
    }
}