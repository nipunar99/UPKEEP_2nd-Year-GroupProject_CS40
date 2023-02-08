<?php

class Documentation {

    use Controller;
    public function index (){
        if($_SESSION['USER'] == $_SESSION['user_id']){
            $this->view('Itemowner/itemdocs');
        }else{
            redirect("Home/home");
        }
    }
    

}
