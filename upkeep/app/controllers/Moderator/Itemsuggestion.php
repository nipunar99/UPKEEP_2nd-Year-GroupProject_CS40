<?php

class Itemsuggestion {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $arr=[];
            $suggestions = new Owneritem;
            $result = $suggestions->findAll();
            $data['result'] = $result;

            $this->view('Moderator/itemSuggestions',$data);
        }else{
            redirect("Home/home");
        }

    }

}