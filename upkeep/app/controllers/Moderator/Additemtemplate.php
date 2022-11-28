<?php

class Additemtemplate {

    use Controller;
    
    public function index (){
        
        if($_SESSION['USER'] == 'Moderators'){
            $data = [];
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $itemtemplate = new Moderatoritemtemplate;
                $itemtemplate->insert($_POST);
                redirect("Moderator/Itemtemplate");
            }
            $this->view('Moderator/addItemtemplate');
        }else{
            redirect("Home/home");
        }
        
    }

}
