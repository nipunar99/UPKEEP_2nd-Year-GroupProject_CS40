<?php

class Additem {

    use Controller;
    
    public function index (){
        
        if($_SESSION['USER'] == 'Owner'){
            $data =[];
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $item = new Owneritem;
                // if($item->validate($_POST))
                // {
                //     $item->insert($_POST);
                //     redirect("Userdashboard");
                // }
                
                // $data["errors"] = $user->errors;
                $item->insert($_POST);
                redirect("Itemowner/Item");

            }
            $this->view('Itemowner/additem');
        }else{
            redirect("Home/home");
        }
        
    }

}
