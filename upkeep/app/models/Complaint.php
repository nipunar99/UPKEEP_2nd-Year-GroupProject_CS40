<?php

class Complaint {
    use Model;

    protected $table = "complaints";

    public function getAllComplaints(){
        echo "inside model function";
    }
};