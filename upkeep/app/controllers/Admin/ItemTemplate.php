<?php
class ItemTemplate{

    use Controller;
        
    public function index(){

        if($_SESSION['USER'] == 'Admin'){

            $this->view('Admin/itemtemplates');
        }else{
            redirect("Home/home");
        }
    }
        
        
}