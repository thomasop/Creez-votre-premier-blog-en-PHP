<?php
namespace App\controller;
require('vendor/autoload.php');
use App\manager\adminManager;
use PDO;
class controlleruser{
    
    function admin(){
        require('Views/Connexion.php');
    }
    
    function connexion($pseudo, $passwordform)
    {
        $loginManager = new adminManager();
        $login = $loginManager->Adminok($pseudo);
     
        
       $user = $login->fetch(PDO::FETCH_OBJ);
     
       if (!$user) { 
           echo "<script>alert(\"Pseudo incorrect\");
           document.location.href = 'index.php?action=admin'</script>";
       }
       
       else { 
           $mdp = $user->motdepasse;
           $validPassword = password_verify($_POST['motdepasse'], $mdp);
       }
           
           if($validPassword){
    
                require ('Views/pageAdmin.php');
               
           }
           else{
    
               echo "<script>alert(\"Mot de passe incorrect\");
               document.location.href = 'index.php?action=admin'</script>";
               
           }
       }
}