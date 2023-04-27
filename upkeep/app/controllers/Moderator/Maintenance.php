<?php

use Maintenances as GlobalMaintenances;

class Maintenance {

    use Controller;
    public function index (){
       
        if(isset($_SESSION['user_id'])){
           
           
        }else{
            redirect("Home/home");
        }

    }
    public function maintenanceTasks($id){
        $item_template_id = $id[0];
        // echo $item_template_id;
        // print_r($_POST);
       
        if(isset($_SESSION['user_id']) &&  ($_SERVER['REQUEST_METHOD'] == "POST")) {
            if(($_POST['task_ID'] != 0)){
              
                $suggestions = new Maintenance_templates;
              
                $data = array(
                    'task_ID' => $_POST['task_ID'],  
                    'item_template_id' => $_POST['item_template_id'],
                    'sub_component' => $_POST['sub_component'],
                    'description' => $_POST['description'],
                    'image' => $_POST['image'],
                    'years' => $_POST['years'],
                    'months' => $_POST['months'],
                    'weeks' => $_POST['weeks']

                );
                $suggestions->update($id,$data,$id="task_ID");
                redirect("Moderator/Maintenance");

            }
            else{
       
        $suggestions = new Maintenance_templates;
        $data = array(
            
                    'item_template_id' => $item_template_id,
                    'sub_component' => $_POST['sub_component'],
                    'description' => $_POST['description'],
                    'image' => basename($_FILES['image']['name']),
                    'years' => $_POST['years'],
                    'months' => $_POST['months'],
                    'weeks' => $_POST['weeks'],
                    'status' => $_POST['status']

              );

           $suggestions->insertMaintenanceTasks($data);

        }
    }
        $this->view('Moderator/maintenance');
        $_SESSION['item_template_id'] = $item_template_id;
       
    }

    public function viewMaintenanceTasks(){ 
        $id = $_SESSION['item_template_id'];

        $maintenances = new Maintenance_templates;
        $result = $maintenances->viewsMaintenanceTasks($id);
       
       
       $result1 = json_encode($result);
      
      echo($result1);

    }
    public function delMaintenance(){
        $ids = json_decode($_POST['ids']);
       
                foreach($ids as $task_ID)
                { 
                    $task = new Maintenance_templates;
                    $task->deleteTasks($task_ID);
                }
            redirect("Moderator/maintenance");
        
       }

    public function editMaintenanceTask($id){
        $maintenance = new Maintenance_templates;
        $task = $maintenance->getTaskById($id);
        $task = json_encode($task);
        echo($task);
    } 
}