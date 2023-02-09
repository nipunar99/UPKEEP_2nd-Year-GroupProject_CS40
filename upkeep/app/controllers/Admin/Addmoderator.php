<?php

class Addmoderator {

    use Controller;
    
    public function index (){
        
         if($_SESSION['USER'] == 'Admin'){
            $data =[];
             if($_SERVER['REQUEST_METHOD'] == "POST"){
                 $mod = new AddMod;
                  /* if($mod->validate($_POST))
                  {
                     $mod->insert($_POST);
                     redirect("Admin/Admindashboard");
                
                
                $data["errors"] = $user->errors; */
                $mod->insert($_POST);
                redirect("Admin/Addmoderator");
                
                
                


             }
             $this->view('Admin/addmoderator');
             
         }
         else{
             redirect("Home/home");
         }
        
     }

}


    