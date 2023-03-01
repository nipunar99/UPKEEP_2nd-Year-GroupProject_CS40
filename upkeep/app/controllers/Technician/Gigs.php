<?php

class Gigs{
    use Controller;

    public static $enter = 0;

    public function index(){
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="technician"){
            redirect('/Home');
        }


        $gigs = new Gig;
        $gigList = $gigs->getGigsOfTechnician($_SESSION["user_id"]);
        $data['gigList']=$gigList;
        $this->view(('Technician/gigs'),$data);

    }

    public function addgig()
    {
        echo "came to controller".Gigs::$enter;
        $gigs = new Gig;
        $gigs->createGig($_POST,$_SESSION["user_id"]);
        
    }

    public function viewGig($id){
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="technician"){
            redirect('/Home');
        }

        $gig = new Gig;
        $profile = new User;
        $gigDetails = $gig->getGig($id);
        $profileDetails = $profile->getUserById($gigDetails[0]->user_id);

  
        $data['gigDetails']=$gigDetails;
        $data['profileDetails']=$profileDetails;
    
 
        $this->view('Technician/singlegig',$data);
    }
} 
