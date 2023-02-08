<?php

class TechnicianGigs {

    use Controller;
    public function index (){
        
        if($_SESSION['USER'] == $_SESSION['user_id']){
            $this->view('Itemowner/technicianGigs');
        }else{
            redirect("Home/home");
        }

    }

}