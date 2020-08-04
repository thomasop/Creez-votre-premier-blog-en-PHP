<?php
namespace App\controller;
require('vendor/autoload.php');
use App\manager\adminManager;
use PDO;
class ControllerUser{
    
    function admin(){
        require('Views/Connexion.php');
    }
    function registration(){
        require('Views/inscription.php');
    }
    
    function connect($pseudo, $passwordform)
    {
        $loginManager = new adminManager();
        $login = $loginManager->adminOk($pseudo);
     
        
       $user = $login->fetch(PDO::FETCH_OBJ);
     
       if (!$user) { 
           
           "<script>alert(\"Pseudo incorrect\");
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
       function register($pseudo, $motdepasse){
            $registerManager = new adminManager();
            $register = $registerManager->adminInscription($pseudo, $motdepasse);
            echo "Votre compte a été créé, vous pouvez maintenant vous connecter!";
            header('location: index.php?r=admin');
            
            }
       }
