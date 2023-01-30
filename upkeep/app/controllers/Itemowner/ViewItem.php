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
                    show($_POST);
                }
            }
            // $this->view('itemowner/viewitem');
        }else{
            redirect("Home/home");
        }
        
    }


}
