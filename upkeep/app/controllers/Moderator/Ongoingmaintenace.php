<?php

class Ongoingmaintenace {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $arr=[];
            $suggestions = new Ongoingmaintenances;
            $result = $suggestions->findAll();
            $data['result'] = $result;

            $this->view('Moderator/ongoingmaintenance',$data);
        }else{
            redirect("Home/home");
        }

    }

}