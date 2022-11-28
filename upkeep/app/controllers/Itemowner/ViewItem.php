<?php

class ViewItem {

    use Controller;
    
    public function index (){
        $data =[];
        if($_SESSION['USER'] == $_SESSION['id']){
            $this->view('itemowner/viewitem');
        }else{
            redirect("Home/home");
        }
        
    }

}
