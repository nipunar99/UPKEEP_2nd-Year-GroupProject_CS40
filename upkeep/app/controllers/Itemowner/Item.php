<?php

class Item {

    use Controller;
    
    public function index (){
        $data =[];
        if($_SESSION['USER'] == 'Owner'){
            $items = new Owneritem;
            $result = $items->findAll();

            $data['result'] = $result;

            $this->view('itemowner/item',$data);

        }else{
            redirect("Home/home");
        }
        
    }

}
