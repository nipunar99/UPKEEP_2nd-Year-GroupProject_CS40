<?php

class Signup {

    use Controller;
    public function itemOwnerSignup (){
        $data =[];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $user = new User;

            if($user->validate($_POST))
            {

                $_POST['user_role'] = "item_owner";
                $user->preprocess($_POST);
                redirect("Home");
            }
            
            $data["errors"] = $user->errors;
        }
        $this->view('/Signup/itemOwnerSignup',$data);// (folder name/php filename)
    }

    public function technicianSignup (){
        
        //Rahal  singin controler method
        $data =  [];

        if($_SERVER['REQUEST_METHOD']=="POST"){
            $user = new User;

            if($user->validate($_POST)){
                $user->insert($_POST);
                redirect('Home');
            }

            $data= $user->errors;
        }

        $this->view('/Signup/technicianSignup',$data);

    }

    public function moderatorSignup (){
        
        //sasini  singin controler method
        $data =[];
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $moderator = new Moderator;

            if($moderator->validate($_POST))
            {
                $moderator->insert($_POST);
                redirect("Home");
            }
            
            $data["errors"] = $moderator->errors;
        }
        
        $this->view('/Signup/moderatorSignup',$data);


    }

    public function adminSignup (){
        
        //rusith  singin controler method
        $data =[];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $admin = new Admin;

            if($admin->validate($_POST))
            {
                $admin->insert($_POST);
                redirect("Home");
            }
            
            $data["errors"] = $admin->errors;
        }
        
        $this->view('/Signup/adminSignup',$data);// (folder name/php filename)


    }

}
