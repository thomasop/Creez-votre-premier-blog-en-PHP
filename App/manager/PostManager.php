<?php
namespace App\manager;

require('vendor/autoload.php');

require_once('App/manager/Manager.php');
use PDO;
use App\Entity\post;
class PostManager extends Manager
{
    public function showPosts() 
    { 
        $bd = $this->connection();
        $urlPosts = $bd->prepare('SELECT id, title, content FROM posts ORDER BY id DESC LIMIT 0, 10');
        $urlPosts->execute();
        return $urlPosts;
    }
    public function showPost($postId)
    {
        $bd = $this->connection();
        $urlPost = $bd->prepare('SELECT id, title, content FROM posts WHERE id = ?');
        $urlPost->execute(array($postId));
        $showPost = $urlPost->fetch();
        return $showPost;

    }
    public function createPost($title, $content)
    {
        $bd = $this->connection();
        $urlAddPost = $bd->prepare('INSERT INTO posts (title, content) VALUES(?, ?)');
        $addPost = $urlAddPost->execute(array($title, $content));

        return $addPost;
    }
    public function updatePost($postId, $title, $content)
    {
        $bd = $this->connection();
        $urlUpdatePost = $bd->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :id');
        $urlUpdatePost->bindValue(':id', $postId, PDO::PARAM_STR);
        $urlUpdatePost->bindValue(':title', $title, PDO::PARAM_STR);
        $urlUpdatePost->bindValue(':content', $content, PDO::PARAM_STR);
        $urlUpdatePost->execute();
        return $urlUpdatePost;
    }
    
    public function deletePost($postId)
    {
        $bd = $this->connection();
        $urlDeletePost = $bd->prepare('DELETE FROM posts WHERE id=?');
        $urlDeletePost->execute(array($postId));
    }
}