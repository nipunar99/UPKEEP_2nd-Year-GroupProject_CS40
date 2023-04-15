<?php

class Technician
{

    use Model;

    protected $table = "technicians";

    public function getTechnicianById($id)
    {
        $arr['user_id'] = $id;
        $tech = $this->where($arr);
        return $tech;
    }

    public function isVerified($id)
    {
        $tech = $this->getTechnicianById($id);
        if ($tech[0]->contact_verification != null && $tech[0]->identity_verification != null) {
            return true;
        }
        return false;
    }

    public function updateContactVerification($id)
    {
        $arr['user_id'] = $id;
        $arr['contact_verification'] = 1;
        $this->update($arr);
    }
}
