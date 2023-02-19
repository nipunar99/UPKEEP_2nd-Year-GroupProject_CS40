<?php

class Moderatordashboard {

    use Controller;
    public function index (){
        
        if(isset($_SESSION['user_id'])){
            $this->view('Moderator/moderatorDashboard');
        }else{
            redirect("Home/home");
        }

    }

}