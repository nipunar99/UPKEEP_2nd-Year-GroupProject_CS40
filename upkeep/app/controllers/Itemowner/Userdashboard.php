<?php

class Userdashboard {

    use Controller;
    public function index (){
        
        if($_SESSION['USER'] == 'Owner'){
            $this->view('Itemowner/userDashboard');
        }else{
            redirect("Home/home");
        }

    }

}
