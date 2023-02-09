<?php

class Conversation {

    use Controller;
    public function index (){
        if($_SESSION['USER'] == $_SESSION['user_id']){
            $this->view('conversation');
        }else{
            redirect("Home/home");
        }
    }
    

}
