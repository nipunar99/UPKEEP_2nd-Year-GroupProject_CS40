<?php
class ItemMaintenance{

    use Controller;
        
    public function index(){

        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
        }else{
            $this->view('Admin/itemMaintenance');
        }    
    }
        
        
}