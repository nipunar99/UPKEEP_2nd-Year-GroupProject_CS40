<?php

class IO_MaintenanceReminder {
    use Model;

    protected $table = "maintenance_reminder";

    protected $allowedColumn =[
        "reminder_id",
        "item_id",
        "description",
        "sub_component",
        "image",
        "start_date",
        "end_date",
    ];

    public function insertReminder($data){
        $file_name = $_FILES['image']["name"];
        $file_temp = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];

        $location = "../public/assets/images/uploads/".$file_name;

        if($file_size < 524000){
            if(move_uploaded_file($file_temp,$location)){
                try{
                    $data["item_id"] = $_SESSION['item_id'];
                    $data["user_id"] = $_SESSION['user_id'];
                    $data["image"] = $file_name;
                    show($data);
                    $this->insert($data);
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }
            }
        }
    }
    
    public function getAllItemReminders($user_id){
        $query = "select r.item_id,r.reminder_id, r.description, r.task_ID,r.sub_component,r.start_date,r.image,x.item_name from maintenance_reminder r INNER JOIN (select * from items WHERE owner_id=" . $user_id . ")x ON r.item_id = x.item_id WHERE reminder_status = 'ontime'";
        return $this->query($query);
    }
    public function getAllItemOverdueReminders($user_id){
        $query = "select r.item_id,r.reminder_id, r.description,r.task_ID,r.sub_component,r.start_date,r.image,x.item_name from maintenance_reminder r INNER JOIN (select * from items WHERE owner_id=" . $user_id . ")x ON r.item_id = x.item_id WHERE reminder_status = 'overdue'";
        return $this->query($query);
    }


    public function get_latest_reminders($data){
        $query = "";
        if($data["type"] == "item_id"){
            $query = "select description, sub_component, start_date from maintenance_reminder WHERE item_id =" . $data['id']  . " and reminder_status = 'ontime' ORDER BY start_date ASC LIMIT 1";
        }
        if($data["type"] == "user_id"){
            $query = "select x.item_name, m.description, m.sub_component, m.start_date, m.reminder_status from maintenance_reminder m INNER JOIN (select item_id , item_name from items WHERE owner_id=" . $data['id']  . ")x ON m.item_id = x.item_id WHERE reminder_status = 'ontime' ORDER BY start_date ASC LIMIT 1";
        }
        return $this->query($query);
    }

    public function get_latest_overdue_reminders($data){
        $query = "";
        if($data["type"] == "item_id"){
            $query = "select description, sub_component, start_date from maintenance_reminder WHERE item_id =" . $data['id'] . " and reminder_status = 'overdue' ORDER BY start_date ASC LIMIT 1";
        }
        if($data["type"] == "user_id"){
            $query = "select x.item_name, m.description, m.sub_component, m.start_date, m.reminder_status from maintenance_reminder m INNER JOIN (select item_id , item_name from items WHERE owner_id=" . $data['id']  . ")x ON m.item_id = x.item_id WHERE reminder_status = 'overdue' ORDER BY start_date ASC LIMIT 1";
        }
            return $this->query($query);
    }

    public function noOfMaintenaceTask($user_id){
        $query = "select COUNT(m.task_ID) AS task_count from maintenance_task m INNER JOIN (select item_id from items WHERE owner_id=" . $user_id . ")x ON m.item_id = x.item_id";
        return $this->query($query);
    }

    public function getCompleteTaskOfMonth(){
        $query = "select count(reminder_id) as inCompleteTask FROM maintenance_reminder WHERE MONTH(start_date) = MONTH(CURRENT_DATE()) && reminder_status = 'ontime'";
        return $this->query($query);
    }

    public function getIncompleteTaskOfMonth(){
        $query = "select count(reminder_id) as OverdueTask FROM maintenance_reminder WHERE MONTH(start_date) = MONTH(CURRENT_DATE()) && reminder_status = 'overdue'";
        return $this->query($query);
    }

    public function updateReminder($data){
        $file_name = $_FILES['image']["name"];
        $file_temp = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];

        $location = "../public/assets/images/uploads/".$file_name;

        if($file_size < 524000){
            if(move_uploaded_file($file_temp,$location)){
                try{
                    
                    $data["image"] = $file_name;
                    // show($data);
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }
            }
        }
        
        $reminder_id = $data["reminder_id"];
        unset($data["reminder_id"]);
        $this->update($reminder_id,$data,"reminder_id");

    }
}