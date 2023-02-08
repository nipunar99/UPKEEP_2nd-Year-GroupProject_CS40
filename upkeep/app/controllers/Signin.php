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
                    
                    $_SESSION['USER'] = $row->user_id;
                    $_SESSION['user_id'] = $row->user_id;
                    $_SESSION['user_name'] = $row->user_name;
                    $_SESSION['user_role'] = $row->user_role;
                    show($_SESSION);
                    switch($_SESSION['user_role']){
                        case 'item_owner':
                            redirect('Itemowner/Userdashboard');
                            break;
                        case 'technician':   
                            redirect('Technician/Dashboard');
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
