<?php
class VerifyRequest{

    use Controller;
        
    public function index(){
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
        }else{

            $tech = new VerifyTechnician;
            $tech_list =$tech->getverifytech();
            $data['technician'] = $tech_list; 

            $verify_list = $tech->getVerifyAcc();
            $data['verify_tech'] = $verify_list;
            $this->view('Admin/verifyRequest',$data);
        }    
    }     
}