<?php
namespace App\manager;

require('vendor/autoload.php');

require_once('App/manager/Manager.php');
use PDO;
class PostManager extends Manager
{
    public function afficher_post() 
    { 
        $bd = $this->Connexion();
        $req = $bd->prepare('SELECT id, title, content FROM posts ORDER BY id DESC LIMIT 0, 10');
        $req->execute();
        return $req;
    }
    public function affiche_post($postId)
    {
        $bd = $this->Connexion();
        $req = $bd->prepare('SELECT id, title, content FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;

    }
    public function create_post($title, $content)
    {
        $bd = $this->Connexion();
        $creaate = $bd->prepare('INSERT INTO posts (title, content) VALUES(?, ?)');
        $affecte = $creaate->execute(array($title, $content));

        return $affecte;
    }
    public function update_post($title, $content)
    {
        $bd = $this->Connexion();
        $req = $bd->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :id');
        $req->execute(array('id' => $_GET['id'],
                            'title' => $_POST['title'],
                            'content' => $_POST['content']));
        return $req;
    }
    /*public function UpdatePost($postId)
    {
        $bd = $this->Connexion();
        $req = $bdd->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');                  
        $req->execute(array($_POST['title'], $_POST['content'], $postId));
        return $req;              
    }
    */
    public function delete_post($postId)
    {
        $bd = $this->Connexion();
        $req = $bd->prepare('DELETE FROM posts WHERE id=?');
        $req->execute(array($postId));
    }
}