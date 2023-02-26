<?php

class Itemtemplate {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $this->view('Moderator/itemTemplate');
        }else{
            redirect("Home/home");
        }
            // $arr=[];
            
            // 
            // $json = json_encode($result);
            // echo($json);

            //   $data['result'] = $result;

             
            //  print_r($result);

       

    }
    public function completeItemtemplates(){
         $itemtemplates = new Itemtemplates;
         $result = $itemtemplates->completeItemTemplate();
        
        
        $result1 = json_encode($result);
        echo($result1);

    }

   
  

}
