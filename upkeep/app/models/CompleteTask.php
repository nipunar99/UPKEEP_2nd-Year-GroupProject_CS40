<?php 

class CompleteTask {

    use Model;

    protected $table ="complete_maintenance";

    protected $allowedColumns = [
        "completeTask_id",
        "item_id",
        "maintenanceTask_id",
        "task_description",
        "cost",
        "finished_date",
    ];

}