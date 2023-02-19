<?php

class Item {

    use Controller;
    
public function index (){
    $data =[];
    if($_SESSION['USER'] == $_SESSION['user_id']){

        $arr = [];
        $arr["owner_id"] = $_SESSION['user_id'];
        $items = new Owneritem;
        $result = $items->where($arr);
            $data["result"] = $result; 

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['action']) && $_POST['action']=="addItem"){

                unset($_POST['action']);
                $item = new Owneritem;
                $item->insertItem($_POST);
            } 
            else {
                $this->selectItem($_POST);
            }
        }
        else{
            //show(result);
            $this->view('itemowner/item',$data);
        }

    }else{
        redirect("Home/home");
    }
    
}

public function selectItem($arr){
    $_SESSION['item_id'] = $arr['item_id'];
    $data = [];
    $items = new Owneritem;
    $result = $items->where($arr);
    $data['result'] = $result;
    // show($data);
    $this->view('itemowner/viewitem',$data);

}

public function getAllItem(){
    $arr = [];
    $arr["owner_id"] = $_SESSION['user_id'];
    $items = new Owneritem;
    $result = $items->where($arr);
    $json = json_encode($result);
    echo($json);
}

}
