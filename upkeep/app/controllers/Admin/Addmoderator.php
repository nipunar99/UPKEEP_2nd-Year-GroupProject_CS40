<?php

class Addmoderator {

    use Controller;
    
    //public function index (){
        
    //      if($_SESSION['USER'] == 'Admin'){
    //         $data =[];
    //         if($_SERVER['REQUEST_METHOD'] == "POST"){
    //             $mod = new AddMod;
                  
    //             $mod->insert($_POST);
    //             redirect("Admin/Addmoderator");
                
                                
    //         }

    //          $this->view('Admin/addmoderator');
             
    //      }
    //      else{
    //          redirect("Home/home");
    //      }
        
    //  }

     public function index(){
        
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
        }else{
            $this->view('Admin/addmoderator');
        }    
    
    }
}




    