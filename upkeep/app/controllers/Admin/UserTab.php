<?php
class UserTab{

    use Controller;
        
    public function index(){
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
        }else{
            $user = new User;
            $technician_list = $user->getVerifyTechnician();
            $data['technician'] = $technician_list;
            // show($technician_list);
            $this->view('Admin/user',$data);
        }    
    }     
        
        
}