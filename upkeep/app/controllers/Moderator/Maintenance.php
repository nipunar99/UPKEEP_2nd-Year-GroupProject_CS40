<?php

use Maintenances as GlobalMaintenances;

class Maintenance
{

    use Controller;
    public function index()
    {

        if (isset($_SESSION['user_id'])) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['action']) && $_POST['action'] == "addMaintenanceTask") {
                    unset($_POST['action']);
                    $errors = $this->checkValidation();
                    if ($errors === null) {
                        $this->addMaintenanceTask($_POST);
                    }
                    else {
                        print_r($errors);
                    }
                } elseif (isset($_POST['action']) && $_POST['action'] == "updateMaintenanceTask") {
                    $errors = $this->checkValidation();
                    unset($_POST['action']);
                    if ($errors === null) {
                        $this->UpdateMaintenanceTask($_POST);
                    }
                    else {
                        print_r($errors);
                    }
                }
                elseif (isset($_POST['action']) && $_POST['action'] == "addSuggestionMaintenanceTask") {
                    unset($_POST['action']);

                        $task_ID = $_POST['task_ID'];
                        unset($_POST['task_ID']);
                        $this->addMaintenanceTaskFromSuggestions($_POST,$task_ID);
                }
            } 
        } else {
            redirect("Home/home");
        }
    }
    public function checkValidation()
    {

        $errors = [];
        if($_POST['action'] == "updateMaintenanceTask")
        {
            $item_template_id = $_SESSION['parent_item_template_id'];
        }
        else{
            $item_template_id = $_SESSION['item_template_id'];
        }
        //form validation
       

        if ($_POST['item_template_id'] !== $item_template_id) {
            $errors[] = "Form data has been changed";
        }

        if (empty($_POST['status'])) {
            $errors[] = "Status is required";
        }

        if (empty($_POST['description'])) {
            $errors[] = "Description is required";
        }
        
        //print if there exists errors in form

        if (!empty($errors)) {
            foreach ($errors as $error) {
                return "<p>" . $error . "</p>";
            }
        } else {
            return null;
        }
    }
    public function parentmaintenanceTasks($id)
    {
        $item_template_id = $id[0];
        $_SESSION['parent_item_template_id'] = $item_template_id;
        $this->view('Moderator/parentMaintenances');
    }
    public function maintenanceTasks($id)
    {
        $item_template_id = $id[0];
        $_SESSION['item_template_id'] = $item_template_id;
        $this->view('Moderator/maintenance');
    }

    public function viewMaintenanceTasks()
    {
        $id = $_SESSION['item_template_id'];
        $parent_id = $_SESSION['parent_item_template_id'];
        $maintenances = new Maintenance_templates;
        if ($parent_id == 0) {
            $result = $maintenances->viewParentMaintenances($parent_id);
        } 
        else 
        {
            $result = $maintenances->viewsMaintenanceTasks($id,$parent_id);
        }
        $result1 = json_encode($result);
        echo ($result1);
    }
    public function delMaintenance()
    {
        $ids = json_decode($_POST['ids']);

        foreach ($ids as $task_ID) {
            $task = new Maintenance_templates;
            $task->deleteTasks($task_ID);
        }
        redirect("Moderator/maintenance");
    }

    public function editMaintenanceTask($id)
    {
        $task_id = $id[0];
        $_SESSION['task_ID'] = $task_id;
        $maintenance = new Maintenance_templates;
        $task = $maintenance->getTaskById($id[0]);
        $task = json_encode($task);
        echo ($task);
    }
    public function addMaintenanceTask($data)
    {
        $maintenances = new Maintenance_templates;
        show($data);
        $maintenances->insertMaintenanceTasks($data);
    }

    public function addMaintenanceTaskFromSuggestions($data,$task_ID)
    {
        $maintenances = new Maintenance_templates;
        show($data);
        $id = $maintenances->insertMaintenanceTasks($data);

        $mapping = new Maintenance_mapping;
        $mapping->addMapping($task_ID,$id);
    }
    
    public function UpdateMaintenanceTask($data)
    {
        $update_maintenance = new Maintenance_templates;
        $update_maintenance->updateMaintenanceTask($_SESSION['task_ID'], $data);
    }
}
