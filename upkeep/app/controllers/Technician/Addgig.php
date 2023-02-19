<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    $gig = new Gig;
    print_r($_POST);

    $gig->createGig($_POST,$_SESSION['user_id']);

    redirect("Technician/Gigs");

}