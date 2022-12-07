<?php

class Item {

    use Controller;
    
    public function index (){
        $data =[];
        if($_SESSION['USER'] == $_SESSION['id']){
            $arr=[];
            $arr["owner_id"] = $_SESSION['id'];

            $items = new Owneritem;
            $result = $items->where($arr);

            $data['result'] = $result;

            $this->view('itemowner/item',$data);

        }else{
            redirect("Home/home");
        }
    }

}
