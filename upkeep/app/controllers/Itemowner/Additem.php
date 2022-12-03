<?php

class Additem {

    use Controller;
    
    public function index (){
        
        if($_SESSION['USER'] == $_SESSION['user_id']){
            $data =[];
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $item = new Owneritem;
                $item->insertItem($_POST);
                // redirect("Itemowner/additem/adddoc");

            }
            $this->view('Itemowner/additem');
        }else{
            redirect("Home");
        }
        
    }

    public function addDoc (){
        
        if($_SESSION['USER'] == $_SESSION['user_id']){
            $data =[];
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                // $item = new Owneritem;
                // $item->insertItem($_POST);
                redirect("Itemowner/Item");

            }
            $this->view('Itemowner/additemdoc');
        }else{
            redirect("Home");
        }
        
    }

}
