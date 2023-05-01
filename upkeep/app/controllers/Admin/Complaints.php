<?php
class Complaints{

    use Controller;
        
    public function index(){

        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
        }else{
            $complaint = new Complaint;
            $complaint_list = $complaint->getAllComplaints();
            $data['complaint'] = $complaint_list;
            //show($complaint_list);
            // $data['complaint_view'] = $complaint->getAllComplaints();
            $this->view('Admin/complaints',$data);
        }    
    }
        
        
}