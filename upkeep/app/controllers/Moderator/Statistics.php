<?php

class Statistics {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $arr=[];
            $statisticss = new Statisticss;
            $result = $statisticss->findAll();
            $data['result'] = $result;

            $this->view('Moderator/statistics',$data);
        }else{
            redirect("Home/home");
        }

    }

}