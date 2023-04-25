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
        if ($tech[0]->contact_verification == "verified" && $tech[0]->identity_verification == "verified") {
            return true;
        }
        return false;
    }

    public function isContactVerified($id, $mobile_no)
    {
        $query = "SELECT t.contact_verification FROM technicians t WHERE t.user_id = :user_id";
        $arr['user_id'] = $id;
        $verification_status = $this->query($query, $arr);

        $user = new User;
        $query2 = "SELECT u.mobile_no FROM users u WHERE u.user_id = :user_id";
        $mobile_num = $user->query($query2, $arr);


        if ($verification_status[0]->contact_verification == "verified" && $mobile_num[0]->mobile_no == $mobile_no) {
            return true;
        }
        return false;
    }


    public function updateContactVerification($id)
    {
        $arr['contact_verification'] = 1;
        $this->update($id, $arr, 'user_id');
    }

    public function updateIdentityVerificationStatus($user_id, string $string)
    {
        $arr['identity_verification'] = $string;
        $this->update($user_id, $arr, 'user_id');
    }
}
