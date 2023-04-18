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
<<<<<<< Updated upstream

        $tech = new Technician;
        $technicianData = $tech->getTechnicianById($_SESSION['user_id']);
        $data['technician'] = json_encode($technicianData);

        $this->view('Technician/getverified',$data);
    }

    public function sendOTP(){
=======

        $tech = new Technician;
        $ver = $tech->isVerified($_SESSION['user_id']);
        show($ver);
        show($_SESSION['verified']);

        $this->view('Technician/getverified');
    }

    public function sendOTP(){
        //show($_POST);
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
            $mobile_no_with_code = $contry_code.$mobile_no;
            $_SESSION['mobile_no'] = $mobile_no_with_code;

            //preparing the data to be added to database
            $arr['user_id'] = $_SESSION['user_id'];
            $arr['mobile_no'] = $mobile_no_with_code;
            $arr['otp'] = $hash;
            $arr['expires_at'] = date('Y-m-d H:i:s', strtotime('+10 minutes'));

            //Inserting OTP into the database
            $otp = new Otp;
            $otp->insertOtp($arr);
=======

            //preparing the data to be added to database
            $arr['user_id'] = $_SESSION['user_id'];
            $arr['mobile_no'] = $contry_code.$mobile_no;
            $arr['otp'] = $hash;
            $arr['datetime'] = date("Y-m-d H:i:s");
            $arr['status'] = 'pending';

            //Inserting OTP into the database
            $otp = new Otp;
            //$otp->insertOtp($arr);
>>>>>>> Stashed changes

            //Sending OTP using the telesign API
            $message = "Your OTP is " . $otp_num;
            $mobile = $arr['mobile_no'];
            $customer_id = "7EBDE7B2-57E7-4623-9FE0-CC7085F21644";
            $api_key = "UkGKtxQ4tn/Gd6FEdBoepaFY38kMt6FlWKWZORps8pk8XKdQWQmVBxqpL5QGzEZINAPfP1IZSvDaMHg7wkHaKw==";
            $message_type = "ARN";
            $messaging = new MessagingClient($customer_id, $api_key);
<<<<<<< Updated upstream
            $response = $messaging->message($mobile, $message, $message_type);
            if ($response->ok) {
                http_response_code(200);
                echo ($response->json);
            } else {
                http_response_code(500);
                $arr['error'] = "Something went wrong";
                $err_response = json_encode($arr);
                echo($err_response);
                exit();
            }
        }
=======
            //$response = $messaging->message($mobile, $message, $message_type);
            //show($messaging);
            //echo($response);
            $test['sending'] = 'true' ;
            echo json_encode($test);
        }
        echo "Out of if";
>>>>>>> Stashed changes
    }

    public function verifyOTP()
    {
<<<<<<< Updated upstream
//        show($_POST);
=======
>>>>>>> Stashed changes
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action']) && $_POST['action'] == "verifyOTP"){
            $otp_post = $_POST['otp'];
            $arr = [];
            $arr['user_id'] = $_SESSION['user_id'];
<<<<<<< Updated upstream
            $arr['mobile_no'] = $_SESSION['mobile_no'];

            $otp = new Otp;
            $result = $otp->where($arr);

            if(!$result){ //if no record found
                http_response_code(400);
                $arr_err1['error'] = "Invalid OTP";
                $err_response = json_encode($arr_err1);
                echo($err_response);
                exit();
            }
            elseif ($result[0]->expires_at < date('Y-m-d H:i:s')) {
                http_response_code(400);
                $arr_err2['error'] = "OTP expired";
                $err_response = json_encode($arr_err2);
                echo($err_response);
                exit();
            }
            else{
                $hash = $result[0]->otp;
                if(password_verify($otp_post, $hash)){
                    //deleting the otp record
                    $arr_data['user_id'] = $_SESSION['user_id'];
                    $arr_data['mobile_no'] = $_SESSION['mobile_no'];
                    $otp->delete($_SESSION['mobile_no'],'mobile_no');

                    //updating the user table
                    $user = new User;
                    $user->update($_SESSION['user_id'], ['mobile_no' => $_SESSION['mobile_no']],'user_id');

                    //updating the technician table
                    $tech = new Technician;
                    $tech->updateContactVerification($_SESSION['user_id']);
                    $_SESSION['contact_verified'] = true;
                    http_response_code(200);
                    $arr_scc['success'] = "Contact verified";
                    $err_response = json_encode($arr_scc);
                    echo($err_response);
                    exit();
                }
                else{
                    http_response_code(400);
                    $arr_err['error'] = "Invalid OTP";
                    $err_response = json_encode($arr_err);
                    echo($err_response);
                    exit();
                }
=======

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
>>>>>>> Stashed changes
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
