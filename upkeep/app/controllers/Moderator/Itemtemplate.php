<?php

class Itemtemplate {

    use Controller;
    public function index (){
         $data = [];
        if($_SESSION['USER'] == $_SESSION['ID']){
            $arr=[];
            $itemtemplates = new Itemtemplates;
            $result = $itemtemplates->findAll();
            $data['result'] = $result;

            $this->view('Moderator/itemTemplate',$data);
        }else{
            redirect("Home/home");
        }

    }

}
