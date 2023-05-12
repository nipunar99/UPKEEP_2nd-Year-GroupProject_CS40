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
        $result = json_encode($total->countItemtemplate());  
        echo($result);

    }
    public function approvel(){
        $total = new Itemtemplates;     
        $result = json_encode($total->countPendingItemtemplate());
        echo($result);

    }
    public function complaint(){   
    $total_un = new Complaints;
    $result = json_encode($total_un->unhandle());
    echo($result);

    }
    public function itemsuggestions(){
        $suggestions = new Itemtemplates;
        $result = json_encode($suggestions->getSuggestionDetails());
        echo $result;
    }
}