<?php

class ViewGig {

    use Controller;
    public function index (){
        if($_SESSION['USER'] == $_SESSION['user_id']){
            // $this->view('Itemowner/viewgig');
        }else{
            redirect("Home/home");
        }
    }

    public function selectGig($id){
        if($_SESSION['USER'] == $_SESSION['user_id']){
      
            $gig = new Gig;
            $profile = new User;
            $gigDetails = $gig->getGig($id);
            $profileDetails = $profile->getUserById($gigDetails[0]->user_id);
            
            $data['gigDetails']=$gigDetails;
            $data['profileDetails']=$profileDetails;
            $this->view('Itemowner/viewgig',$data);
        }else{
            redirect("Home/home");
        }
    
    }

    public function getAllItem(){
        $arr = [];
        $arr["owner_id"] = $_SESSION['user_id'];
        $items = new Owneritem;
        $result = $items->where($arr);
        $json = json_encode($result);
        echo($json);
    }

    public function addJob(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['action']) && $_POST['action']=="addJob"){
                show($_POST);
                // unset($_POST['action']);
                // $task = new CompleteTask;
                // $task->insert($_POST);
            } 
        }
    }
}
