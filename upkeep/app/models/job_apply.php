<?php

class job_apply
{

    use Model;

    protected $table = "job_apply";
    protected $primaryKey = "job_id";

    protected $allowedColumns = [
        'job_id',
        'technician_id',
        'quote',
        'status'
    ];

    public function addApplication($data){
        $this->insert($data);
    }

    public function getApplicationsByJobId($job_id){
        $sql = "SELECT ja.*, concat(u.first_name, ' ', u.last_name) as technician_name 
                FROM $this->table ja
                JOIN users u ON u.user_id = ja.technician_id
                WHERE job_id = $job_id";

        $result = $this->query($sql);
        return $result;
    }
}