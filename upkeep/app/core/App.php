<?php

class App{

    private $controller = "Home/Home";
    private $method = "index";

    function split_url(){ // split the URL and get as an array
        $URL = $_GET['url'] ?? 'Home/home';
        $URL = rtrim($URL,'/');
        $URL = filter_var($URL, FILTER_SANITIZE_URL);
        $URL = explode("/",$URL);
        return $URL;
    }

    public function loadController(){
        $URL = $this->split_url();
        $fileName ="../app/controllers/".ucfirst($this->controller).".php";
    
        //ucfirst($URL[0]) is file name which controller belongs to and ucfirst($URL[1]) is controller name.
        //$fileName = "../app/controllers/".ucfirst($URL[0])."/".ucfirst($URL[1]).".php";

        if(!empty($URL[0])){
            $fileName = "../app/controllers/".ucfirst($URL[0]).".php";
            if($bool=file_exists($fileName)){
                $this->controller=$URL[0]; //if exists controlle is set to first element of array(URL)
                
                unset($URL[0]); //unsetting theurl[this is optional][can do it wihout unsetting]
            
            }else{
                if(!empty($URL[1])){
                    $fileName = "../app/controllers/".ucfirst($URL[0])."/".ucfirst($URL[1]).".php";
                    if($bool=file_exists($fileName)){
                        $this->controller=$URL[1]; //if exists controlle is set to first element of array(URL)
                        unset($URL[0]);
                        unset($URL[1]); //unsetting theurl[this is optional][can do it wihout unsetting]
                    }
                }
            }
        }

        require_once($fileName);

        // if(file_exists($fileName)){
        //     require $fileName;
        //     $this->controller =ucfirst($URL[1]); 
        //     unset($URL[0]);
        //     unset($URL[1]);

        // }else {
        //     $fileName = "../app/controllers/_404.php";
        //     require $fileName;
        //     $this->controller = "_404"; 
        // }

    

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
