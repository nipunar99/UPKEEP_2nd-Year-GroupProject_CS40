<?php

class Userdashboard {

    use Controller;
    public function index (){
<<<<<<< HEAD
        
        if($_SESSION['USER'] == $_SESSION['id']){
=======
         
        if($_SESSION['USER'] == 'Owner'){
>>>>>>> 4e7d436571894f0f062259a5443fd187a7280e1d
            $this->view('Itemowner/userDashboard');
        }else{
            redirect("Home/home");
        }

    }

}
 