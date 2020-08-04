<?php
namespace App\controller;
require('vendor/autoload.php');

use App\manager\PostManager;
use App\manager\CommentManager;
use App\classe\Twig;
class ControllerPost{

    function postView()
    {
        $postController = new PostManager();
        $commentsController = new CommentManager();
        $twig = new Twig();
        $postView = $postController->showPost($_GET['id']);
        $commentsView = $commentsController->showComments($_GET['id']);
        $viewTwig = $twig->renderTwig();
        require('Views/comment.php');
    }
    
    function postsView(){
        $postsController = new PostManager();
        $postsView = $postsController->showPosts();
        require('Views/post.php');
    }

    function postManager(){
        $postsAdminController = new PostManager();
        $postsAdminView = $postsAdminController->showPosts();
        require('Views/postMana.php');
    }

    function postFormUpdate(){
        $formPostUpdate = new PostManager();
        $formView = $formPostUpdate->showPost($_GET['id']);
        require('Views/updatepost.php');
    }

    function postUpdate($title, $content){
        
        $postUpdateController = new PostManager();
        $updatePostView = $postUpdateController->updatePost($_GET['id'], $title, $content);
        //var_dump($title, $content);
        header('Location: index.php?r=postManager');
    }

    function postCreate(){
        require('Views/creationpost.php');
    }

    function postAdd($title, $content)
    {
        $postAddController = new PostManager();

        $postAddView = $postAddController->createPost($title, $content);

        if ($postAddView === false) {
            throw new Exception('Impossible d\'ajouter le post !');
            }
        else {
            header('Location: index.php?r=postManager');
            //var_dump($affecte);
            }
    }   
    function postDelete(){
        $postDeleteController = new PostManager();
        $postDeleteView = $postDeleteController->deletePost($_GET['id']);
        $postsAdmin = new PostManager();
        $postsAdminView = $postsAdmin->showPosts();
        //header('Location: index.php?action=manaPost');
        echo "le post a ete supprimer";
        //require('Views/postDelete.php');
        header('Location: index.php?r=postManager');
    } 
    function postsManager(){
        $postAdminController = new PostManager();
        $commentsAdminController = new CommentManager();
        $postAdminView = $postAdminController->showPost($_GET['id']);
        $commentsAdminView = $commentsAdminController->showComments($_GET['id']);
        require('Views/comMana.php');
    }     
}