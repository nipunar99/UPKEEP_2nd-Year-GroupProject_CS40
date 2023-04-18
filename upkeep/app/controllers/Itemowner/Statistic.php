<?php

class Statistic {

    use Controller;
    
    public function index (){
        $data =[];
        if($_SESSION['user_id'] == $_SESSION['user_id']){
            $this->view('itemowner/statistic');
            
        }else{
            redirect("Home/home");
        }
        
    }

}
