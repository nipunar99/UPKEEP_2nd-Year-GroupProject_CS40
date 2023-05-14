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

             $tech_count = $tech->getCountOfPendingApproval();
             $data['verify_tech'] = $tech_count;
             //show($data);

            // $verify_list = $tech->getVerifyAcc();
            // $data['verify_tech'] = $verify_list;

            // $profile_photo=new User;
            // $profile_picture=$profile_photo->getProfilePhoto();
            // $data['profile_pic']=$profile_picture;
            $this->view('Admin/verifyRequest',$data);
        }    
    }
    
    public function viewrequest($id){
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
         }else{
            $verify_request = new VerificationRequest;
            $profile_details = $verify_request->getProfile($id);

            $data['profile'] = $profile_details;
            //show($profile_details);
            $this->view('Admin/verificationRequest',$data);
         }   
    }

    public function verifyTechnicianfunc(){
        if(isset($_POST['action']) && $_POST['action']=="verifytechnician"){
            unset($_POST['action']);

            // show($_POST);
            $arr=[];$arr1=[];
           
            $arr['status'] = 'accepted';

            $arr1['identity_verification']='verified';
           
            $_POST['account_status']='active';

            $user_id=$_POST['user_id'];

            $update_verifytechnician = new VerificationRequest;
            $update_verifytechnician->update($user_id,$arr,"user_id");
            $update_verifytechnician->delete($user_id,"user_id");
            

            
            $update_technician = new Technician;
            $update_technician->update($user_id,$arr1,"user_id");
            redirect('Admin/VerifyRequest');

    }
    
}

    public function rejectTechnician(){
        show($_POST);

        if(isset($_POST['action']) && $_POST['action']=="rejecttechnician"){
            unset($_POST['action']);
            $user_id =$_POST['user_id'];


            $arr=[];$arr1=[];
            $arr['status'] = 'rejected';

            $arr1['identity_verification']='declined';

            $update_rejecttechnician = new VerificationRequest;
            $update_rejecttechnician->update($user_id,$arr,"user_id");

            $reject_technician = new Technician;
            $reject_technician->update($user_id,$arr1,"user_id");
            
    }
}


}