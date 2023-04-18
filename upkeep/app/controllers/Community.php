<?php

class Community {

    use Controller;
    public function index (){
        if($_SESSION['user_id'] == $_SESSION['user_id']){
            if($_SESSION['user_role'] == 'technician'){
                $this->view('Technician/community');
            }else{
                $this->view('community');
            }
        }else{
            redirect("Home/home");
        }
    }
    

}
