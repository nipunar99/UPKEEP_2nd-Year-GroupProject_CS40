<?php

class ViewItem {

    use Controller;
    
    public function index (){
        $data =[];
        if($_SESSION['USER'] == $_SESSION['user_id']){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['action']) && $_POST['action']=="deleteItem"){
    
                    unset($_POST['action']);
                    $item = new Owneritem;
                    $item_id = $_POST['item_id'];
                    echo ($item_id);
                    $item->delete($item_id);
                } 
                if(isset($_POST['action']) && $_POST['action']=="addReminder"){

                    unset($_POST['action']);
                    show($_POST);
                    $reminder = new Reminder;
                    $reminder->insertReminder($_POST);
                }
                if(isset($_POST['action']) && $_POST['action']=="addMaintenance"){
                    unset($_POST['action']);
                    show($_POST);
                    $reminder = new Maintenancetask;
                    $reminder->insertMaintenanceTask($_POST);
                }
            }
            // $this->view('itemowner/viewitem');
        }else{
            redirect("Home/home");
        }
        
    }


    public function getAllReminders(){
        $arr = [];
        $arr["item_id"] = $_SESSION['item_id'];
        $reminder = new Reminder;
        $result = $reminder->where($arr);
        $json = json_encode($result);
        echo($json);
    }

    public function getAllMaintenance(){
        $arr = [];
        $arr["item_id"] = $_SESSION['item_id'];
        $maintenance = new Maintenancetask;
        $result = $maintenance->where($arr);
        $json = json_encode($result);
        echo($json);
    }

}
