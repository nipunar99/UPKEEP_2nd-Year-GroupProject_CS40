<?php

class Conversation {

    use Controller;
    public function index (){
        if($_SESSION['USER'] == $_SESSION['user_id']){
            if($_SESSION['user_role'] == 'technician'){
                $this->view('Technician/conversation');
            }
        else{
                $this->view('conversation');
            }
            
        }else{
            redirect("Home/home");
        }
    }
    

}
