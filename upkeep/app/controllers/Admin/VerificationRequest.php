<?php

class VerificationRequest {

    use Controller;
    
    public function index (){
        
         if($_SESSION['USER'] == 'Admin'){
            //$data =[];
             /* if($_SERVER['REQUEST_METHOD'] == "POST"){
                 $mod = new VerificationRequest ;
                   if($mod->validate($_POST))
                  {
                     $mod->insert($_POST);
                     redirect("Admin/Admindashboard");
                
                
                $data["errors"] = $user->errors; */
                /* $mod->insert($_POST);
                redirect("Admin/VerificationRequest"); */ 
                $this->view('Admin/verificationRequest');
             }
             else{
                redirect("Home/home");
            }
             
         }
         
        
     }




    