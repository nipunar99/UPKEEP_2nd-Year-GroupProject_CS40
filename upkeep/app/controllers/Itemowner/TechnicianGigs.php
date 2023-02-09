<?php

class TechnicianGigs {

    use Controller;
    // public function index (){
        
    //     if($_SESSION['USER'] == $_SESSION['user_id']){
    //         $this->view('Itemowner/technicianGigs');
    //     }else{
    //         redirect("Home/home");
    //     }

    // }

    public function index(){
        // if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="technician"){
        //     redirect('/Home');
        // }

        if($_SESSION['USER'] == $_SESSION['user_id']){

            // $this->view('Itemowner/technicianGigs');
            $gigs = new Gig;
            // $gigList = $gigs->getGigsOfTechnician($_SESSION["user_id"]);
            $gigList = $gigs->findAll();
            $data['gigList']=$gigList;
            $this->view(('Itemowner/technicianGigs'),$data);

        }else{
            redirect("Home/home");
        }

        
    }

    // public function addgig()
    // {
    //     $gig = new Gig;
    //     //print_r($_POST);

    //     $gig->createGig($_POST,$_SESSION['user_id']);
    //     redirect("/Technician/Gigs");

    //         // $user->errors["email"] = "email or password not valid";
    //         // $data["errors"]= $user->errors;
        
    // }

    // public function viewGig($id){
    //     if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="technician"){
    //         redirect('/Home');
    //     }

    //     $gig = new Gig;
    //     $profile = new User;
    //     $gigDetails = $gig->getGig($id);
    //     $profileDetails = $profile->getUserById($gigDetails[0]->user_id);

    //     // echo "here";
    //     // print_r($gigDetails);
    //     // print_r($profileDetails);
        
    //     $data['gigDetails']=$gigDetails;
    //     $data['profileDetails']=$profileDetails;
    
    //     // echo "hello";
    //     // show($data);
    //     // show($gigDetails);
    //     // show($data['gigDetails']);
    //     $this->view('Technician/singlegig',$data);
    // }
} 

// $init = new Gigs;

// if($_SERVER['REQUEST_METHOD']=="POST"){
//     $init->addgig();
// }