<?php
class User{

    use Controller;
        
    public function index(){

        if($_SESSION['USER'] == 'Admin'){

            $this->view('Admin/user');
        }else{
            redirect("Home/home");
        }
    }
        
        
}