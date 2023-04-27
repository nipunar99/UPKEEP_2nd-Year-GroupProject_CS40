<?php


class Orders{

    use Controller;
    use Auth;

    public function index()
    {
        $this->technicianAuth();
        $this->view('Technician/orders');
    }
}

