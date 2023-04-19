<?php
class Complaints{

    use Controller;
        
    public function index(){

        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
        }else{
            $complaint = new Complaint;
            $complaint_list = $complaint->getAllComplaints();
            $data['complaints'] = $complaint_list;
            //show($complaint_list);
            $this->view('Admin/complaints',$data);
        }    
    }
        
        
}