<?php
class VerifyRequest{

    use Controller;
        
    public function index(){

        if($_SESSION['USER'] == 'Admin'){

            $this->view('Admin/VerifyRequest');
        }else{
            redirect("Home/home");
        }
    }
        
        
}