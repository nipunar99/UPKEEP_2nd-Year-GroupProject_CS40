<?php

class Item {

    use Controller;
    public function index ($arr){
         $data = [];
        
        if(isset($_SESSION['user_id'])){
            $arr=[];
            //   $arr["id"] = ['id'];
            // $ID = $_GET['id'];

            $itemtemplates = new Itemtemplates;
              $arr["id"];
            //   show($arr);
            $result = $itemtemplates->where($arr);
            // echo $result;
            // $result = $itemtemplates->findAll();
            $data['result'] = $result;


            $this->view('Moderator/item',$data);
        }else{
            redirect("Home/home");
        }

    }

    public function viewItem($id){
        $itemtemplates = new Itemtemplates;
        $arr['id']=$id[0];
        // show($id);
        $result = $itemtemplates->where($arr);
        
        // print_r($result);
        $data['result']=$result;
        $this->view('Moderator/item',$data);
    }
    }

// $data = [];
// $items = new Owneritem;
// $result = $items->where($arr);
// $data['result'] = $result;
// // show($data);
// $this->view('itemowner/viewitem',$data);
