<?php

class Addmoderator {

    use Controller;
    

     public function index(){
        
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){
            $this->view('Admin/adminDashboard');
           // redirect('/Home');
        }else{
            $admin = new User;
            $admin_list = $admin->getAllAdmin();
            $data['admin'] = $admin_list;
            //show($admin_list);
            $this->view('Admin/addmoderator',$data);
        }
    }    

    public function addModeratorfunc(){ 
        if(isset($_POST['action']) && $_POST['action']=="addmoderator"){
            unset($_POST['action']);
       
            // show($_POST);
            $arr=[];
            $arr['nic'] = $_POST['nic'];
            $arr['address'] = $_POST['address'];
            unset($_POST['address']);unset($_POST['nic']);

            $_POST['password'] = password_hash('upkeep!@123',PASSWORD_DEFAULT);
            $_POST['user_role'] = 'moderator';


            
            $user = new User;
            $user_id=$user->insertAndGetLastIndex($_POST);


            $arr['user_id'] = $user_id;
            // show($arr);
            $mod = new AdministrativeUser;
            $mod->insert($arr);
        }
        
    }
 
        



    public function addAdminfunc(){ 
        //show($_POST);
        if(isset($_POST['action']) && $_POST['action']=="addadmin"){
            unset($_POST['action']);// POST tiyan action key ainkral dnw
        //show($_POST);
        $arr=[];
        $arr['nic'] = $_POST['nic'];
        $arr['address'] = $_POST['address'];
        unset($_POST['address']);unset($_POST['nic']);

        $_POST['password'] = password_hash('upkeep!@123',PASSWORD_DEFAULT);
        $_POST['user_role'] = 'admin';

            
        $user = new User;
        $user_id=$user->insertAndGetLastIndex($_POST);

        $arr['user_id'] = $user_id;


        $admin = new AdministrativeUser;
        $admin->insert($arr);
        }

        
    }

    public function addUpdatedfunc(){
        if(isset($_POST['action']) && $_POST['action']=="updateadminmoderator"){
            unset($_POST['action']);// POST tiyan action key ainkral dnw

            // show($_POST);
            $arr=[];
            $arr['nic']=$_POST['nic'];
            $arr['address']=$_POST['address'];
            // $arr['user_id']=$_POST['user_id'];

            $user_id=$_POST['user_id'];

            unset($_POST['nic']);unset($_POST['address']);unset($_POST['user_id']);
            
            
            $user = new User;
           
            $user->update($user_id,$_POST,"user_id");

            // $arr['user_id'] = $user_id;


            $update_admin = new AdministrativeUser;
            $update_admin->update($user_id,$arr,"user_id");

    }
    
}

    public function removefunc(){
        if(isset($_POST['action']) && $_POST['action']=="removeadminmoderator"){
            unset($_POST['action']);
            
            $user_id=$_POST['user_id'];
            // unset($_POST['nic']);unset($_POST['address']);
            $user = new User;
            $user->delete($user_id,"user_id");
    }
}
}







    