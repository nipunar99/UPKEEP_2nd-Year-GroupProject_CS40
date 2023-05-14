<?php

$grandparent_dir = dirname(dirname(dirname(__DIR__)));
require $grandparent_dir . '/vendor/autoload.php';

use telesign\sdk\messaging\MessagingClient;

class Getverified
{

    use Controller;
    use Auth;

    public function index()
    {
        $this->checkAuth();

        $tech = new Technician;
        $technicianData = $tech->getTechnicianById($_SESSION['user_id']);
        $data['technician'] = json_encode($technicianData);
        $this->view('Technician/getverified', $data);
    }

    public function sendOTP()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action']) && $_POST['action'] == "sendOTP") {
            //Validating mobile number
            if (!$this->mobileNumberValidation($_POST['mobile_number'])) {
                //http_response_code(422);
                header("HTTP/1.1 422 Unprocessable Entity");
                $arr['error'] = "Invalid mobile number";
                $err_response = json_encode($arr);
                echo ($err_response);
                exit();
            }

            //retrievind data from post request
            $contry_code = ltrim($_POST['country_code'], "+");
            $mobile_no = $_POST['mobile_number'];
            $mobile_no_with_code = $contry_code . $mobile_no;
            $_SESSION['mobile_no'] = $mobile_no_with_code;


            //Checking whether the mobile number is already verified
            $tech = new Technician;
            if ($tech->isContactVerified($_SESSION['user_id'], $_SESSION['mobile_no'])) {
                http_response_code(400);
                $arr['error'] = "Mobile number already verified";
                $err_response = json_encode($arr);
                echo ($err_response);
                exit();
            }

            //Generating OTP
            $otp_num = rand(100000, 999999);
            $hash = password_hash($otp_num, PASSWORD_DEFAULT);
            $arr = [];


            //preparing the data to be added to database
            $arr['user_id'] = $_SESSION['user_id'];
            $arr['mobile_no'] = $mobile_no_with_code;
            $arr['otp'] = $hash;
            $arr['expires_at'] = date('Y-m-d H:i:s', strtotime('+10 minutes'));

            //Inserting OTP into the database
            $otp = new Otp;
            $otp->insertOtp($arr);

