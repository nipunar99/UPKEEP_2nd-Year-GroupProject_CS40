<?php
class Complaints{

    use Controller;
        
    public function index(){

        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
        }else{
            $complaint = new Complaint;
            $complaint->getAllComplaints();
            $this->view('Admin/complaints',$data);
        }    
    }
        
        
}