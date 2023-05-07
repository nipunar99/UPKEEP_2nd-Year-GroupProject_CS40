<?php

class Suggestion {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $arr=[];
            $suggestions = new Owneritem;
           

            $this->view('Moderator/suggestions');
        }else{
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
    public function getItemSuggestions(){
        $item = new Itemtemplates;
        $suggestions = $item->getSuggestionDetails();
        $result = json_encode($suggestions);
        echo($result);

    } 
    public function viewSuggestions($id){
        $this->view('Moderator/itemsuggestions');
    }
    public function viewItemSuggestions($id){
        $i_id = $id[0];
        $_SESSION['suggestion_template_id'] = $i_id;
        $item = new Owneritem;
        $suggestion_details = $item->getSuggesttedItemDetails($i_id);
        $result = json_encode($suggestion_details); 
        echo($result);
    }
    public function viewMaintenanceTasks(){
        $item_id = new OwnerItem;
        $i_id = json_encode($item_id->getItemId($_SESSION['suggestion_template_id']));
        $item_id  = (json_decode($i_id));
        $suggestion = new Maintenancetask;
        $arr['item_id'] = $item_id[0]->item_id;
        
        $suggestion_maintenances = json_encode($suggestion->where($arr));
        echo($suggestion_maintenances);
        $result = json_decode($suggestion_maintenances);
        $length = count($result);
        $this->insertItemOwnerMaintenanceSuggestion($result,$length);
    //     for($i = 0; $i<$length; $i++){
    //     $data = array(
    //         'item_template_id' => $_SESSION['suggestion_template_id'], 
    //         'sub_component' => $result[$i]->sub_component, 
    //         'years' => $result[$i]->years,
    //         'months' => $result[$i]->months,
    //         'description' => $result[$i]->description,
    //         'weeks' => $result[$i]->weeks,
    //         'image' => $result[$i]->image,
    //         'status' => 'Pending'

    //     );
    // }
    //     $new_tasks = new Maintenance_templates;
    //     $new_tasks->insert($data);
        // $result1 = $new_tasks->viewParentMaintenances($_SESSION['id']);
        // echo($result);
        
    }
    public function insertItemOwnerMaintenanceSuggestion($result,$length){
        for($i = 0; $i<$length; $i++){
                $data = array(
                    'item_template_id' => $_SESSION['suggestion_template_id'], 
                    'sub_component' => $result[$i]->sub_component, 
                    'years' => $result[$i]->years,
                    'months' => $result[$i]->months,
                    'description' => $result[$i]->description,
                    'weeks' => $result[$i]->weeks,
                    'image' => $result[$i]->image,
                    'status' => 'Pending'
        
                );
            }
            $new_tasks = new Maintenance_templates;
            $new_tasks->insert($data);

    }
    // public function approveItemSuggestion($id){
    //     $item = new Itemtemplates;
    //     $result = $item->updateItemTemplate($id[0]);

    // }
}