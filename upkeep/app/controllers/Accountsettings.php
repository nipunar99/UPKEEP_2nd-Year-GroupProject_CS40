<?php

class Accountsettings
{
    use Controller;
    use Auth;

    public function index(){
//        $this->userAuth();
        $data = [];
        $user = new User;
        $data['user'] = json_encode($user->getProfileDataForUser($_SESSION['user_id']));

        $this->view('accountsettings',$data);
    }

    public function updateProfile(){
        if(!isset($_SESSION['user_id'])){
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }

        if(isset($_POST) && $_POST['action'] == 'update_profile') {
            unset($_POST['action']);


            $user = new User;

            //process image input
            try {
                if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
                    $directory = "\\xampp\\htdocs\\upkeep\\upkeep\\public\\assets\\images\\profilepic";
                    $fileuploader = new FileUploader($directory);

                    if($profile_picture_name = $user->hasProfilePicture($_SESSION['user_id'])){
                        $fileuploader->deleteFile($profile_picture_name);
                    }

                    $file_name= $fileuploader->uploadFile($_FILES['profile_picture']);
                    unset($_POST['profile_picture_input']);
                    $_POST['profile_picture'] = $file_name;
                }
            }catch (Exception $e){
                $error = $e->getMessage();
                http_response_code(500);
                echo json_encode(['error' => $error]);
                exit;
            }


            $user_id = $_SESSION['user_id'];
            $data = $_POST;


            if ($user->validate($data)) {
                try {
                    $new_user_data = $user->updateProfile($user_id, $data);;
                    http_response_code(200);
                    echo json_encode(['success' => 'Profile updated successfully', 'user' => $new_user_data]);
                } catch (PDOException $e) {
                    $error = $e->getMessage();
                    http_response_code(500);
                    echo json_encode(['error' => $error]);
                }
            } else {
                http_response_code(400);
                echo json_encode($user->errors);
            }

        }
    }

    public function removeProfilePicture(){
        if(!isset($_SESSION['user_id'])){
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }

        if(isset($_POST) && $_POST['action'] == 'remove_profile_picture') {
            unset($_POST['action']);

            $user = new User;

            //process image input
            try {
                if($profile_picture_name = $user->hasProfilePicture($_SESSION['user_id'])){
                    $directory = "\\xampp\\htdocs\\upkeep\\upkeep\\public\\assets\\images\\profilepic";
                    $fileuploader = new FileUploader($directory);
                    $fileuploader->deleteFile($profile_picture_name);
                    $new_user_data = $user->updateProfile($_SESSION['user_id'],['profile_picture' => null]);
                    http_response_code(200);
                    echo json_encode(['success' => 'Profile picture removed successfully', 'user' => $new_user_data]);
                }else{
                    http_response_code(400);
                    echo json_encode(['error' => 'No profile picture to remove']);
                }
            }catch (Exception $e){
                $error = $e->getMessage();
                http_response_code(500);
                echo json_encode(['error' => $error]);
                exit;
            }
        }
    }

    public function updatePassword(){
        if(!isset($_SESSION['user_id'])){
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }

        if(isset($_POST) && $_POST['action'] == 'update_password') {
            unset($_POST['action']);

            $user = new User;

            $user_id = $_SESSION['user_id'];
            $currentPassword = $_POST['current_password'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['repeat_new_password'];

            //validate current password
            if(!$user->validatePassword($user_id,$currentPassword)){
                http_response_code(400);
                echo json_encode(['current_password' => 'Current password is incorrect']);
                exit;
            }

            //validate new password
            if(!$user->validateNewPassword($newPassword,$confirmPassword)){
                http_response_code(400);
                echo json_encode(['repeat_new_password' => 'New password and confirm password do not match']);
                exit;
            }

            $data = ['password' => password_hash($newPassword, PASSWORD_DEFAULT)];

            //update password

            if ($user->validate($data)) {
                try {
                    $new_user_data = $user->updateProfile($user_id, $data);;
                    http_response_code(200);
                    echo json_encode(['success' => 'Password updated successfully', 'user' => $new_user_data]);
                } catch (PDOException $e) {
                    $error = $e->getMessage();
                    http_response_code(500);
                    echo json_encode(['error' => $error]);
                }
            } else {
                http_response_code(400);
                echo json_encode($user->errors);
            }

        }
    }

}