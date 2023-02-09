<?php
class ItemMaintenance{

    use Controller;
        
    public function index(){

        if($_SESSION['USER'] == 'Admin'){

            $this->view('Admin/itemMaintenance');
        }else{
            redirect("Home/home");
        }
    }
        
        
}