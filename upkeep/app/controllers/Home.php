<?php

defined('ROOTPATH') OR exit("Access denied");


class Home {

    use Controller;
    public function index (){
        if(!isset($_SESSION['user_name'])){
            $this->view('home');
        }
        else{
            switch ($_SESSION['user_role']) {
                case 'item_owner':
                    redirect('Itemowner/Userdashboard');
                    break;
                
                case 'technician':
                    redirect('Technician/Dashboard');
                    break;

                case 'moderator':
                    redirect('Moderator/Moderatordashboard');
                    break;

                case 'admin':
                    redirect('Admin/Admindashboard');
                    break;
               
            }
        }
    }

    public function getUserImage(){
        $id = $_SESSION['USER']->user_id;
        $user = new User;
        $image = $user->getUserImage($id);
        if($image->profile_picture == null){
            $image = ['profile_picture'=>'user.png'];
        }
        else{
            $image = $image;
        }
//        show($image);
        echo json_encode($image);
    }
    
}
