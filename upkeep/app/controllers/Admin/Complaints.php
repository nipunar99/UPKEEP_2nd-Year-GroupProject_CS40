<?php
class Complaints{

    use Controller;
        
    public function index(){

        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
        }else{
            $complaint = new Complaint;
            $complaint_list = $complaint->getComplaint();
            $data['complaint'] = $complaint_list;
            //show($complaint_list);
            // $data['complaint_view'] = $complaint->getAllComplaints();
            $this->view('Admin/complaints',$data);
        }    
    }


    public function removeComplaint(){
        show($_POST);
        if(isset($_POST['action']) && $_POST['action']=="removecomplaint"){
            unset($_POST['action']);
            
            $user_id=$_POST['user_id'];
            $complaint = new Complaint;
            $complaint->delete($user_id,"user_id");
    }
    }
        
        
}