<?php
class ItemTemplate{

    use Controller;
        
    public function index(){

        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
        }else{
            $item = new Itemtemplates;
            $item_list = $item->getAllItemsDetails();
            $data['item'] = $item_list;
            // show($item);
            $this->view('Admin/itemtemplates',$data);
        }    
    }


    public function viewtemplate($id){
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
         }else{
            $bb = new Maintenancetask;
            $maintenance_list = $bb->getAllMaintenance();
            $data['maintenance'] = $maintenance_list;
            //show($profile_details);
            
            $this->view('Admin/itemMaintenance',$data);
         }   
    }

    

        
        
}