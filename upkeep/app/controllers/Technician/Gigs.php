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

    public function addgig()
    {
        $gig = new Gig;
        //print_r($_POST);

        $gig->createGig($_POST,$_SESSION['user_id']);
        redirect("/Technician/Gigs");

            // $user->errors["email"] = "email or password not valid";
            // $data["errors"]= $user->errors;
        
    }

    public function viewGig($id){
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="technician"){
            redirect('/Home');
        }

        $gig = new Gig;
        // $gigDetails = $gig->getGig($id);
        // $data['gigDetails']=$gigDetails;

        $this->view(('Technician/singlegig'));
    }
} 

$init = new Gigs;

if($_SERVER['REQUEST_METHOD']=="POST"){
    $init->addgig();
}