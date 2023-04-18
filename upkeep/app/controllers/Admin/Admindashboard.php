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
            $mod = new Moderator;
            $moderator_list = $mod->getAllModerators();
            $data['moderators'] = $moderator_list;
            //show($moderator_list);

            $total_users = $user->getTotalUser();
            $data['user_counts']= $total_users;
            // show($total_users);

            $banned_users_list = $user->getBannedAcc();
            $data['banned_users'] = $banned_users_list;
            // show($banned_users_list);


            $item = new Itemtemplates;
            $approved_items = $item->getApprovedItems();
            $data['item_counts']= $approved_items;
            //  show($approved_items);

            
            $this->view('Admin/adminDashboard',$data);
            
        }    
    
    }
           
}