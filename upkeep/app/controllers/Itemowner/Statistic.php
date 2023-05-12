<?php

class Statistic {

    use Controller;
    
    public function index (){
        $data =[];
        if($_SESSION['user_id'] == $_SESSION['user_id']){
            $this->view('itemowner/statistic');
            
        }else{
            redirect("Home/home");
        }
        
    }

    public function display1Details(){
        $task = new IO_CompleteTask;
        $costOfMonth = $task->getCostOfCurrentMonth();
        $json = json_encode($costOfMonth);
        echo($json);
    }

    public function display3Details(){
        $item = new IO_Owneritem;
        $disposeItemsCount = $item->getDisposeItemsCount();
        $json = json_encode($disposeItemsCount);
        echo($json);
    } 
    
    public function display4Details(){
        $user_id = $_SESSION['user_id'];
        $maintenance = new IO_MaintenanceReminder;
        $maintenanceCount = $maintenance->noOfMaintenaceTask($user_id);
        $json = json_encode($maintenanceCount);
        echo($json);
    }   

    public function barchartDetails(){
        $task = new IO_CompleteTask;
        $costOfMonth = $task->getCostOfMonth();
        $json = json_encode($costOfMonth);
        echo($json);
    }

    public function piechartDetails(){
        $task = new IO_CompleteTask;
        $completeTask = $task->getAllTaskCountOfMonth();

        $task = new IO_MaintenanceReminder;
        $incomplete = $task->getCompleteTaskOfMonth();

        $task = new IO_MaintenanceReminder;
        $overdueTask = $task->getIncompleteTaskOfMonth();

        $taskStatus["complete"] =$completeTask[0]->completeTask;
        $taskStatus["incomplete"] =$incomplete[0]->inCompleteTask;
        $taskStatus["overdue"] =$overdueTask[0]->OverdueTask;
        // show($taskStatus);
        $json = json_encode($taskStatus);
        echo($json);
    }

    public function paymentHistoryDetails(){
        $payment = new Orders;
        $user_id = 1;
        $paymentDetails = $payment->getPaymentHistroy($user_id);
        $json = json_encode($paymentDetails);
        echo($json);
    }

    public function maintenanceHistoryDetails(){
        $completeTask = new IO_CompleteTask;
        if(isset($_POST['item_id'])){
            $_SESSION['item_id'] = $_POST['item_id'];
            $completeTasks = $completeTask->getAllTaskOfMonth($_SESSION['item_id']);

        }else if(isset($_POST['date_month'])){
            $completeTasks = $completeTask->getAllTaskOfGivenMonth($_SESSION['item_id'],$_POST['date_month']."-01");
            // show($_POST['date_month']."-01");
            // show($_SESSION['item_id']);
        }else{
            $completeTasks = $completeTask->getAllTask();
        }
        $json = json_encode($completeTasks);
        echo($json);
    }

    public function getAllDisposeItem(){
        $arr = [];
        $arr["owner_id"] = $_SESSION['user_id'];
        $arr['status'] = "Dispose";
        $items = new IO_Owneritem;
        $result = $items->where($arr);
        $json = json_encode($result);
        echo($json);
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

}
