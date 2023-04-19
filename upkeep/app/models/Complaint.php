<?php

class Complaint {
    use Model;

    protected $table = "complaints";

    public function getAllComplaints(){
        
        $query = "SELECT * FROM complaints";
        
        $cc = $this->query($query);
        return $cc;
    }
};