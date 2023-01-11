<?php

class Additemtemplate {

    use Controller;
    
    public function index (){
        
        if(isset($_SESSION['user_id'])){
            $data = [];
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $itemtemplate = new Itemtemplates;
                $itemtemplate->insertItemtemplate($_POST);
                redirect("Moderator/Itemtemplate");
            }
            $this->view('Moderator/addItemtemplate');
        }else{
            redirect("Home/home");
        }
        
    }

}
