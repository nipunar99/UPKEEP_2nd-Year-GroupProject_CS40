<?php

class Conversation {

    use Controller;
    public function index (){
        $_SESSION["receiver_id"]= 0;

        if($_SESSION['user_id'] == $_SESSION['user_id']){
            if($_SESSION['user_role'] == 'technician'){
                $this->view('Technician/conversation');
            }
        else{
                $this->view('conversation');
            }
            
        }else{
            redirect("Home/home");
        }
    }
    
    public function loadUser(){
        $user = new User;
        $users = [];
        if($_SESSION['user_role'] == 'item_owner'){
            $users = $user->getTechnicians($_SESSION['user_id']);

        }else{
            $users = $user->getItemowners($_SESSION['user_id']);

        }

        // $user = new Messages();
        // $users = $user->latestMessage();
        // show($users[0]->user_id);

        $json  = json_encode($users);
        echo($json);
    }

    public function searchUser(){
        $user = new User;
        if($_SESSION['user_role'] == 'item_owner'){
            $users = $user->searchTechnicians($_POST['username']);
        }
        else{
            $users = $user->searchOwners($_POST['username']);
        }
        $json = json_encode($users);
        echo($json);
    }

    public function loadUserChat($receiver_id){
        $_SESSION["receiver_id"]=$receiver_id[0];
        $user = new User;
        if($_SESSION['user_role'] == 'item_owner'){
            // resetUserReadCount($userCount,$technician,$owner){
            $user->resetUserReadCount("owner_unread_count",$_SESSION["receiver_id"],$_SESSION['user_id']);

        }else{
            $user->resetUserReadCount("technician_unread_count",$_SESSION['user_id'],$_SESSION["receiver_id"]);

        }

        $arr = [];
        $arr["id"] = $receiver_id;
        $result = json_encode($arr);
        echo($result);
    }

    public function saveMassage(){
        if($_POST["action"] == "savemsg"){
            unset($_POST["action"]);
            $_POST["receiver_id"] = $_SESSION["receiver_id"];
            $_POST["sender_id"] = $_SESSION["user_id"];
            $_POST["currentDate"] = date('F j, Y'); 
            $_POST["currentTime"] = date('g:i A');
            // $_POST["read_status"] = 1;

            show($_POST);

            $massage = new Messages;
            $massage->insert($_POST);
        }
    }

    public function getChatMassages(){
        $output = "";
        $user = [];
        $user["receiver_id"] = $_SESSION["receiver_id"];
        $user["sender_id"] = $_SESSION["user_id"];

        $massage = new Messages;

        $result = $massage->setReadStatus($user);
        $result = $massage->getchatMessages($user);

        if (!empty($result)) {
            $output = $this->setMassagetoHtmlform($result);
        }
        
        echo($output);
    }

    public function getLatestMessage($receiver_id){

    }

    private function setMassagetoHtmlform($arr){
        $output = "";
        foreach($arr as $value) {
            if($value->sender_id == $_SESSION["user_id"]){
                $output .='<div class="outgoing chat">
                            <div class="details outgoingdetails">
                                <p>'.$value->msg.'</p>
                                <h4>11.00 a.m.</h4>
                            </div>
                        </div>';
            }else{
                $output .='<div class="incomming chat">
                            <div class="details incommingdetails">
                                <p>'.$value->msg .'</p>
                                <h4>11.00 a.m.</h4>
                            </div>
                        </div>';
            }

        }

        return $output;
    }

    
}
