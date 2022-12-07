<?php

class ViewItem {

    use Controller;
    
    public function index (){
        $data =[];
        if($_SESSION['USER'] == $_SESSION['user_id']){
            $this->view('itemowner/viewitem');
        }else{
            redirect("Home/home");
        }
        
    }
    public function item($data){
        show($data);
    }

}
