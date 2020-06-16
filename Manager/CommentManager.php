<?php
namespace App\manager;

require('vendor/autoload.php');

require_once('App/manager/Manager.php');
use PDO;
class CommentManager extends Manager
{
    public function get_comments($postId)
    {
        $bd = $this->connexion();
        $comments = $bd->prepare('SELECT id, author, comment FROM comments WHERE post_id = ? ORDER BY id DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function comment_add($postId, $author, $comment)
    {
        $bd = $this->Connexion();
        $comments = $bd->prepare('INSERT INTO comments(post_id, author, comment) VALUES(?, ?, ?)');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
    public function comment_delete($postId)
    {
        $bd = $this->Connexion();
        $req = $bd->prepare('DELETE FROM comments WHERE id=?');
        $req->execute(array($postId));
    }
    public function UpdateCom($author, $comment, $postId)
    {
        $bd = $this->Connexion();
        $req = $bd->prepare('UPDATE comments SET author = ?, comment = ? WHERE id = ?');
        $req->execute(array(
            'title' => $title,
            'content' => $content,
            'id' => $postId,
            ));
        return $req;
    }
    
}
