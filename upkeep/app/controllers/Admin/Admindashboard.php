<?php
class Admindashboard{

    use Controller;
        
    public function index(){

        if($_SESSION['USER'] == 'Admin'){

            $this->view('Admin/adminDashboard');
        }else{
            redirect("Home/home");
        }
    }
        
        
}