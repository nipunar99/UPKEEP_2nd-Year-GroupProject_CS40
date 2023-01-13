<?php

class Item {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $arr=[];
            $suggestions = new Items;
            $result = $suggestions->findAll();
            $data['result'] = $result;

            $this->view('Moderator/item',$data);
        }else{
            redirect("Home/home");
        }

    }

}