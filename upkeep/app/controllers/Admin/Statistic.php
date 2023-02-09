<?php
class Statistic{

    use Controller;
        
    public function index(){

        if($_SESSION['USER'] == 'Admin'){

            $this->view('Admin/statistic');
        }else{
            redirect("Home/home");
        }
    }
        
        
}