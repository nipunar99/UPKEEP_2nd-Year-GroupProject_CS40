<?php  // every files in cores should be loaded here

spl_autoload_register(function($classname){
    require $filename = "../app/models/".ucfirst($classname).".php";
});

require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';
require 'Auth.php';
require 'Session.php';
require '../app/controllers/Notifications.php';