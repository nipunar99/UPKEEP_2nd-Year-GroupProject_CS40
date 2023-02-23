<?php

class Itemtemplate {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $arr=[];
            $itemtemplates = new Itemtemplates;
            $result = $itemtemplates->find();
            $data['result'] = $result;

            $this->view('Moderator/itemTemplate',$data);
        }else{
            redirect("Home/home");
        }

    }

}
