<?php

class App{

    private $controller = "Home/Home";
    private $method = "index";

    function split_url(){ // split the url and get as an array
    
        $URL = $_GET['url'] ?? 'Home/home';
        $URL = explode("/",trim($URL,'/'));
        return $URL;
    
    }

    public function loadController(){
        $URL = $this->split_url();
        $fileName ="";
    
        //ucfirst($URL[0]) is file name which controller belongs to and ucfirst($URL[1]) is controller name.
        $fileName = "../app/controllers/".ucfirst($URL[0])."/".ucfirst($URL[1]).".php";

        if(file_exists($fileName)){
            require $fileName;
            $this->controller =ucfirst($URL[1]); 
            unset($URL[0]);
            unset($URL[1]);

        }else {
            $fileName = "../app/controllers/_404.php";
            require $fileName;
            $this->controller = "_404"; 
        }

    

        $controller = new $this->controller;// create the object of the find controller

        // select a method
        
        if(!empty($URL[2])){

            if(method_exists($controller,$URL[2])){
                $this->method = $URL[2];
                unset($URL[2]);
            }

        }

        call_user_func_array([$controller,$this->method],[$URL]);
    }

}
