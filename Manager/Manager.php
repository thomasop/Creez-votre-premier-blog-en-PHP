<?php
//namespace Manager\Manager;
 
//indique l'espace nom pour la class Point
require_once 'Autoloader.php';
Autoloader::register();
class Manager
{ 
    protected $bd;

    const DB_HOST = 'mysql:host=localhost;dbname=mon_blog;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = 'root';

 
    public static function Connexion() 
    { 
        try{
            $bd = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bd;
        }
        catch(Exeption $errorConnection){
            echo 'Connexion échouée' . $errorConnection->getMessage();
        }
    }
}
