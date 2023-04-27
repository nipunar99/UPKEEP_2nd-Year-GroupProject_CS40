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
        $task = new CompleteTask;
        $costOfMonth = $task->getCostOfMonth();
        $json = json_encode($costOfMonth);
        echo($json);
    }

    public function display2Details(){
        $task = new CompleteTask;
        $costOfMonth = $task->getCostOfMonth();
        $json = json_encode($costOfMonth);
        echo($json);
    }
}
