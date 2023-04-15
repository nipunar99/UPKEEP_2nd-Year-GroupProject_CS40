<?php

$grandparent_dir = dirname(dirname(dirname(__DIR__)));
require $grandparent_dir. '/vendor/autoload.php';
use telesign\sdk\messaging\MessagingClient;

class Getverified
{

    use Controller;
    use Auth;

    public function index()
    {
        $this->checkAuth();

        $tech = new Technician;
        $ver = $tech->isVerified($_SESSION['user_id']);
        show($ver);
        show($_SESSION['verified']);

        $this->view('Technician/getverified');
    }

    public function sendOTP(){
        //show($_POST);
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action']) && $_POST['action'] == "sendOTP"){
            //Validating mobile number
            if(!$this->mobileNumberValidation($_POST['mobile_number'])){
                //http_response_code(422);
                header("HTTP/1.1 422 Unprocessable Entity");
                $arr['error'] = "Invalid mobile number";
                $err_response = json_encode($arr);
                echo($err_response);
                exit();
            }

            //Generating OTP
            $otp_num = rand(100000, 999999);
            $hash = password_hash($otp_num, PASSWORD_DEFAULT);
            $arr = [];

            //retrievind data from post request
            $contry_code = ltrim($_POST['country_code'],"+");
            $mobile_no = $_POST['mobile_number'];

            //preparing the data to be added to database
            $arr['user_id'] = $_SESSION['user_id'];
            $arr['mobile_no'] = $contry_code.$mobile_no;
            $arr['otp'] = $hash;
            $arr['datetime'] = date("Y-m-d H:i:s");
            $arr['status'] = 'pending';

            //Inserting OTP into the database
            $otp = new Otp;
            //$otp->insertOtp($arr);

            //Sending OTP using the telesign API
            $message = "Your OTP is " . $otp_num;
            $mobile = $arr['mobile_no'];
            $customer_id = "7EBDE7B2-57E7-4623-9FE0-CC7085F21644";
            $api_key = "UkGKtxQ4tn/Gd6FEdBoepaFY38kMt6FlWKWZORps8pk8XKdQWQmVBxqpL5QGzEZINAPfP1IZSvDaMHg7wkHaKw==";
            $message_type = "ARN";
            $messaging = new MessagingClient($customer_id, $api_key);
            //$response = $messaging->message($mobile, $message, $message_type);
            //show($messaging);
            //echo($response);
            $test['sending'] = 'true' ;
            echo json_encode($test);
        }
        echo "Out of if";
    }

    public function verifyOTP()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action']) && $_POST['action'] == "verifyOTP"){
            $otp_post = $_POST['otp'];
            $arr = [];
            $arr['user_id'] = $_SESSION['user_id'];

            $otp = new Otp;
            $result = $otp->where($arr);
            $hash = $result[0]['otp'];
            $status = $result[0]['status'];
            if(password_verify($otp_post, $hash) && $status == 'pending'){
                $arr = [];
                $arr['status'] = 'verified';
                $otp->updateOtp($arr);
                $tech = new Technician;
                $tech->updateContactVerification($_SESSION['user_id']);
                $_SESSION['contact_verified'] = true;
                return true;
            }
            else{
                $hello = "Invalid OTP";
                return false;
            }
        }
    }



    protected function mobileNumberValidation($mobile_no){
        //check for whether mobile number is in a valid format
        if(!preg_match("/^[0-9]{9}$/", $mobile_no)){
            return false;
        }
        return true;
    }

}
