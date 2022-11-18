<?php 

class Userselection {
    
    use Controller;
    public function signin(){
        $this->view('signinUserselection');
    }
    public function signup(){
        $this->view('signupUserselection');
    }
    
}