<?php

class IO_Maintenance_template {
    use Model;

    protected $table = "maintenance_templates";


    public function getAllMaintenanceTemplates(){
        $query = "select * from maintenance_templates m inner JOIN (SELECT itemtemplate_id FROM `items` WHERE owner_id = " . $_SESSION['user_id'] . " GROUP by itemtemplate_id) x on  x.itemtemplate_id = m.item_template_id where 	status ='Approved' ";
        return $this->query($query);
    }
    public function getMaintenanceTemplatesforAnItem($itemtemplate_id){
        $query = "SELECT * FROM maintenance_templates WHERE item_template_id = ". $itemtemplate_id ." and task_id NOT IN (SELECT template_task_id FROM maintenance_task where item_id = ". $_SESSION['item_id'] ." )";
        return $this->query($query);
    }

}