<?php

class ViewItem {

    use Controller;
    
    public function index (){
        $data =[];
        if($_SESSION['user_id'] == $_SESSION['user_id']){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['action']) && $_POST['action']=="deleteItem"){
    
                    unset($_POST['action']);
                    $item = new Owneritem;
                    $item_id = $_POST['item_id'];
                    $item->delete($item_id);
                } 
                if(isset($_POST['action']) && $_POST['action']=="addReminder"){

                    unset($_POST['action']);
                    $reminder = new MaintenanceReminder;
                    $reminder->insertReminder($_POST);
                }
                if(isset($_POST['action']) && $_POST['action']=="addMaintenance"){
                    unset($_POST['action']);
                    $_POST['rerun_date'] = $_POST['start_date'];

                    $years = intval($_POST['years']);
                    $months = intval($_POST['months']);
                    $weeks = intval($_POST['weeks']);
                    
                    $start_date = new DateTime($_POST['rerun_date']);
                    //'2023-04-20'
                    show($start_date);
                    // Add years, months, and weeks to the start date
                    $start_date->add(new DateInterval('P' . $years . 'Y' . $months . 'M' . $weeks . 'W'));

                    // Output the new date
                    show ($start_date->format('Y-m-d'));

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
        $arr["reminder_status"] = "ontime";
        $reminder = new MaintenanceReminder;
        $result = $reminder->where($arr);
        $json = json_encode($result);
        echo($json);
    }

    public function getAllOverdueReminders(){
        $arr = [];
        $arr["item_id"] = $_SESSION['item_id'];
        $arr["reminder_status"] = "overdue";
        $reminder = new MaintenanceReminder;
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

    public function display1details(){
        $reminder = new MaintenanceReminder;
        $para = [];
        $para ['id'] = $_SESSION['item_id'];
        $para ['type'] = "item_id";

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
        $arr = [];
        $arr["item_id"] = $_SESSION['item_id'];
        // show($arr); 
        $item_details = new Owneritem;
        $result = $item_details->where($arr);
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
        $para ['id'] = $_SESSION['item_id'];
        $para ['type'] = "item_id";

        $result = $reminder->get_latest_overdue_reminders($para);
        // show($result);
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

    public function disposalplaces(){
        $arr = [];
        $arr["item_id"] = $_SESSION['item_id'];
        // show($arr); 
        $disposalMaps = new DisposalMaps;
        $result = $disposalMaps->findAll();
        // show($result);
        $json = json_encode($result);
        echo($json);
        
    }

    public function loadDocumentaions(){
        $arr = [];
        $arr["item_id"] = $_SESSION['item_id'];
        $itemdoc = new ItemDoc;
        $result = $itemdoc->where($arr);
        // show($result);
        $json = json_encode($result);
        echo($json);

    }

    public function addDocumentaions(){
        show($_POST);
        unset($_POST['action']);
        $item = new ItemDoc;
        $item->insertDocs($_POST);
        
    }

    public function selectItem($arr){
        $_SESSION['item_id'] = $arr['item_id'];
        $data = [];
        $items = new Owneritem;
        $result = $items->where($arr);
        $json = json_encode($result);
        echo($json);
    }

    public function updateTask(){
        $maintenanceTask = new Maintenancetask;
        $id=$_POST['task_id'];
        unset($_POST['task_id']);

        $maintenanceTask->update($id,$_POST,"task_id");

    }

    public function deleteTask(){
        $maintenanceTask = new Maintenancetask;
        $id=$_POST['task_id'];
        unset($_POST['task_id']);

        $maintenanceTask->delete($id,"task_id");

    }
}
