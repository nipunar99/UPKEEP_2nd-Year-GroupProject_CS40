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
    
}
