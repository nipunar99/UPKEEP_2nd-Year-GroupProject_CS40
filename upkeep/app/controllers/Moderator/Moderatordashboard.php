<?php

class Moderatordashboard {

    use Controller;
    public function index (){
        
        if($_SESSION['USER'] == 'Moderators'){
            $this->view('Moderator/moderatorDashboard');
        }else{
            redirect("Home/home");
        }

    }

}