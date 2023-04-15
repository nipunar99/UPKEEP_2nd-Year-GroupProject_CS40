<?php

class Otp {
    use Model;

    protected $table = "otp_verification";

    public function insertOtp($arr){
        $this->insert($arr);
    }

    public function mobileNumberValidation($mobile_no){
        //check for whther mobile number is in a valid format
        if(!preg_match("/^[0-9]{9}$/", $mobile_no)){
            return false;
        }
        return true;
    }
}