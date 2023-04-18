<?php

class Otp {
    use Model;

    protected $table = "otp_verification";

    public function insertOtp($arr){
<<<<<<< Updated upstream
        $query = "INSERT INTO $this->table (user_id , mobile_no, otp, expires_at) 
                    VALUES(:user_id , :mobile_no, :otp, :expires_at) 
                    ON DUPLICATE KEY 
                    UPDATE otp=:otp, expires_at=:expires_at;";

        $this->query($query, $arr);
    }


=======
        $this->insert($arr);
    }

>>>>>>> Stashed changes
    public function mobileNumberValidation($mobile_no){
        //check for whther mobile number is in a valid format
        if(!preg_match("/^[0-9]{9}$/", $mobile_no)){
            return false;
        }
        return true;
    }
}