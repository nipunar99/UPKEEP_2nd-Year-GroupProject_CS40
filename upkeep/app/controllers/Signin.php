<?php

class Signin {

    use Controller;
    public function itemOwnerSignin (){
        $data =[];

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $user = new User;
            $arr['email'] = $_POST['email'];

            $row = $user->first($arr);

            if($row)
            {
                if($row->password === $_POST['password']){
                    $_SESSION['USER'] = $row->id;
                    $_SESSION['id'] = $row->id;

                    redirect('Itemowner/Userdashboard');
                } 
            }

            $user->errors['email']="Wrong email or password";
            $data['errors'] = $user->errors;
        }

        $this->view('/Signin/itemOwnerSignin',$data);
    }

    public function technicianSignin (){
        
        $data = [];

        if($_SERVER['REQUEST_METHOD']=="POST"){
            $user = new User;
            $email = $_POST["email"];
            $row = $user->getUserByEmail($email);

            if($row){
                if($row->password===$_POST['password']){
                    $_SESSION['user_id'] = $row->user_id;
                    $_SESSION['user_name'] = $row->user_name;
                    $_SESSION['user_role'] = $row->user_role;
                    redirect('Technician/Dashboard');
                    return true;
                }
            }

            $user->errors["email"] = "email or password not valid";
            $data["errors"]= $user->errors;
        }

        $this->view('/Signin/technicianSignin');

    }

    public function moderatorSignin (){
        
        //sasini  singin controler method
        $data =[];

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $moderator = new Moderator;
            $arr['email'] = $_POST['email'];

            $row = $moderator->first($arr);

            if($row)
            {
                if($row->password === $_POST['password']){
                    $_SESSION['USER'] = 'Moderators';
                    redirect('Moderator/Moderatordashboard');
                } 
            }

            $moderator->errors['email']="Wrong email or password";
            $data['errors'] = $moderator->errors;
        }

        $this->view('/Signin/moderatorSignin',$data);
    }

    public function adminSignin (){
        
        //Rusiya  singin controler method

    }
}