            //Sending OTP using the telesign API
            $message = "Your OTP is " . $otp_num;
            $mobile = $arr['mobile_no'];
            $customer_id = "7EBDE7B2-57E7-4623-9FE0-CC7085F21644";
            $api_key = "UkGKtxQ4tn/Gd6FEdBoepaFY38kMt6FlWKWZORps8pk8XKdQWQmVBxqpL5QGzEZINAPfP1IZSvDaMHg7wkHaKw==";
            $message_type = "ARN";
            $messaging = new MessagingClient($customer_id, $api_key);
            $response = $messaging->message($mobile, $message, $message_type);
            if ($response->ok) {
                http_response_code(200);
                echo ($response->json);
            } else {
                http_response_code(500);
                $arr['error'] = "Something went wrong";
                $err_response = json_encode($arr);
                echo ($err_response);
                exit();
            }
        }
    }

    public function verifyOTP()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action']) && $_POST['action'] == "verifyOTP") {
            $otp_post = $_POST['otp'];
            $arr = [];
            $arr['user_id'] = $_SESSION['user_id'];
            $arr['mobile_no'] = $_SESSION['mobile_no'];

            $otp = new Otp;
            $result = $otp->where($arr);

            if (!$result) { //if no record found
                $arr_err1['error'] = "Invalid OTPs";
                $err_response = json_encode($arr_err1);
                echo ($err_response);
                exit();
            } elseif ($result[0]->expires_at < date('Y-m-d H:i:s')) {
                http_response_code(400);
                $arr_err2['error'] = "OTP expired";
                $err_response = json_encode($arr_err2);
                echo ($err_response);
                exit();
            } else {
                $hash = $result[0]->otp;
                if (password_verify($otp_post, $hash)) {
                    //deleting the otp record
                    $arr_data['user_id'] = $_SESSION['user_id'];
                    $arr_data['mobile_no'] = $_SESSION['mobile_no'];
                    $otp->delete($_SESSION['mobile_no'], 'mobile_no');

                    //updating the user table
                    $user = new User;
                    $user->update($_SESSION['user_id'], ['mobile_no' => $_SESSION['mobile_no']], 'user_id');

                    //updating the technician table
                    $tech = new Technician;
                    $tech->updateContactVerification($_SESSION['user_id']);
                    $_SESSION['contact_verified'] = true;
                    http_response_code(200);
                    $arr_scc['success'] = "Contact verified";
                    $err_response = json_encode($arr_scc);
                    echo ($err_response);
                    exit();
                } else {
                    http_response_code(400);
                    $arr_err['error'] = "Invalid OTP";
                    $err_response = json_encode($arr_err);
                    echo ($err_response);
                    exit();
                }
            }
        }
    }

    public function sendVerificationRequest(){
//        show($_FILES);
//        exit();
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action']) && $_POST['action'] == "sendVerificationRequest") {
            if (empty($_FILES['id_front']['name']) || empty($_FILES['id_back']['name']) || empty($_FILES['id_hand']['name'])) {
                http_response_code(400);
                $arr_err['error'] = "Please upload all 3 images";
                $err_response = json_encode($arr_err);
                echo($err_response);
                exit();
            }

            $image1 = $_FILES['id_front'];
            $image2 = $_FILES['id_back'];
            $image3 = $_FILES['id_hand'];
            $image1_name = $image1['name'];
            $image2_name = $image2['name'];
            $image3_name = $image3['name'];
            $image1_ext = explode('.', $image1_name);
            $image2_ext = explode('.', $image2_name);
            $image3_ext = explode('.', $image3_name);
            $image1_ext = strtolower(end($image1_ext));
            $image2_ext = strtolower(end($image2_ext));
            $image3_ext = strtolower(end($image3_ext));
            $allowed = array('jpg', 'jpeg', 'png');
            if (!in_array($image1_ext, $allowed) || !in_array($image2_ext, $allowed) || !in_array($image3_ext, $allowed)) {
                http_response_code(400);
                $arr_err['error'] = "Please upload images only";
                $err_response = json_encode($arr_err);
                echo($err_response);
                exit();
            }

            //make unique name for the images and name should contain the POST[user_id]
            try {
                $image1_name = uniqid($_POST['user_id'], true) . "." . $image1_ext;
                $image2_name = uniqid($_POST['user_id'], true) . "." . $image2_ext;
                $image3_name = uniqid($_POST['user_id'], true) . "." . $image3_ext;

                //inserting the data into the verification_request table
                $verificationRequest = new VerificationRequest;
                $arr2["user_id"] = $_SESSION['user_id'];
                $arr2["id_front"] = $image1_name;
                $arr2["id_back"] = $image2_name;
                $arr2["id_hand"] = $image3_name;
                $arr2["status"] = "pending";
                $arr2["date_created"] = date('Y-m-d H:i:s');
                $verificationRequest->insertVerification($arr2);

                //updating technician table
                $tech = new Technician;
                $tech->updateIdentityVerificationStatus($_SESSION['user_id'], 'pending');

                //uploading the images
                $image1_tmp = $image1['tmp_name'];
                $image2_tmp = $image2['tmp_name'];
                $image3_tmp = $image3['tmp_name'];
                $upload_dir = "\\xampp\\htdocs\\upkeep\\upkeep\\app\\secure_folder\\technician_verification\\";
                $image1_destination = $upload_dir . $image1_name;
                $image2_destination = $upload_dir . $image2_name;
                $image3_destination = $upload_dir . $image3_name;


                if (!move_uploaded_file($image1_tmp, $image1_destination) || !move_uploaded_file($image2_tmp, $image2_destination) || !move_uploaded_file($image3_tmp, $image3_destination)) {
                    http_response_code(500);
                    $arr_err['status']="error";
                    $arr_err['message'] = "Something went wrong";
                    $err_response = json_encode($arr_err);
                } else {
                    http_response_code(200);
                    $arr_scc['success'] = "Verification request sent";
                    $err_response = json_encode($arr_scc);
                }
                echo($err_response);
                exit();
            } catch (Exception|PDOException $e) {
                http_response_code(500);
                $arr_err['status']="error";
                $arr_err['message'] = "Something went wrong";
                $err_response = json_encode($arr_err);
                echo($err_response);
                exit();
            }
        }
    }


    //function to fetch the uploaded images in get request
    public function getImage($image_id){
        $image_id = $image_id[0];
        // Check if the user is authorized to access the image
        $user_id = $_SESSION['user_id'];
        $user_role = $_SESSION['user_role'];

        $verificationRequest = new VerificationRequest;
        $uploaded_by_user_id = $verificationRequest->getUserIdByImageId($image_id);

        // Check if the user trying to access the image is the user who uploaded the image or the system administrator
        if ($user_role === 'admin' || $user_id === $uploaded_by_user_id[0]->user_id) {
            // Set the appropriate content-type header based on the file extension
            $extension = pathinfo($image_id, PATHINFO_EXTENSION);
            switch ($extension) {
                case 'jpg':
                case 'jpeg':
                    header('Content-Type: image/jpeg');
                    break;
                case 'png':
                    header('Content-Type: image/png');
                    break;
                case 'gif':
                    header('Content-Type: image/gif');
                    break;
                default:
                    header('Content-Type: application/octet-stream');
                    break;
            }

        // Read the file from the secure directory and output it to the browser
            $secure_dir = '\\xampp\\htdocs\\upkeep\\upkeep\\app\\secure_folder\\technician_verification\\';
            $file_path = $secure_dir . $image_id;
            echo $file_path;
            readfile($file_path);
        } else {
            // User is not authorized to access the image
            http_response_code(403);
            echo 'Access denied.';
        }
    }



    protected function mobileNumberValidation($mobile_no)
    {
        //check for whether mobile number is in a valid format
        if (!preg_match("/^[0-9]{9}$/", $mobile_no)) {
            return false;
        }
        return true;
    }
}
