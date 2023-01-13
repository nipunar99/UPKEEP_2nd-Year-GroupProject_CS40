<?php

class Suggestion {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $arr=[];
            $suggestions = new Suggestions;
            $result = $suggestions->findAll();
            $data['result'] = $result;

            $this->view('Moderator/suggestions',$data);
        }else{
            redirect("Home/home");
        }

    }

}