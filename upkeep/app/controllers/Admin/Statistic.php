<?php
class Statistic{

    use Controller;
        
    public function index(){
        
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
        }else{
            $user = new User;
            $total_users = $user->getTotalUser();
            $data['user_counts']= $total_users;

            $total_technician = $user->getTotalTechnician();
            $data['technician_counts']= $total_technician;

            $total_item_owners = $user->getTotalItemOwners();
            $data['item_owner_counts']= $total_item_owners;


            $banned_users_list = $user->getBannedAcc();
            $data['banned_users'] = $banned_users_list;

            $total_admin_users = $user->getTotalAdministrativeUser();
            $data['administrative_counts']= $total_admin_users;

            $total_admin = $user->getTotalAdmin();
            $data['admin_counts']= $total_admin;

            $total_moderators = $user->getTotalModerator();
            $data['moderator_counts']= $total_moderators;

            $complaint = new Complaint;
            $data['complaint_list'] = $complaint->getComplaint();

            // $data['complaint_counts'] = $complaint->getTotalComplaints();

            


            $this->view('Admin/statistic',$data);
        }    
    
    }
        
        
}