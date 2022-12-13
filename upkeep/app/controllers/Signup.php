<?php

class Signup {

    use Controller;
    public function itemOwnerSignup (){
        $data =[];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $user = new User;

            if($user->validate($_POST))
            {
                $user->insert($_POST);
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
        if(isset($_SESSION['user_id'])){
            redirect('/Moderator/Moderatordashboard');
        }
        //sasini  singin controler method
        $data =[];
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){


            $moderator = new Moderator;

            if($moderator->validate($_POST))
            {
                $post = [
                    'first_name'=>$_POST['first_name'],
                    'last_name'=>$_POST['last_name'],
                    'user_name'=>$_POST['user_name'],
                    'email'=>$_POST['email'],
                    'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT)
                ];
                $moderator->insert($post);
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
