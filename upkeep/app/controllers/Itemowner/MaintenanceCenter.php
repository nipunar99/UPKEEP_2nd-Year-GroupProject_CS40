<?php

class MaintenanceCenter {

    use Controller;
    public function index (){
        
        if($_SESSION['USER'] == $_SESSION['user_id']){
            $this->view('Itemowner/maintenanceCenter');
        }else{
            redirect("Home/home");
        }

    }

}