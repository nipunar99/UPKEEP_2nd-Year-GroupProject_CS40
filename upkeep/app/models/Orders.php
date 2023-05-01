<?php

class Orders{

    use Model;

    protected $table = 'orders';
    protected $primary_key = 'order_id';

    protected $allowedColumns = [
        "order_id",
        "job_id",
        "technician_id",
        "user_id",
        "service_charge",
        "status",
        "date_completed",
        "additional_notes"
    ];

    public function cardCount($user_id){
        return $this->customerCount($user_id);

    }

    public function customerCount($technician_id){
        $query = 'SELECT COUNT(DISTINCT user_id) FROM orders WHERE technician_id = :technician_id';
        $data = [
            'technician_id' => $technician_id
        ];
        $count = $this->query($query, $data);
    }


}