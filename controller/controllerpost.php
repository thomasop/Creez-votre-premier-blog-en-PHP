<?php
namespace App\controller;
require('vendor/autoload.php');
use App\manager\PostManager;
use App\manager\CommentManager;

class controllerpost{

    function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->affiche_post($_GET['id']);
        $comments = $commentManager->get_comments($_GET['id']);

        require('Views/comment.php');
    }
    
    function get_post(){
        $posts = new PostManager();
        $poster = $posts->afficher_post();
        require('Views/post.php');
    }

    function manager_post(){
        $manaposts = new PostManager();
        $manaposter = $manaposts->afficher_post();
        require('Views/postMana.php');
    }

    function post_update(){
        require('Views/updatepost.php');
    }

    function postUpdate($title, $content){
        $upPost = new PostManager();
        $upPoster = $upPost->update_post($title, $content);
        header('Location: index.php?action=manaPost');
    }

    function createPost(){
        require('Views/creationpost.php');
    }

    function addPost($title, $content)
    {
        $postCreate = new PostManager();

        $affecte = $postCreate->create_post($title, $content);

        if ($affecte === false) {
            throw new Exception('Impossible d\'ajouter le post !');
            }
        else {
            header('Location: index.php?action=GetPost');
            //var_dump($affecte);
            }
    }   
    function suppPost(){
        $delposts = new PostManager();
        $delposter = $delposts->delete_post($_GET['id']);
        $manaposts = new PostManager();
        $manaposter = $manaposts->AfficherPost();
        //header('Location: index.php?action=manaPost');
        echo "le post a ete supprimer";
        require('Views/postMana.php');
    }   
}