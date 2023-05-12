<?php
session_start();

define("ROOTPATH",__DIR__.DIRECTORY_SEPARATOR);

///Compatible php versio checker
$minPHPversion =  '8.0';
if(phpversion()<$minPHPversion){
    die("Your PHP version must be {$minPHPversion} or higher to run this application. Your current version is ".phpversion());
}

//before excute anything , we require all core files using init.php
require '../app/core/init.php';

//split the url and choose the suitable controller from the contollers folder
$app = new App;
$app->loadController();