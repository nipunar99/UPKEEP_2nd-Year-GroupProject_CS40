<?php

class VerifyTechnician
{

    use Model;

    protected $table = "verify_technicians";

    public function getverifytech(){
        $query = "SELECT * FROM verify_technician";
        $cc = $this->query($query);
        return $cc;
    }


    public function getVerifyAcc(){
        //$query ="SELECT COUNT(*) AS count FROM users WHERE user_role =:user_role1 OR user_role=:user_role2;";
        $query ="SELECT identity_verification, COUNT(identity_verification) AS count FROM technicians GROUP BY identity_verification";
        $data['identity_verification']='verified';

        
        $cc = $this->query($query);
        

        return $cc;



    }
}
