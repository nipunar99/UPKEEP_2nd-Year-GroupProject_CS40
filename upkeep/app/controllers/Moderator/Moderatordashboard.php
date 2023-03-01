<?php

class Moderatordashboard {

    use Controller;
    public function index (){
        
        if(isset($_SESSION['user_id'])){
            $this->view('Moderator/moderatorDashboard');
        }else{
            redirect("Home/home");
        }

    }
    public function total_tem(){
        $total = new Itemtemplates;
        $result = $total->find();
        $result1 = json_encode($result);
      
        echo($result1);

    }
    public function approvel(){
        $total = new Itemtemplates;
       
    $result_pending = $total->pending();
        $result1 = json_encode($result_pending);
 
     $result1 = json_encode($result_pending);
      
        echo($result1);

    }
    public function complaint(){
      
       $total_un = new Complaints;
    $result_unhandle = $total_un->unhandle();
    $result1 = json_encode($result_unhandle);
      
        echo($result1);

    }
}