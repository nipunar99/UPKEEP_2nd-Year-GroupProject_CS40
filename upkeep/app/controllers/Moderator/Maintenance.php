<?php

use Maintenances as GlobalMaintenances;

class Maintenance {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $arr=[];
            $suggestions = new Maintenances;
            $result = $suggestions->findAll();
            $data['result'] = $result;

            $this->view('Moderator/maintenance',$data);
        }else{
            redirect("Home/home");
        }

    }

}