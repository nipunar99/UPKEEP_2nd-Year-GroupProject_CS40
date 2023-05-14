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
            // show($complaint_list);
            // $data['complaint_view'] = $complaint->getAllComplaints();
            $this->view('Admin/complaints',$data);
        }    
    }


    public function removePost(){
        show($_POST);
        if(isset($_POST['action']) && $_POST['action']=="removepost"){
            unset($_POST['action']);
            
            $post_id=$_POST['post_id'];
            $post = new Post;
            $post->delete($post_id,"post_id");
            // show($_POST);
            $arr=[];
            $arr['status']='Resolved';
            $arr['complaint_id']=$_POST['complaint_id'];
            // unset($_POST['complaint_id']);
            show($arr);show($_POST);

            $complaint_id=$arr['complaint_id'];
            $solved_complaint=new Complaint;

            $solved_complaint->update($complaint_id,$arr,'complaint_id');
    }
    }
    public function ignoreComplaint(){
        if(isset($_POST['action']) && $_POST['action']=="ignoreComplaint"){
            unset($_POST['action']);
            $arr=[];
            $arr['status']='Closed';
            $arr['complaint_id'] = $_POST['complaint_id'];

            $complaint_id=$_POST['complaint_id'];

            $ignore=new Complaint;
            $ignore->update($complaint_id,$arr,'complaint_id');
    }
}

    public function getPostById($id){
        $post = new Post;
        $postDetails = $post->getPostById($id[0]);
        $postDetails = json_encode($postDetails);
        echo $postDetails;

    }
        
        
}       