<?php

class Itemtemplate {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $arr=[];
            $itemtemplates = new Itemtemplates;
            $result = $itemtemplates->completeItemTemplate();
            // $json = json_encode($result);
            // echo($json);

              $data['result'] = $result;

             $this->view('Moderator/itemTemplate',$result);
             print_r($result);

        }else{
            redirect("Home/home");
        }

    }

  

}
