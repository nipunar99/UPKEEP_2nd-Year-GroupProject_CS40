<?php

class Community {

    use Controller;
    public function index (){
        if($_SESSION['user_id'] == $_SESSION['user_id']){
            $this->view('community');
        }else{
            redirect("Home/home");
        }
    }
    

}
