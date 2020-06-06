<?php
//pas besoin de namespace, fait partie de l'espace global
session_start();
//$_SESSION['pseudo'];
//use Manager\PostManager;//indique l'espace nom pour la class Point
//indique l'espace nom pour la class Triangle
//include_once 'Autoloader.php';//Autoloading
require 'Autoloader.php'; 
Autoloader::register(); 
//Autoloader::register();//appel de la fonction register
require('Controller/Controller.php');

 
if (isset($_GET['action']) && $_GET['action'] == 'GetPost') {
     
        GetPost();
    }
 
    elseif (isset($_GET['action']) && ($_GET['action'] == 'Post')) {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            Post();
        }
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'addComment')){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
            }
            
        
        }
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'AfficherConnexion')){
    AfficherConnexion();}
    elseif (isset($_POST['checkconnexion'])){
        if(!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])){
        $passwordform = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
        connexion($_POST['pseudo'], $passwordform);
        }  
        //if (isset($_POST['souvenir']) && ($_GET['action'] == 'souv')){
        //   echo 'ok';
        //}
        else {
            //erreur
            echo ('Tous les champs ne sont pas remplis !');
        }
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'manaPost'))
    {
        manaPost();
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'comPost'))
    {
        comPost();
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'addPost')){
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            addPost($_POST['title'], $_POST['content']);
        }
        
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'postUpdate')){
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            postUpdate($_GET['id'], $_POST['title'], $_POST['content']);
        }
        
    }
    
    elseif (isset($_GET['action']) && ($_GET['action'] == 'createPost'))
    {
        createPost();
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'suppPost'))
    {
        suppPost(); 
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'suppCom'))
    {
        suppCom(); 
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'updapost'))
    {
        updapost(); 
    }
    

    
else {
    AfficherAccueil();
}
