<?php

class Userdashboard {

    use Controller;
    public function index (){
        
        if($_SESSION['USER'] == $_SESSION['user_id']){
            $this->view('Itemowner/userDashboard');
        }else{
            redirect("Home/home");
        }

    }

}