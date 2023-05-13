<?php

class Order{

    use Model;

    protected $table = 'orders';

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
        $data = $this->customerCount($user_id);
        return $data;
    }

    public function customerCount($technician_id){
        $query = "SELECT COUNT(DISTINCT user_id) AS count, SUM(service_charge) AS revenue, COUNT(CASE WHEN status = 'pending' THEN 1 END) AS queue  FROM orders WHERE technician_id = :technician_id";
        $data = [
            'technician_id' => $technician_id
        ];
        return $this->query($query, $data)[0];
    }

    //get upcomming orders
    public function upcoming(){
        $arr['technician_id'] = $_SESSION['user_id'];
        $query = "SELECT * FROM orders o INNER JOIN (SELECT j.*, a.city FROM jobs j INNER JOIN address a ON j.address_id = a.address_id) k ON o.job_id = k.job_id WHERE o.status = 'pending' AND o.technician_id = :technician_id ORDER BY date DESC LIMIT 3";
        return $this->query($query,$arr);
    }


    public function getAssignedOrdersByDateForCalender($date=null,$technician_id=null){
        if($date=null){
            $date = date();
        }
        if($technician_id=null){
            $technician_id = $_SESSION['user_id'];
        }

        $query = "SELECT j.job_id j.time j.title j.city FROM jobs j INNER JOIN order o ON j.job_id = o.job_id WHERE o.technician_id = :technician_id AND j.date = :date";
        $data = [
            'technician_id' => $technician_id,
            'date' => $date
        ];
        return $this->query($query, $data);
    }

    //get order count group by status
    public function getOrderCountByStatus($technician_id){
        $query = "SELECT COUNT(CASE WHEN status = 'pending' THEN 1 END) AS pending, COUNT(CASE WHEN status = 'completed' THEN 1 END) AS completed, COUNT(CASE WHEN status = 'cancelled' THEN 1 END) AS cancelled FROM orders WHERE technician_id = :technician_id";
        $data = [
            'technician_id' => $technician_id
        ];
        return $this->query($query, $data)[0];
    }

    //get order sum of service_charge by month on past 6 months
    public function getRevenueByMonth($technician_id){
        $query = "SELECT SUM(service_charge) AS revenue, MONTH(date_completed) AS month FROM orders WHERE technician_id = :technician_id AND status = :status AND date_completed > DATE_SUB(NOW(), INTERVAL 6 MONTH) GROUP BY MONTH(date_completed) ORDER BY date_completed ASC";
        $data = [
            'status' => 'completed',
            'technician_id' => $technician_id
        ];
        return $this->query($query, $data);
    }



    //GET ORDER BY DATE



    //DUE DAY CALC
    public function getJobDate($job_id){
        $date = $this->getColumns(['date'],['job_id' => $job_id]);
        return $date[0]['date'];
    }

    public function calculateDueDays($job_id){
        $date = $this->getJobDate($job_id);
        $date = strtotime($date);
        $today = strtotime(date('Y-m-d'));
        $diff = $date - $today;
        $diff = round($diff / (60 * 60 * 24));
        return $diff;
    }


    //get new orders with posted user details
    public function getNewOrders($technician_id)
    {
        $query = "SELECT j.*, concat(u.first_name,' ',u.last_name) AS client,a.address, a.city,a.district FROM jobs j
                    INNER JOIN 
                    users u ON j.user_id = u.user_id
                    INNER JOIN  
                    address a ON j.address_id = a.address_id
                    WHERE j.status = 'pending' AND j.technician_id = :technician_id";
        $data = [
            'technician_id' => $technician_id
        ];
        return $this->query($query,$data);
    }

    public function getOrderQueue($user_id)
    {
        //join 4 tables to get all the data job, order, address, user to get user posted the job
        $query = "SELECT o.*, k.*, concat(u.first_name,' ',last_name) AS client FROM orders o 
                    INNER JOIN 
                    (SELECT j.*,a.address, a.city, a.district FROM jobs j INNER JOIN address a ON j.address_id = a.address_id) k 
                    ON o.job_id = k.job_id 
                    INNER JOIN users u 
                    ON o.user_id = u.user_id 
                    WHERE o.status = 'pending' AND o.technician_id = :technician_id 
                    ORDER BY date DESC";
        $data = [
            'technician_id' => $user_id
        ];
        return $this->query($query,$data);
    }

    public function getCompletedOrdersForTable($user_id)
    {
        $query = "SELECT o.*, j.job_id, j.job_type, concat(u.first_name,' ',u.last_name) AS client FROM orders o
                    INNER JOIN jobs j 
                    ON o.job_id = j.job_id
                    INNER JOIN users u ON j.user_id = u.user_id
                    WHERE o.status = 'completed' AND o.technician_id = :technician_id";
        $data = [
            'technician_id' => $user_id
        ];
        return $this->query($query,$data);
    }

    public function createOrderForJob($job_id, $technician_id,$user_id)
    {
        $this->insert([
            'job_id' => $job_id,
            'technician_id' => $technician_id,
            'user_id' => $user_id,
            'status' => 'pending'
        ]);

    }

    public function completeOrder($order_id,$service_charge,$additional_notes)
    {
        $this->update($order_id,[
            'status' => 'completed',
            'service_charge' => $service_charge,
            'date_completed' => date('Y-m-d'),
            'additional_notes' => $additional_notes
        ], 'order_id');
    }



}