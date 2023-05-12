<?php

class Complaint {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $arr=[];
            // $suggestions = new Complaints;
            // $result = $suggestions->findAll();
            // $data['result'] = $result;

            $this->view('Moderator/complaint');
        }else{
            redirect("Home/home");
        }

    }

    public function complaint(){
        $complaints = new Complaints;
        $result = $complaints->completeComplaints();
       
       
       $result1 = json_encode($result);
       echo($result1);
    }

}