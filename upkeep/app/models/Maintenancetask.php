<?php

class Maintenancetask {
    use Model;

    protected $table =  "maintenance_task";

    protected $allowedColumn = [
        "task_ID",
        "item_id",
        "sub_component",
        "image",
        "description",
        "years",
        "months",
        "weeks",
        "start_date",
        "status"
    ];

    public function insertMaintenanceTask($data){

        $file_name = $_FILES['image']["name"];
        $file_temp = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];

        $location = "../public/assets/images/uploads/".$file_name;

        if($file_size < 524000){
            if(move_uploaded_file($file_temp,$location)){
                try{
                    $data["item_id"] = $_SESSION['item_id'];
                    $data["image"] = $file_name;
                    $this->insert($data);
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }
            }
        }
    }
   public function getSuggestionsDetails($id){
    $query = "select m.sub_component, m.image, m.description, m.years, m.months, m.weeks from $this->table where item_id = $id";
    return $this->query($query);
   }

   public function getMaintenanceTaskForTemplate($template_id){
        $query = "SELECT 
                        mt.*, 
                        CAST(CASE WHEN tma.maintenance_task_id IS NULL THEN 0 ELSE 1 END AS SIGNED) AS added
                    FROM $this->table mt
                    INNER JOIN 
                    (SELECT item_id FROM items where item_template_id = $template_id) i
                    ON mt.item_id = i.item_id
                    LEFT JOIN maintenance_task_to_template_mapping tma
                    ON mt.task_ID = tma.maintenance_task_id
                    WHERE mt.item_id = i.item_id";
       

        return $this->query($query);
    }

    public function getDetailsById($task_id)
    {
        $arr['task_ID'] = $task_id;
        $task = $this->where($arr);
        return $task;
    }

}