<?php

 class Item {

     use Controller;
     public function index(){
        if(isset($_SESSION['user_id'])){
            // $this->view('Moderator/item');
        }else{
            redirect("Home/home");
        } 
     }
   
        
   // }
    // public function viewItem($id,$itemtemplate_name){
    //     if(isset($_SESSION['user_id'])){

        // $result = $item->item($arr['id']);
        // $result1 = json_encode($result);
        // echo($result1);
        // print_r($result);
        // $data['result']=$result;
        // $this->view('Moderator/item',$data);
        // if($_SESSION['USER'] == $_SESSION['user_id']){
      
            // $item = new Itemtemplates;
           
            
            //  $result1 =json_encode($item->item($id));
            
            // $category_name = $item->$itemtemplate_name;
            // echo $category_name;

            //   $result2 = json_encode($item->category($itemtemplate_name));
            
             // echo $category_name;
            // $result2 =json_encode($item->where($category_name));
            
    //          $data['result'] = $result1 +$result2;

    //            print_r($data['result']);
           
    //          $this->view('Moderator/item',$data);
    //     }else{
    //         redirect("Home/home");
    //     }
    // }
    public function viewItem($id){
        if(isset($_SESSION['user_id'])){
            $arr = [];
            $arr["id"] = $id[0];
            $item = new Itemtemplates;
           
            
            //  $result1 =json_encode($item->where($arr));
            // $result1 =json_encode($item->item($arr));
            $result1 =json_encode($item->item($id));
            //  show($result1);
           
            
              $data['result'] = $result1;

           
             $this->view('Moderator/item',$data);
        }else{
            redirect("Home/home");
        }
    }

}

   
