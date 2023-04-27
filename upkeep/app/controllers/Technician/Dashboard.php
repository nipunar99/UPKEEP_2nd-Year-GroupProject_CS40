<?php

class Dashboard{

    Use Controller;
    use Auth;

    public function index(){
        $this->technicianAuth();

        $data = [];

        //model instances
        $user = new User;
        $technician = new Technician;
        $orders = new Orders;
        $count = $orders->customerCount($_SESSION['user_id']);

        $data['count']=$count;
        show($data);
        $this->view('Technician/dashboard',$data);
            
    }

    public function sample(){
        $user = new User;
        $userDetails = json_encode($user->findAll());
        echo($userDetails);

    }

}