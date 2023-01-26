<?php

class Home {

    use Controller;
    public function index (){
        

        if(!isset($_SESSION['user_name'])){
            $this->view('home');
        }
        else{
            switch ($_SESSION['user_role']) {
                case 'Itemowner':
                    redirect('Itemowner/Userdashboard');
                    break;
                
                case 'Technician':
                    redirect('Technician/Dashboard');
                    break;

                case 'Moderator':
                    redirect('Moderator/Moderatordashboard');
                    break;

                case 'Admin':
                    redirect('Admin/Admindashboard');
                    break;
               
            }
        }

    }
    
}
