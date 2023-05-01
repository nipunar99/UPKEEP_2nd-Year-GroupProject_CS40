<?php 

class IO_CompleteTask {

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

    public function getCostOfCurrentMonth(){
        $query = "SELECT SUM(cost) AS total_cost FROM complete_maintenance WHERE MONTH(finished_date) = MONTH(CURRENT_DATE())AND YEAR(finished_date) = YEAR(CURRENT_DATE())";
        return $this->query($query);
    }

    public function getCostOfMonth(){
        $query = "SELECT YEAR(finished_date) AS year, MONTH(finished_date) AS month, SUM(cost) AS total_cost FROM complete_maintenance GROUP BY YEAR(finished_date), MONTH(finished_date)";
        return $this->query($query);
    }

    public function getAllTaskCountOfMonth(){
        $query = "SELECT count(completetask_id) as completeTask FROM complete_maintenance WHERE MONTH(finished_date) = MONTH(CURRENT_DATE())";
        return $this->query($query);
    }

    public function getAllTaskOfMonth($user_Id){
        $query = "SELECT * FROM complete_maintenance c inner join (select item_id from items where owner_id=".$user_Id.")x on x.item_id = c.item_id WHERE MONTH(finished_date) = MONTH(CURRENT_DATE())";
        return $this->query($query);
    }   

}