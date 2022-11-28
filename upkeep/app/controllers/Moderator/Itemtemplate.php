<?php

class Itemtemplate {

    use Controller;
    public function index (){
        // $data = [];
        if($_SESSION['USER'] == 'Moderators'){
            $itemtemplates = new Moderatoritemtemplate;
            // $result = $itemtemplates->findAll();

            // $data['result'] = $result;

            $this->view('Moderator/itemTemplate');
        }else{
            redirect("Home/home");
        }

    }

}
