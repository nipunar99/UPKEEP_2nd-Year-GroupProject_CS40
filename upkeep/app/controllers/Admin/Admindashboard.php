<?php
class Admindashboard{

    use Controller;
        
    public function index(){

        //$moderator=new User;
        //$moderators= $moderator->viewmod();

        //$data['mods']=$moderators;

        
        
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            redirect('/Home');
        }else{
            $user = new User;
            $mod = new User;
            $moderator_list = $mod->getAllModerators();
            $data['moderators'] = $moderator_list;
            //show($moderator_list);

            $total_users = $user->getTotalItemOwners();
            $data['user_counts']= $total_users;

            $total_technician = $user->getTotalTechnician();
            $data['technician_counts']= $total_technician;
            // show($total_users);

            $banned_users_list = $user->getUserBannedAcc();
            $data['banned_users'] = $banned_users_list;
            // show($banned_users_list);


            $item = new Itemtemplates;
            $approved_items = $item->getTotalItems();
            $data['item_counts']= $approved_items;
            //  show($approved_items);

            $pending_items = $item->getTotalPendingItems();
            $data['pendingitem_counts']= $pending_items;

            $registered_approval=new VerificationRequest;
            $registered_list=$registered_approval->getCountOfRegisteredApproval();
            $data['registered_counts']=$registered_list;

            $pending_approval= new VerificationRequest;
            $pending_list = $pending_approval->getCountOfPendingApproval();
            $data['pending_counts']=$pending_list;
            // show($pending_list);

            $reject_approval=new VerificationRequest;
            $reject_list=$reject_approval->getCountOfRejectApproval();
            $data['reject_counts']=$reject_list;
            // show($reject_list);

            //sshow($_SESSION);
            $this->view('Admin/adminDashboard',$data);
            
        }    
    
    }
           
}