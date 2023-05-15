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
        $orders = new Order;
        $data["counts"] = $orders->customerCount($_SESSION['user_id']);
        $data['piechart_data'] = json_encode($orders->getOrderCountByStatus($_SESSION['user_id']));
        $data['barchart_data'] = json_encode($orders->getRevenueByMonth($_SESSION['user_id']));

        $data['count']=$count;
        show($_SESSION);
        //get upcommin orders
        $data["upcoming"] = $orders->upcoming($_SESSION['user_id']);

//        show($data);
        $this->view('Technician/dashboard',$data);
            
    }

    public function sample(){
        $user = new User;
        $userDetails = json_encode($user->findAll());
        echo($userDetails);

    }

}