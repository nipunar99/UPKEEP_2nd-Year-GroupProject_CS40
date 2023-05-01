<?php

class Item {

    use Controller;
    
public function index (){
    $data =[];
    if($_SESSION['user_id'] == $_SESSION['user_id']){

        $arr = [];
        $arr["owner_id"] = $_SESSION['user_id'];
        $items = new IO_Owneritem;
        $result = $items->where($arr);
            $data["result"] = $result; 

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['action']) && $_POST['action']=="addItem"){

                unset($_POST['action']);
                $item = new IO_Owneritem;
                $item->insertItem($_POST);
            }else if(isset($_POST['action']) && $_POST['action']=="adddoc"){

                show($_POST);
                unset($_POST['action']);
                $item = new IO_ItemDoc;
                $item->insertDocs();
            } 
            else {
                $this->selectItem($_POST);
            }
        }
        else{
            // show($_SESSION['item_id'][0]->id);

            $this->view('itemowner/item',$data);
        }

    }else{
        redirect("Home/home");
    }
    
}

public function selectItem($arr){
    $_SESSION['item_id'] = $arr['item_id'];
    $data = [];
    $items = new IO_Owneritem;
    $result = $items->where($arr);
    $data['result'] = $result;
    $this->view('itemowner/viewitem',$data);

}

public function getAllItem(){
    $arr = [];
    $arr["owner_id"] = $_SESSION['user_id'];
    $arr['status'] = "Active";
    $items = new IO_Owneritem;
    $result = $items->where($arr);
    $json = json_encode($result);
    echo($json);
}

}
