<?php

class jobs
{

    use Model;

    protected $table = 'jobs';
    // public $limit = 10;
    protected $page = 1;
    protected $order = 'ASC';
    protected $order_by = 'jobs';
    protected $search = null;

    protected $allowedcolumns = [
        "user_id",
        "gig_id",
        "description",
        "job_type",
        "date",
        "time",
        "status",
        "item_id",
        "address_id",
        "contact_no"
    ];

    public function getPendingJobs(){

    }

    public function limit($limit)
    {
        $this->limit = $limit;
    }

    public function page($page)
    {
        $this->page = $page;
    }

    public function order($order)
    {
        $this->order = $order;
    }

    public function order_by($order_by)
    {
        $this->order_by = $order_by;
    }

    public function search($search)
    {
        $this->search = $search;
    }

    public function get()
    {   
        $sql = "SELECT * FROM $this->table WHERE 1=1";
        if ($this->search != null) {
            $sql .= " AND (";
            foreach ($this->allowedcolumns as $column) {
                $sql .= " $column LIKE '%$this->search%' OR";
            }
            $sql = substr($sql, 0, -2);
            $sql .= ")";
        }
        $sql .= " ORDER BY $this->order_by $this->order LIMIT $this->limit OFFSET " . ($this->page - 1) * $this->limit;
        $result = $this->query($sql);
        return $result;
    }

    //function to get all jobs with the sent user details from user table and address details from the address table with single sql query
    public function getJobsWithUserAndAddressDetails($user_id){
        $sql = "SELECT * FROM $this->table WHERE user_id = $user_id";
        $result = $this->query($sql);
        $jobs = [];
        foreach($result as $job){
            $job_id = $job['job_id'];
            $user_id = $job['user_id'];
            $gig_id = $job['gig_id'];
            $description = $job['description'];
            $job_type = $job['job_type'];
            $date = $job['date'];
            $time = $job['time'];
            $status = $job['status'];
            $item_id = $job['item_id'];
            $address_id = $job['address_id'];
            $contact_no = $job['contact_no'];

            $user = new User;
            $user->where(["user_id" => $user_id]);
            // $user_details = $user->get();

            $address = new Address;
            $address_details = $address->where(["address_id" => $address_id]);

            $job = [
                "job_id" => $job_id,
                "user_id" => $user_id,
                "gig_id" => $gig_id,
                "description" => $description,
                "job_type" => $job_type,
                "date" => $date,
                "time" => $time,
                "status" => $status,
                "item_id" => $item_id,
                "address_id" => $address_id,
                "contact_no" => $contact_no,
                // "user_details" => $user_details,
                "address_details" => $address_details
            ];
            $jobs[] = $job;
        }
        return $jobs;
    }

    //function to get all jobs with the sent user details from user table and address details from the address table with single sql query
    public function getJobDetailsForPublic()
    {
        $technician_id = $_SESSION['user_id'];
        $sql = "SELECT j.*, concat(u.first_name,' ', u.last_name) AS user_posted, a.*, i.item_name,
                CAST(CASE WHEN ja.job_id IS NULL THEN 0 ELSE 1 END AS SIGNED) AS applied
                FROM $this->table j 
                INNER JOIN users u ON j.user_id = u.user_id 
                INNER JOIN address a ON j.address_id = a.address_id
                INNER JOIN items i ON j.item_id = i.item_id
                LEFT JOIN job_apply ja ON j.job_id = ja.job_id && ja.technician_id = $technician_id
                WHERE j.status = 'pending' && j.technician_id IS NULL && j.date >= CURDATE()
                HAVING applied = 0";
        $result = $this->query($sql);
        return $result;
    }


    public function getJobDetailsByIdForTechnician($job_id)
    {
        $technician_id = $_SESSION['user_id'];
        $sql = "SELECT 
                    j.*, 
                    concat(u.first_name,' ', u.last_name) AS client, u.email, u.mobile_no, 
                    a.*,
                    count(ja.job_id) AS applied_count,
                    CAST(CASE WHEN ja.job_id IS NULL THEN 0 ELSE 1 END AS SIGNED) AS applied,
                    o.order_id, o.status AS order_status
                FROM jobs j 
                INNER JOIN users u ON j.user_id = u.user_id 
                INNER JOIN address a ON j.address_id = a.address_id
                LEFT JOIN job_apply ja ON j.job_id = ja.job_id && ja.technician_id = $technician_id
                LEFT JOIN orders o ON j.job_id = o.job_id && o.technician_id = $technician_id
                WHERE j.job_id = $job_id";

        $result = $this->query($sql);
        return $result[0];
    }

    public function getJobApplications($job_id)
    {
        $sql = "SELECT ja.*, concat(u.first_name,' ', u.last_name) AS technician, 
                FROM job_apply ja 
                INNER JOIN users u ON ja.technician_id = u.user_id 
                WHERE ja.job_id = $job_id[0]";

        $result = $this->query($sql);
        return $result;
    }

    public function technicianAcceptJob($job_id,$technician_id){
       $this->update($job_id,['technician_id'=>$technician_id,'status'=>'accepted'],'job_id');
    }

    public function technicianRejectJob($job_id,$technician_id){
        $this->update($job_id,['technician_id'=>$technician_id,'status'=>'rejected'],'job_id');
    }

    public function userAcceptsTechnicianForJob($job_id,$technician_id){
        $this->update($job_id,['technician_id'=>$technician_id,'status'=>'accepted'],'job_id');
    }

}