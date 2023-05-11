<?php

class IO_Maintenance_template {
    use Model;

    protected $table = "maintenance_templates";


    public function getAllMaintenanceTemplates(){
        // $query = "select r.item_id,r.reminder_id, r.description,r.task_ID,r.sub_component,r.start_date,r.image,x.item_name from maintenance_reminder r INNER JOIN (select * from items WHERE owner_id=" . $user_id . ")x ON r.item_id = x.item_id WHERE reminder_status = 'overdue'";
        $query = "select * from maintenance_templates m inner JOIN (SELECT itemtemplate_id FROM `items` WHERE owner_id = " . $_SESSION['user_id'] . " GROUP by itemtemplate_id) x on  x.itemtemplate_id = m.item_template_id where 	status ='Approved' ";
        return $this->query($query);
    }
    public function getMaintenanceTemplatesforAnItem(){
        // $query = "select r.item_id,r.reminder_id, r.description,r.task_ID,r.sub_component,r.start_date,r.image,x.item_name from maintenance_reminder r INNER JOIN (select * from items WHERE owner_id=" . $user_id . ")x ON r.item_id = x.item_id WHERE reminder_status = 'overdue'";
        $query = "select * from maintenance_templates where item_template_id = ". $_SESSION['item_template_id'] ." and status ='Approved' ";
        return $this->query($query);
    }

}