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
}