<?php
class VerifyRequest{

    use Controller;
        
    public function index(){
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
        }else{

            

             $tech = new VerificationRequest;
             $tech_list =$tech->getverifytech();
             $data['technician'] = $tech_list; 
             //show($data);

             $tech_count = $tech->getcount();
             $data['verify_tech'] = $tech_count;
             //show($data);

            // $verify_list = $tech->getVerifyAcc();
            // $data['verify_tech'] = $verify_list;
            $this->view('Admin/verifyRequest',$data);
        }    
    }
    
    public function viewrequest($id){
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
         }else{
            
            $this->view('Admin/verificationRequest');
         }   
    }
}