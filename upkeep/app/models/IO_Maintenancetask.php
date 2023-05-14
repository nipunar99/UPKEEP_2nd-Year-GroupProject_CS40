<?php

class IO_Maintenancetask
{
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

    public function insertMaintenanceTask($data)
    {

        $file_name = $_FILES['image']["name"];
        $file_temp = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];

        $location = "../public/assets/images/uploads/" . $file_name;

        if ($file_size < 524000) {
            if (move_uploaded_file($file_temp, $location)) {
                try {
                    $data["image"] = $file_name;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }
        $data["item_id"] = $_SESSION['item_id'];
        return $this->insertAndGetLastIndex($data);
    }

    public function getAllMaintenance(){
        $query = "SELECT * FROM maintenance_task";
        return $this->query($query);
}
}
