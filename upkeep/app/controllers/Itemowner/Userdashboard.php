<?php

class Userdashboard {

    use Controller;
    public function index (){
        
        if($_SESSION['USER'] == $_SESSION['user_id']){
            $this->view('Itemowner/userDashboard');
        }else{
            redirect("Home/home");
        }

    }

    public function getAllReminders(){
        $user_id = $_SESSION['user_id'];
        $reminder = new Reminder;
        $result = $reminder->getAllItemReminders($user_id);
        $json = json_encode($result);
        echo($json);
    }

}