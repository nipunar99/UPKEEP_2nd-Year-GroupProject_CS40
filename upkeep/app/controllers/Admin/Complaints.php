<?php
class Complaints{

    use Controller;
        
    public function index(){

        if($_SESSION['USER'] == 'Admin'){

            $this->view('Admin/complaints');
        }else{
            redirect("Home/home");
        }
    }
        
        
}