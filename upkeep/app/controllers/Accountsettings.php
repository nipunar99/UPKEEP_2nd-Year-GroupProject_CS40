<?php

class Accountsettings
{
    use Controller;
    use Auth;

    public function index(){
//        $this->userAuth();
        $data = [];
//        $user = new User;
        $this->view('accountsettings');
    }

}