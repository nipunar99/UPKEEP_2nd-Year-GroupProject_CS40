<?php

class Signin {

    use Controller;


    public function index(){
        $data =[];
        

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $user = new User;
            $arr['email'] = $_POST['email'];

            $row = $user->first($arr);

            if($row)
            {
                // if($row->password === $_POST['password']){
                if(password_verify($_POST['password'] ,$row->password )){
                    // show($row);
                    $_SESSION['USER'] = $row;
                    $_SESSION['user_id'] = $row->user_id;
                    $_SESSION['user_name'] = $row->user_name;
                    $_SESSION['user_role'] = $row->user_role;
                    $_SESSION['logged_in'] = true;
                    switch($_SESSION['user_role']){
                        case 'item_owner':
                            redirect('Itemowner/Userdashboard');
                            break;
                        case 'technician':   
                            $tech = new Technician;
                            $verified = $tech->isVerified($_SESSION['user_id']);
                            $_SESSION['verified'] = $verified;
                            if($verified){
                                redirect('Technician/Dashboard');
                            }else{
                                redirect('Technician/Getverified');
                            }
                            break;
                        case 'admin':
                            redirect('Admin/Admindashboard');
                            break;
                        case 'moderator':
                            redirect('Moderator/Moderatordashboard');
                            break;
                    }
                    
                } 
            }

            $user->errors['email']="Wrong email or password";
            $data['errors'] = $user->errors;
        }

        $this->view('/Signin',$data);

    }

}
