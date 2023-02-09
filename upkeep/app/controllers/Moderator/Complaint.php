<?php

class Complaint {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $arr=[];
            $suggestions = new Complaints;
            $result = $suggestions->findAll();
            $data['result'] = $result;

            $this->view('Moderator/complaint',$data);
        }else{
            redirect("Home/home");
        }

    }

}