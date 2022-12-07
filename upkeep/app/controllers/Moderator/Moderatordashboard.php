<?php

class Moderatordashboard {

    use Controller;
    public function index (){
        
        if($_SESSION['USER'] == $_SESSION['ID']){
            $this->view('Moderator/moderatorDashboard');
        }else{
            redirect("Home/home");
        }

    }

}