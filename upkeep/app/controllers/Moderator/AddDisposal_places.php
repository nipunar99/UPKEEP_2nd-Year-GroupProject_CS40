<?php

class AddDisposal_places {

    use Controller;
    
    public function index (){
        
        if(isset($_SESSION['user_id'])){
            
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $itemDisposal = new DisposalMaps;           
                $place_name = $_POST['place_name'];
                $city = $_POST['city'];
                $iframe_link = $_POST['iframe_link'];
                $itemDisposal->insertDisposalplaces($place_name,$city,$iframe_link);
                redirect("Moderator/itemtemplate");
            }
            $this->view('Moderator/addDisposal_places');
        }else{
            redirect("Home/home");
        }
        
    }

}
