<?php

class Gigs{
    use Controller;

    public function index(){
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="technician"){
            redirect('/Home');
        }

        $gigs = new Gig;
        $gigList = $gigs->getGigsOfTechnician($_SESSION["user_id"]);
        $data['gigList']=$gigList;

        $this->view(('Technician/gigs'),$data);
    }
} 