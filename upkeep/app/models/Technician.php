<?php

class Technician{

    use Model;

    protected $table = "technicians";

    public function getTechnicianById($id){
        $arr['technician_id']=$id;
        $tech=$this->where($arr);
        return $tech;
    }

    public function isVerified($id){
        $tech=$this->getTechnicianById($id);
        if($tech['contact_verification']!=null && $tech['identity_verification']!=null){
            return true;
        }
        return false;
    }

}