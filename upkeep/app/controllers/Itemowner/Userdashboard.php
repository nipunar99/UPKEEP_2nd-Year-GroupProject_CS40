<?php

class Userdashboard {

    use Controller;
    public function index (){
        
        if($_SESSION['user_id'] == $_SESSION['user_id']){
            $this->view('Itemowner/userDashboard');
        }else{
            redirect("Home/home");
        }

    }

    public function completeTask(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['action']) && $_POST['action']=="completeTask"){
                unset($_POST['action']);
                show($_POST);
                $task = new CompleteTask;
                $task->insert($_POST);
            } 
        }
    }

    public function deleteTask(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['action']) && $_POST['action']=="deleteTask"){
                show($_POST);
                unset($_POST['action']);
                $task = new MaintenanceReminder;
                $reminder_id = $_POST['reminder_id'];
                $task->delete($reminder_id,"reminder_id");

            } 
        }
    }


    public function getAllReminders(){
        $user_id = $_SESSION['user_id'];
        $reminder = new MaintenanceReminder;
        $result = $reminder->getAllItemReminders($user_id);
        $json = json_encode($result);
        echo($json);
    }

    public function getAllOverdueReminders(){
        $user_id = $_SESSION['user_id'];
        $reminder = new MaintenanceReminder;
        $result = $reminder->getAllItemOverdueReminders($user_id);
        $json = json_encode($result);
        echo($json);
    }

    public function display1details(){
        $reminder = new MaintenanceReminder;

        $para = [];
        $para ['id'] = $_SESSION['user_id'];
        $para ['type'] = "user_id";

        $result = $reminder->get_latest_reminders($para);

        if (!empty($result)) {
            $maintainDate=$result[0]->start_date;
            $moreDays = $this->calculateMoreDates($maintainDate);

            $result[0]->moreDays = $moreDays;

            $json = json_encode($result);
            echo($json);
        }else {

            $error = array(
                "status" => "empty"
            );
            $json = json_encode($error);
            echo($json);
        }
        
    }

    public function display2details(){
        $user_id= $_SESSION['user_id'];
        // show($arr); 
        $item_details = new Owneritem;
        $result = $item_details->getLatestWarrentyDate($user_id);
        // show($result);  
        $warrenty_date=$result[0]->warrenty_date;
        $moreDays = $this->calculateMoreDates($warrenty_date);

        $result[0]->moreDays = $moreDays;

        $json = json_encode($result);
        echo($json);
        
    }

    public function display3details(){
        
        $reminder = new MaintenanceReminder;

        $para = [];
        $para ['id'] = $_SESSION['user_id'];
        $para ['type'] = "user_id";

        $result = $reminder->get_latest_overdue_reminders($para);

        if (!empty($result)) {
            $maintainDate=$result[0]->start_date;
            $leftDays = $this->calculateMoreDates($maintainDate);

            $result[0]->leftDays = $leftDays;

            $json = json_encode($result);
            echo($json);
        }else {

            $error = array(
                "status" => "empty"
            );
            $json = json_encode($error);
            echo($json);
        }
        
    }


    public function calculateMoreDates($maintainDate){

        $currentDate = new DateTime(); // current date and time
        $checkDate = new DateTime($maintainDate); // the date to check

        $interval = $currentDate->diff($checkDate);

        return $interval->days; 

    }



}