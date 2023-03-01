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
   //  public function index ($arr){
    //      $data = [];
        
        //  if(isset($_SESSION['user_id'])){
        //      $arr=[];
        //        $arr["id"] = ['id'];
        //      $ID = $_GET['id'];

            // $itemtemplates = new Itemtemplates;
            //   $arr["id"];
            //   show($arr);
            // $result = $itemtemplates->where($arr);
            //  echo $result;
            // $result = $itemtemplates->findAll();
            // $data['result'] = $result;


    //         $this->view('Moderator/item',$data);
    //     }else{
    //         redirect("Home/home");
        //  }
        //  public function viewItem($id){
        //     $query = "select i.image, i.id, i.itemtemplate_name, i_type.type_name, i.description, i.status from itemtemplate i inner JOIN item_type i_type on  i_type.type_id = i.type_id ";
        //     return $this->query($query,$data);

        // }
        
        
   // }
    public function viewItem($id,$itemtemplate_name){
        if(isset($_SESSION['user_id'])){
        // $arr['id']=$id[0];
        // show($id);
        // $result = $item->item($arr['id']);
        // $result1 = json_encode($result);
        // echo($result1);
        // print_r($result);
        // $data['result']=$result;
        // $this->view('Moderator/item',$data);
        // if($_SESSION['USER'] == $_SESSION['user_id']){
      
            $item = new Itemtemplates;
            // $profile = new User;
            // $arr=[];
            // $arr["id"] = ['id'];
     
            // $profileDetails = $profile->getUserById($[0]->user_id);
            
            
            $result1 =json_encode($item->item($id));
            // $category_name = $item->$itemtemplate_name;
            // echo $category_name;
             $result2 = json_encode($item->category($itemtemplate_name));
            // echo $category_name;
            // $result2 =json_encode($item->where($category_name));
            $data['result'] = $result1 +$result2;
              print_r($data['result']);
            // $data['profileDetails']=$profileDetails;
            $this->view('Moderator/item',$data);
        }else{
            redirect("Home/home");
        }
    }
}

    // }

    // public function viewItem($id){
    //     $itemtemplates = new Itemtemplates;
    //     $arr['id']=$id[0];
        // show($id);
        // $result = $itemtemplates->where($arr);
        
        // print_r($result);
    //     $data['result']=$result;
    //     $this->view('Moderator/item',$data);
    // }
    // }

// $data = [];
// $items = new Owneritem;
// $result = $items->where($arr);
// $data['result'] = $result;
// // show($data);
// $this->view('itemowner/viewitem',$data);
