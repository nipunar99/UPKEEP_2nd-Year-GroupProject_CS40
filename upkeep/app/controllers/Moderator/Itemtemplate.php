<?php

class Itemtemplate {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $this->view('Moderator/itemTemplate');
        }
        
        else
        { redirect("Home/home");
        }
          

    }
    public function completeItemtemplates(){
         $itemtemplates = new Itemtemplates;
         $result = $itemtemplates->completeItemTemplate();
        
        
        $result1 = json_encode($result);
        echo($result1);

    }
   public function deleteItems(){

    if($_SESSION['USER'] == $_SESSION['user_id']){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['action']) && $_POST['action']=="deleteItem"){

                unset($_POST['action']);
                $item = new Itemtemplates;
                $id = $_POST['id'];
                echo ($id);
                $item->delete($id);
            } 
        }
        // $this->view('itemowner/viewitem');
    }else{
        redirect("Home/home");
    }
   
   }
//public function deleteTemplate(){
        // if($_SERVER['REQUEST_METHOD'] == "POST"){
        //     if(isset($_POST['action']) && $_POST['action']=="deleteTask"){
        //         show($_POST);
        //         unset($_POST['action']);
            //     $item = new Itemtemplates;
            //     $item_id = $_POST['id'];
            //     $item->delete($item_id,"id");

            // } 
    //     }
    // }'

   
}
