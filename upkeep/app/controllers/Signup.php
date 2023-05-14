<?php

class Signup {

    use Controller;
    public function itemOwnerSignup (){
        $data =[];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $user = new User;
 
            if($user->validate($_POST))
            {
                $_POST['user_name'] = $user->generateUserName($_POST['first_name'],$_POST['last_name']);
                $_POST['user_role'] = "item_owner";
                $user->preprocess($_POST);
                redirect("Home");
            }
            
            $data["errors"] = $user->errors;
        }
        $this->view('/Signup/itemOwnerSignup',$data);// (folder name/php filename)
    }

    public function technicianSignup (){
        if(isset($_SESSION['user_id']))
            redirect('/Technician/Dashboard');
        $data = [];
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $user = new User;

            if($user->validate($_POST)){
                $post =  [
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'user_name' => $user->generateUserName($_POST['first_name'],$_POST['last_name']),
                    'email' => $_POST['email'],
                    'user_role' => 'Technician',
                    'password' => password_hash($_POST['password'],PASSWORD_DEFAULT)
                ];
                $user->insert($post);
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


            $user = new User;

            if($user->validate($_POST))
            {
                $post = [
                    'first_name'=>$_POST['first_name'],
                    'last_name'=>$_POST['last_name'],
                    'user_name'=>$user->generateUserName($_POST['first_name'],$_POST['last_name']),
                    'email'=>$_POST['email'],
                    'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT),
                    'user_role'=>'Moderator'
                ];
                $user->insert($post);
                redirect("Home");
            }
            
            $data["errors"] = $user->errors;
        }
        
        $this->view('/Signup/moderatorSignup',$data);


    }

    public function adminSignup (){
        
        //rusith  singin controler method
        $data =[];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $user = new User;

            if($user->validate($_POST))
            {
                $_POST['user_name'] = $user->generateUserName($_POST['first_name'],$_POST['last_name']);
                $_POST['user_role'] = "admin";
                $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
                $user->insert($_POST);
                redirect("Home");
            }
            
            $data["errors"] = $user->errors;
        }
        
        $this->view('/Signup/adminSignup',$data);// (folder name/php filename)


    }

}
