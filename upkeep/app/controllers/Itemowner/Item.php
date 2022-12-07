<?php

class Item {

    use Controller;
    
public function index (){
    $data =[];
    if($_SESSION['USER'] == $_SESSION['user_id']){
        $arr=[];
        $arr["owner_id"] = $_SESSION['user_id'];
        
        $items = new Owneritem;
        $result = $items->where($arr);

        $data['result'] = $result;

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            
            $this->selectItem($_POST);
        }else{
            $this->view('itemowner/item',$data);
        }

    }else{
        redirect("Home/home");
    }
    
}

public function selectItem($arr){

    $items = new Owneritem;
    $result = $items->where($arr);
    // show($result);
    $this->view('itemowner/viewitem',$result);

}

public function deleteItem(){
    $data =[];
    if($_SESSION['USER'] == $_SESSION['user_id']){
        $arr=[];
        $arr["owner_id"] = $_SESSION['user_id'];

        $items = new Owneritem;
        $result = $items->where($arr);

        $data['result'] = $result;

        $this->view('itemowner/item',$data);

    }else{
        redirect("Home/home");
    }
    
}

}
