<?php
class Technician{

    use Controller;
        
    public function index(){

        if($_SESSION['USER'] == 'Admin'){

            $this->view('Admin/technicianDashboard');
        }else{
            redirect("Home/home");
        }
    }
        
        
}