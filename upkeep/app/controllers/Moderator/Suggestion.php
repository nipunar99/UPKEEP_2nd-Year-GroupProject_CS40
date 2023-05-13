<?php

class Suggestion
{

    use Controller;
    public function index()
    {
        $data = [];
        if (isset($_SESSION['user_id'])) {
            $arr = [];
            $suggestions = new Owneritem;


            $this->view('Moderator/suggestions');
        } else {
            redirect("Home/home");
        }
    }
    public function checkValidation()
    {

        $errors = [];
        //form validation
        $item_template_id = $_SESSION['item_template_id'];

        if ($_POST['item_template_id'] !== $item_template_id) {
            $errors[] = "Form data has been changed";
        }

        if (empty($_POST['status'])) {
            $errors[] = "Status is required";
        }

        if (empty($_POST['description'])) {
            $errors[] = "Description is required";
        }
        if (empty($_POST['sub_component'])) {
            $errors[] = "Sub Component name is required";
        } else if (!preg_match("/^[a-zA-Z\s]+$/", $_POST['sub_component'])) {
            $errors[] = "Component name should only contain letters and spaces";
        }
        //print if there exists errors in form

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<p>" . $error . "</p>";
            }
        } else {
            return null;
        }
    }

    public function getItemSuggestions()
    {
        $item = new Itemtemplates;
        $suggestions = $item->getSuggestionDetails();
        $result = json_encode($suggestions);
        echo ($result);
    }

    public function viewSuggestions($id)
    {
        $this->view('Moderator/itemsuggestions');
    }

    
    public function viewItemSuggestions($id)
    {
        $template_id = $id[0];
        $_SESSION['suggestion_template_id'] = $template_id;
        $item_template = new Itemtemplates;   
        $template_details = $item_template->getItemtemplateById($template_id);
        echo json_encode($template_details[0]);
    }

    public function viewMaintenanceTasks()
    {
        $template_id = $_SESSION['suggestion_template_id'];
        $maintenancetask = new IO_Maintenancetask;
        $result = $maintenancetask->getMaintenanceTaskForTemplate($template_id);
        $result =json_encode($result);
        echo $result; 
    }

    public function approveItemSuggestion(){
        $item = new Itemtemplates;
        $item->approveItemSuggestion($_SESSION['suggestion_template_id']);
      
    }
    public function removeItemSuggestion(){
        $item = new Itemtemplates;
        $item->delete($_SESSION['suggestion_template_id']);
       
    }
    public function editMaintenanceTask($id){
        $task_id = $id[0];
        $task = new IO_Maintenancetask;
        $task_details = json_encode($task->getDetailsById($task_id));
        echo($task_details);
    }
}
