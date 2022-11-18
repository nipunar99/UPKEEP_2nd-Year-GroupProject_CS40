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
                    $_SESSION['USER'] = 'Owner';
                    redirect('Itemowner/Userdashboard');
                } 
            }

            $user->errors['email']="Wrong email or password";
            $data['errors'] = $user->errors;
        }

        $this->view('/Signin/itemOwnerSignin',$data);
    }

    public function technicianSignin (){
        
        //Rahal  singin controler method

    }

    public function moderatorSignin (){
        
        //sasini  singin controler method

    }

    public function adminSignin (){
        
        //Rusiya  singin controler method

    }
}
