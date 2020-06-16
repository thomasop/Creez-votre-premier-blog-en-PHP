<?php
namespace App\controller;
require('vendor/autoload.php');

use App\manager\CommentManager;

class controllercom{
    function add_comment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->comment_add($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}   
function delete_comment(){
    $delcoms = new CommentManager();
    $delcomment = $delcoms->comment_delete($_GET['id']);
    header('Location: index.php?action=comPost');
} 
//function updatecom(){
  //  UpdateCom();
//}
}