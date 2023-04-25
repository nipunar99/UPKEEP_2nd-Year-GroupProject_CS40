<?php

class VerificationRequest{

    Use Model;

    protected $table = 'verification_requests';

    public function insertVerification($arr){
        $this->insert($arr);
    }

    public function getVerificationRequest($user_id){
        $this->where(['user_id'=> $user_id]);
    }

    public function updateVerificationRequest($user_id, $arr){
        $this->update($user_id,$arr,'user_id');
    }

    public function getUserIdByImageId($image_id){
        $query = "SELECT user_id FROM ".$this->table." WHERE :image_name IN (id_front, id_back, id_hand);";
        $arr['image_name'] = $image_id;
        return $this->query($query, $arr);
    }


    public function getverifytech(){
        $query = "Select v.request_id, v.user_id, ut.first_name, ut.last_name, ut.email, ut.mobile_no, ut.location from verification_requests v INNER JOIN 
        (SELECT u.user_id, u.first_name, u.last_name, u.email, u.mobile_no, t.location from technicians t INNER JOIN users u ON u.user_id = t.user_id ) ut 
        ON v.user_id=ut.user_id;";
        $cc = $this->query($query);
        
        return $cc;
    }

    public function getcount(){
        //$query ="SELECT COUNT(*) AS count FROM users WHERE user_role =:user_role1 OR user_role=:user_role2;";
        $query ="SELECT status, COUNT(status) AS count FROM verification_requests GROUP BY status";
        $data['status']='pending';
        
        $cc = $this->query($query);

        return $cc;


    }

}

