<?php

class Technician{

    use Model;

    protected $table = "technicians";

    public function getTechnicianById($id){
        $arr['technician_id']=$id;
        $tech=$this->where($arr);
        return $tech;
    }

}