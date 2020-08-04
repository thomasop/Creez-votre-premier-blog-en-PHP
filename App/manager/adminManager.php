<?php
namespace App\manager;
require_once('App/manager/Manager.php');
class adminManager extends Manager
{
        private $pseudo;
        private $motdepasse;
      
    public function Adminok($pseudo){
        //$hashpass = password_hash($motdepasse, PASSWORD_BCRYPT);
        $bd = $this->Connexion();
        $login = $bd->prepare('SELECT id, motdepasse FROM utilisateur WHERE pseudo= ?');
        $login->execute(array($pseudo));

        return $login;  
        }
}