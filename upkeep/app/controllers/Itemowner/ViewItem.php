<?php

class ViewItem
{

    use Controller;

    public function index()
    {
        $data = [];
        if ($_SESSION['user_id'] == $_SESSION['user_id']) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['action']) && $_POST['action'] == "deleteItem") {

                    unset($_POST['action']);
                    $item = new IO_Owneritem;
                    $item_id = $_POST['item_id'];
                    $item->disposeItem($item_id);
                }
                if (isset($_POST['action']) && $_POST['action'] == "addReminder") {

                    unset($_POST['action']);
                    $reminder = new IO_MaintenanceReminder;
                    $reminder->insertReminder($_POST);
                }
                if (isset($_POST['action']) && $_POST['action'] == "addMaintenance") {
                    unset($_POST['action']);
                    $_POST['rerun_date'] = $_POST['start_date'];
                    $reminder = new IO_Maintenancetask;
                    show($_POST);
                    $task_ID[0] = $reminder->insertMaintenanceTask($_POST);
                    $this->generateReminder($task_ID);
                }
            }
            // $this->view('itemowner/viewitem');
        } else {
            redirect("Home/home");
        }
    }
    public function generateReminder($task_ID)
    {
        // show($task_ID[0]);
        $maintaintask = new IO_Maintenancetask;
        $arr["task_ID"] = $task_ID[0];
        $result = $maintaintask->where($arr);
        show($result);

        if ($result[0]->status === 'Active') {
            $years = intval($result[0]->years);
            unset($result[0]->years);
            $months = intval($result[0]->months);
            unset($result[0]->months);
            $weeks = intval($result[0]->weeks);
            unset($result[0]->weeks);

            $start_date = new DateTime($result[0]->rerun_date);
            unset($result[0]->rerun_date);
            $start_date->add(new DateInterval('P' . $years . 'Y' . $months . 'M' . $weeks . 'W')); // Add years, months, and weeks to the start date
            // Output the new date
            $result[0]->start_date = $start_date->format('Y-m-d'); // reminder eke start date eka

            $result[0]->user_id = $_SESSION['user_id']; //set User id 
            unset($result[0]->status);
            unset($result[0]->template_task_id);
            show($result[0]);
            $reminder = new IO_MaintenanceReminder;
            $asso_arr = get_object_vars($result[0]); // convert the stdClass object to an array
            $reminder->insert($asso_arr); //Insert new reminder to maintenance_reminder table
        }
    }


    public function getAllReminders()
    {
        $arr = [];
        $arr["item_id"] = $_SESSION['item_id'];
        $arr["reminder_status"] = "ontime";
        $reminder = new IO_MaintenanceReminder;
        $result = $reminder->where($arr);
        $json = json_encode($result);
        echo ($json);
    }

    public function getAllOverdueReminders()
    {
        $arr = [];
        $arr["item_id"] = $_SESSION['item_id'];
        $arr["reminder_status"] = "overdue";
        $reminder = new IO_MaintenanceReminder;
        $result = $reminder->where($arr);
        $json = json_encode($result);
        echo ($json);
    }

    public function getAllMaintenance()
    {
        $arr = [];
        $arr["item_id"] = $_SESSION['item_id'];
        $maintenance = new IO_Maintenancetask;
        $result = $maintenance->where($arr);
        $json = json_encode($result);
        echo ($json);
    }

    public function display1details()
    {
        $reminder = new IO_MaintenanceReminder;
        $para = [];
        $para['id'] = $_SESSION['item_id'];
        $para['type'] = "item_id";

        $result = $reminder->get_latest_reminders($para);

        if (!empty($result)) {
            $maintainDate = $result[0]->start_date;
            $moreDays = $this->calculateMoreDates($maintainDate);

            $result[0]->moreDays = $moreDays;

            $json = json_encode($result);
            echo ($json);
        } else {

            $error = array(
                "status" => "empty"
            );
            $json = json_encode($error);
            echo ($json);
        }
    }

    public function display2details()
    {
        $arr = [];
        $arr["item_id"] = $_SESSION['item_id'];
        // show($arr); 
        $item_details = new IO_Owneritem;
        $result = $item_details->where($arr);
        // show($result);  
        $warrenty_date = $result[0]->warrenty_date;
        $moreDays = $this->calculateMoreDates($warrenty_date);

        $result[0]->moreDays = $moreDays;

        $json = json_encode($result);
        echo ($json);
    }

    public function display3details()
    {

        $reminder = new IO_MaintenanceReminder;
        $para = [];
        $para['id'] = $_SESSION['item_id'];
        $para['type'] = "item_id";

        $result = $reminder->get_latest_overdue_reminders($para);
        // show($result);
        if (!empty($result)) {
            $maintainDate = $result[0]->start_date;
            $leftDays = $this->calculateMoreDates($maintainDate);
            $result[0]->leftDays = $leftDays;
            $json = json_encode($result);
            echo ($json);
        } else {

            $error = array(
                "status" => "empty"
            );
            $json = json_encode($error);
            echo ($json);
        }
    }

    public function calculateMoreDates($maintainDate)
    {

        $currentDate = new DateTime(); // current date and time
        $checkDate = new DateTime($maintainDate); // the date to check

        $interval = $currentDate->diff($checkDate);

        return $interval->days;
    }

    public function disposalplaces()
    {
        $items = new IO_Owneritem;
        $category_id  =$items->getCateroryId(); // Get category id of paticular item

        $arr = [];
        $arr["category_id"] = $category_id[0]->category_id ;

        $disposalMaps = new DisposalMaps;
        $result = $disposalMaps->where($arr);

        $json = json_encode($result);
        echo ($json);
    }

    public function loadDocumentaions()
    {
        $arr = [];
        $arr["item_id"] = $_SESSION['item_id'];
        $itemdoc = new IO_ItemDoc;
        $result = $itemdoc->where($arr);
        // show($result);
        $json = json_encode($result);
        echo ($json);
    }

    public function addDocumentaions()
    {
        show($_POST);
        unset($_POST['action']);
        $item = new IO_ItemDoc;
        $item->insertDocs($_POST);
    }

    public function deleteDocumentaions()
    {
        show($_POST);
        // unset($_POST['action']);
        $item = new IO_ItemDoc;
        $item->delete($_POST['document_id'], "document_id");
    }

    public function selectItem($arr)
    {
        $_SESSION['item_id'] = $arr['item_id'];
        $data = [];
        $items = new IO_Owneritem;
        $result = $items->where($arr);
        $json = json_encode($result);
        echo ($json);
    }

    public function updateTask()
    {
        $maintenanceTask = new IO_Maintenancetask;
        $id = $_POST['task_id'];
        unset($_POST['task_id']);

        $maintenanceTask->update($id, $_POST, "task_id");
    }

    public function deleteTask()
    {
        $maintenanceTask = new IO_Maintenancetask;
        $id = $_POST['task_id'];
        unset($_POST['task_id']);

        $maintenanceTask->delete($id, "task_id");
    }
    public function updateReminder()
    {
        $maintenanceTask = new IO_MaintenanceReminder;
        $maintenanceTask->updateReminder($_POST);
    }

    public function updateItem()
    {
        show($_POST);
        if (isset($_POST['action']) && $_POST['action'] == "updateItem") {

            $item_id = $_POST["item_id"];
            unset($_POST["item_id"]);
            unset($_POST['action']);
            $item = new IO_Owneritem;
            $item->update($item_id, $_POST, "item_id");
        }
    }

    public function getMaintenanceTemplatesforAnItem()
    {

        $item = new IO_Owneritem;
        $itemtemplate_id = $item->getItemtemplateId();

        $maintenances = new IO_Maintenance_template();
        $result = $maintenances->getMaintenanceTemplatesforAnItem($itemtemplate_id[0]->itemtemplate_id);
        // show($itemtemplate_id[0]->itemtemplate_id);
        // show($_SESSION['item_id']);
        $json = json_encode($result);
        echo $json;
    }
}
