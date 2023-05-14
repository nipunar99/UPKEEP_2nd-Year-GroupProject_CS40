<?php

class Orders{

    use Model;

    protected $table = 'orders';
//    protected $primary_key = 'order_id';

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

    public function getPaymentHistroy($user_id){
        $query = "SELECT CONCAT(u.first_name, ' ',u.last_name) AS full_name , o.service_charge FROM users u inner join (select service_charge, technician_id from orders where user_id = ".$user_id.")o on o.technician_id = u.user_id";
        return $this->query($query);
    }


}