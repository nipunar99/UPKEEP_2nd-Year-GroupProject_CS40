<?php
class Admindashboard{

    use Controller;
        
    public function index(){

        //$moderator=new User;
        //$moderators= $moderator->viewmod();

        //$data['mods']=$moderators;

        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
        }else{
            $this->view('Admin/adminDashboard');
        }    
    
    }
           
}