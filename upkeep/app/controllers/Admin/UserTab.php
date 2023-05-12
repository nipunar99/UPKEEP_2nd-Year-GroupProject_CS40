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
    
    
    public function addBannedReason(){

            if(isset($_POST['action']) && $_POST['action']=="banneduser"){
                unset($_POST['action']);// POST tiyan action key ainkral dnw
            
            $_POST['admin_id'] = $_SESSION['user_id'];
            $banned = new BannedUser;
            $banned->insert($_POST);

            }
    
            
        }

    }
        
        
