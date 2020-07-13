<?php
namespace App\controller;

//require_once 'vendor/autoload.php';
//Autoloader::register();
//require_once('Controller/Controller.php');
class controllerAccueil{
    function afficher_accueil(){
        require('Views/accueil.php');
    }
}