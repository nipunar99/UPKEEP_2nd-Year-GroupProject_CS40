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
}
