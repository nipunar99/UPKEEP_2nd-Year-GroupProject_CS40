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

                    $this->addItem();

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

    public function getCategoryDetails(){
        $cat = new Categories;
        $result = $cat->findAll();
        // show($result);
        $json = json_encode($result);
        echo($json);
    }
    public function getItemTemplatesDetails(){
        $templates = new IO_ItemTemplate;
        $result = $templates->where($_POST);
        $json = json_encode($result);
        echo($json);
    }

    public function addItem(){
        $item = new IO_Owneritem;
        $template = new Itemtemplates;
        
        //use parenet template
        if($_POST['id'] !='' && $_POST['alter_type'] =='' && $_POST['sub_id'] ==''){
            $_POST['itemtemplate_id'] = $_POST['id'];
            $this->unsetKey();

        }
        else if ($_POST['id'] !='' && $_POST['sub_id'] !=''){
            $_POST['itemtemplate_id'] = $_POST['sub_id'];
            $_POST['item_type'] = $_POST['subitem_type'];
            
            $this->unsetKey();
            $item->insertItem($_POST);
        }

        else if ($_POST['item_type'] =='Other' && $_POST['id'] ==''){
            $newTemplate["itemtemplate_name"] = $_POST['alter_type'];
            $newTemplate["category_id"] = $_POST['category_id'];
            $itemtemplate_id=$template->insertAndGetLastIndex($newTemplate);

            $_POST['itemtemplate_id'] = $itemtemplate_id;
            $_POST['item_type'] = $_POST['alter_type'];
            $this->unsetKey();
            $item->insertItem($_POST);

        }
        else if ($_POST['id'] !='' && $_POST['alter_type'] !='' && $_POST['sub_id'] ==''){
            $newTemplate["itemtemplate_name"] = $_POST['alter_type'];
            $newTemplate["category_id"] = $_POST['category_id'];
            $newTemplate["parent_id"] = $_POST['id'];
            $itemtemplate_id=$template->insertAndGetLastIndex($newTemplate);

            $_POST['itemtemplate_id'] = $itemtemplate_id;
            $_POST['item_type'] = $_POST['alter_type'];
            $this->unsetKey();
            $item->insertItem($_POST);

        }

    }

    public function unsetKey(){
        unset($_POST['category']);unset($_POST['category_id']);unset($_POST['id']);unset($_POST['subitem_type']);
        unset($_POST['sub_id']);unset($_POST['alter_type']);unset($_POST['action']);
        unset($_POST['alter_type']);unset($_POST['category_id']);
    }
}
