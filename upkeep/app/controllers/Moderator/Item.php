<?php

 class Item {

     use Controller;
     public function index(){
        if(isset($_SESSION['user_id'])){
           
            
            } 
        // }
        else{
            redirect("Home/home");
        } 
     }
   public function delCategory(){
    $ids = json_decode($_POST['ids']);
    // if(isset($_POST['deleteButton'])){
    //     $selectRows = $_POST['id'];
    //     if(!empty($selectRows))
    //     {
            foreach($ids as $id)
            { print $id;
                $item = new Itemtemplates;
                $item->deletecategory($id);
            }
        redirect("Moderator/item");
    
   }
   
    public function viewItem($id){
        if(isset($_SESSION['user_id']) &&  ($_SERVER['REQUEST_METHOD'] == "POST")) {
            if(($_POST['id'] != 0)){
                $id = $_POST['id'];
                $type_name = $_POST['type_id'];
                if($type_name=="House Hold")
                {
                    $type_id = 1;
                }
                elseif($type_name=="Office"){
                    $type_id = 2;
                }
                elseif($type_name=="Vehicle"){
                    $type_id = 3;
                }
                else{
                    $type_id = 4;
                }
                    if($_POST['category'] == "main")
                    {
                        $parent_id = 0;
                    }
                    else{
                        $parent_id = 1;
                    }
             
                $item = new Itemtemplates;
              
                $data = array(
                    'id' => $_POST['id'],  
                    'status' => $_POST['status'],
                    'category' => $_POST['category'],
                    'description' => $_POST['description'],
                    'parent_id' => $parent_id,
                    'image' => $_POST['image']

                );
                $result = json_encode($item->update($id,$data,$id="id"));
                redirect("Moderator/Itemtemplate");

            }
            else
            {
            $name = $_POST['itemtemplate_name'];
            $status = $_POST['status'];
            $image = $_POST['image'];
            $type_name = $_POST['type_id'];
            if($type_name=="House Hold")
            {
                $type_id = 1;
            }
            elseif($type_name=="Office"){
                $type_id = 2;
            }
            elseif($type_name=="Vehicle"){
                $type_id = 3;
            }
            else{
                $type_id = 4;
            }
            
            $category = $_POST['category'];
            $description = $_POST['description'];
            $parent_id = 1;
            $item = new Itemtemplates;
            echo($_POST);

         //   arr['data']=[$name,$status ,$immage, $type_id,$category,$description,$parent_id];
        $result = json_encode($item->insertCategory($name,$status,$image, $type_id,$category,$description,$parent_id));
        $data['result'] = $result;
            redirect("Moderator/Itemtemplate");
         }
        }
        elseif(isset($_SESSION['user_id']) ){
            $arr = [];
            $arr["id"] = $id[0];
            $item = new Itemtemplates;
           
            
            //  $result1 =json_encode($item->where($arr));
            // $result1 =json_encode($item->item($arr));
            $result1 =json_encode($item->item($id));
            //   show($result1);
           
            
              $data['result'] = $result1;
           
            $result = json_decode($data['result']);
            
            $itemtemplate_name =$result[0]->itemtemplate_name;
            $category_name = $result[0]->type_name;
            $result2 = $this->findCategory($itemtemplate_name,$category_name);
            // show($result2);

            $data1['results'] = $result2;
            
            // $result_cat = json_decode($data1['results']);
            // show($data+$data1);
            // $Data = $data+$data1
           
             $this->view('Moderator/item',$data+$data1);

             
            
           
        }else{
            redirect("Home/home");
        }
    }
    public function findCategory($itemtemplate_name,$category_name){
        $items = new Itemtemplates;
        $result =$items->category($itemtemplate_name,$category_name);
    // show($result);
   
    return($result);
    }

    

}

   
