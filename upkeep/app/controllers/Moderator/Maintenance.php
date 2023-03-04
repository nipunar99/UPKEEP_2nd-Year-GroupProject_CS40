<?php

use Maintenances as GlobalMaintenances;

class Maintenance {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $arr=[];
            $suggestions = new Maintenance_templates;
            // $result = $suggestions->findAll();
            // $data['result'] = $result;

            $this->view('Moderator/maintenance');
        }else{
            redirect("Home/home");
        }

    }

}