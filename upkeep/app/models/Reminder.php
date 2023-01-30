<?php

class Reminder {
    use Model;

    protected $table = "reminder";

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
    
}