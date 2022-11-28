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
                // redirect("s");
            }
            
            $data["errors"] = $user->errors;
        }
        
        $this->view('/Signup/itemOwnerSignup',$data);// (folder name/php filename)

    }

    public function technicianSignup (){
        
        //Rahal  singin controler method

    }

    public function moderatorSignup (){
        
        //sasini  singin controler method

    }

    public function adminSignup (){
        
        //rusith  singin controler method

    }

}
