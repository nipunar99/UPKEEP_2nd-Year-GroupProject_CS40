<?php

class AddDisposal_places {

    use Controller;
    
    public function index (){
        
        if(isset($_SESSION['user_id'])){
            
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $errors = [];
                if (empty($_POST['place_name'])) {
                    $errors[] = "Place name is required";
                }
              
                if (empty($_POST['city'])) {
                    $errors[] = "City is required";
                  }
                  else if (!preg_match("/^[a-zA-Z]+$/", $_POST['city'])) {
                    $errors[] = "City should only contain letters";
                    }
                if (empty($_POST['iframe_link'])) {
                    $errors[] = "Iframe link is required";
                  }
                 
                  if (preg_match('/^(https?:\/\/)(www\.)?(google\.com\/maps\/embed\?pb=)[\w-]+/', $_POST['iframe_link'])) {
                    
                  } else {
                    $errors[] =  "Invalid iframe link";
                  }
                  
                  if (empty($errors)) {
                $itemDisposal = new DisposalMaps;           
                $place_name = $_POST['place_name'];
                $city = $_POST['city'];
                $iframe_link = $_POST['iframe_link'];
                $itemDisposal->insertDisposalplaces($place_name,$city,$iframe_link);
                redirect("Moderator/itemtemplate");
            }
            else{
                foreach ($errors as $error) {
                    echo "<p>" . $error . "</p>";
                  }
            }
        }
            $this->view('Moderator/addDisposal_places');
        }else{
            redirect("Home/home");
        }
        
    }

}
