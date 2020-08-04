<?php
namespace App\manager;

require('vendor/autoload.php');

require_once('App/manager/Manager.php');
use PDO;
use App\Entity\comment;
class CommentManager extends Manager
{
    public function showComments($postId)
    {
        $bd = $this->connection();
        $requestComments = $bd->prepare('SELECT id, author, comment FROM comments WHERE post_id = ? ORDER BY id DESC');
        $requestComments->execute(array($postId));

        return $requestComments;
    }

    public function createComment($postId, $author, $comment)
    {
        $bd = $this->connection();
        $requestAddComment = $bd->prepare('INSERT INTO comments(post_id, author, comment) VALUES(?, ?, ?)');
        $addComment = $requestAddComment->execute(array($postId, $author, $comment));

        return $addComment;
    }
    public function deleteComment($postId)
    {
        $bd = $this->connection();
        $requestDeleteComment = $bd->prepare('DELETE FROM comments WHERE id=?');
        $requestDeleteComment->execute(array($postId));
    }
   
    public function updateComment($author, $comment, $postId)
    {
        $bd = $this->connection();
        $requestUpdateComment = $bd->prepare('UPDATE comments SET author = ?, comment = ? WHERE id = ?');
        $requestUpdateComment->execute(array(
            'title' => $title,
            'content' => $content,
            'id' => $postId,
            ));
        return $requestUpdateComment;
    }
    
}
