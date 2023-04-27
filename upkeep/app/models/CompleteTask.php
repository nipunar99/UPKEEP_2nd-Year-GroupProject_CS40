<?php 

class CompleteTask {

    use Model;

    protected $table ="complete_maintenance";

    protected $allowedColumns = [
        "completeTask_id",
        "item_id",
        "maintenanceTask_id",
        "description",
        "cost",
        "finished_date",
    ];

    public function getCostOfMonth(){
        $query = "SELECT SUM(cost) AS total_cost FROM complete_maintenance WHERE MONTH(finished_date) = MONTH(CURRENT_DATE())AND YEAR(finished_date) = YEAR(CURRENT_DATE())";
        return $this->query($query);
    }

}