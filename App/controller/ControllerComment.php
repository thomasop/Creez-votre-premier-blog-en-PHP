<?php
namespace App\controller;
require('vendor/autoload.php');

use App\manager\CommentManager;
use App\manager\PostManager;

class ControllerComment{
    function commentAdd($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->createComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        //var_dump($affectedLines);
        echo 'Un commentaire a été ajouté';
        header('Location: index.php?r=postView&id=' . $postId);
    }
}   
function commentDelete(){
    $commentDeleteController = new CommentManager();
    $commentDeleteView = $commentDeleteController->deleteComment($_GET['id']);
    $postComManager = new PostManager();
    $commentManager = new CommentManager();

    $postComManage = $postComManager->showPost($_GET['id']);
    $commentManage = $commentManager->showComments($_GET['id']);
    echo "le commentaire a ete supprimer";
    require('Views/comMana.php');
    
} 

function commentUpdate($postId, $author, $comment){
        
    $commentUpdateController = new CommentManager();
    $commentUpdateView = $commentUpdateController->updatePost($_GET['id'], $title, $content);
    //var_dump($title, $content);
    header('Location: index.php?r=postManager');
}
function commentUpdateForm(){
    $formCommentUpdate = new CommentManager();
        $formCommentView = $formCommentUpdate->showComments($_GET['id']);
    require('Views/updatecomment.php');
}
}