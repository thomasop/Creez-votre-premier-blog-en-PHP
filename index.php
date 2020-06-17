<?php
session_start();

require('vendor/autoload.php');

use App\controller\controllerAccueil;
use App\controller\controllercom;
use App\controller\controllerpost;
use App\controller\controlleruser;


 
if (isset($_GET['action']) && $_GET['action'] == 'get_post') {
     
    $postController = new controllerpost();
    $postControlle = $postController->get_post();
    }
 
    elseif (isset($_GET['action']) && ($_GET['action'] == 'post')) {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $postCommentController = new controllerpost();
            $postCommentController = $postCommentController->post();
        }
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'add_comment')){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                //add_comment($_GET['id'], htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
                $HTMLid = $_GET['id'];
                $HTMLauthor = htmlspecialchars($_POST['author']);
                $HTMLcomment = htmlspecialchars($_POST['comment']);
                $addCommentController = new controllercom();
                $postCommentControlle = $postCommentController->add_comment($HTMLid, $HTMLauthor, $HTMLcomment);
            }
            
        
        }
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'admin')){
    //AfficherConnexion();
    $connexionAfficherController = new controlleruser();
    $connexionAfficherControlle = $connexionAfficherController->admin();}
    elseif (isset($_POST['checkconnexion'])){
        if(!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])){
        $passwordform = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
        //connexion($_POST['pseudo'], $passwordform);
        $HTMLpseudo = htmlspecialchars($_POST['pseudo']);
        $connexionController = new controlleruser();
        $connexionControlle = $connexionController->connexion($HTMLpseudo, $passwordform);
        }  
        //if (isset($_POST['souvenir']) && ($_GET['action'] == 'souv')){
        //   echo 'ok';
        //}
        else {
            //erreur
            echo ('Tous les champs ne sont pas remplis !');
        }
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'manager_post'))
    {
        //manager_post();
        $postManagerController = new controllerpost();
        $postManagerControlle = $postManagerController->manager_post();
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'comPost'))
    {
        comPost();
        $comPostManagerController = new controllerpost();
        $comPostManagerControlle = $comPostManagerController->comPost();
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'addPost')){
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            //addPost($_POST['title'], $_POST['content']);
            $HTMLidpostadd = $_GET['id'];
            $HTMLtitlepostadd = htmlspecialchars($_POST['title']);
            $HTMLcontentpostadd = htmlspecialchars($_POST['content']);

            $addPostController = new controllerpost();
            $addPostControlle = $addPostController->addPost();
        }
        
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'postUpdate')){
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            //postUpdate($_GET['id'], $_POST['title'], $_POST['content']);
            $HTMLidpost = $_GET['id'];
            $HTMLtitle = htmlspecialchars($_POST['title']);
            $HTMLcontent = htmlspecialchars($_POST['content']);

            $updatePostController = new controllerpost();
            $updatePostControlle = $updatePostController->postUpdate();
        }
        
    }
    
    elseif (isset($_GET['action']) && ($_GET['action'] == 'createPost'))
    {
        //createPost();
        $postAddController = new controllerpost();
        $postAddControlle = $postAddController->createPost();
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'suppPost'))
    {
        //suppPost();
        $postDeleteController = new controllerpost();
        $postDeleteControlle = $postDeleteController->suppPost();
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'delete_comment'))
    {
        //delete_comment(); 
        $commentDeleteController = new controllercom();
        $commentDeleteControlle = $commentDeleteController->delete_comment();
    }
    elseif (isset($_GET['action']) && ($_GET['action'] == 'post_update'))
    {
        //post_update(); 
        $postUpdateController = new controllerpost();
        $postUpdateControlle = $postUpdateController->post_update();
    }
    

    
else {
    //Autoloader::register(); 
    $homeController = new controllerAccueil();
    $homeControlle = $homeController->afficher_accueil();
    
}
