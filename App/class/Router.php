<?php
namespace App\classe;
require('vendor/autoload.php');
use App\classe\Route;
use App\controller\IndexController;
use App\controller\ControllerPost;
use App\controller\ControllerComment;
use App\controller\ControllerUser;
class Router{

    private $url;
    
    public function __construct($url){
        $this->url=$url;
        
    }
    public function renderController()
    {   
        if($this->url == 'index')
        {
            //include('Views/Accueil');
            $homeController = new IndexController();
            $homeControlle = $homeController->index();
    
        }
            
            elseif($this->url == 'postsView')
            {
                
                    $postsController = new ControllerPost();
                    $postsControlle = $postsController->postsView();
                  
            }
            elseif($this->url == 'postView')
            {
                
     
                    $postController = new ControllerPost();
                    $postControlle = $postController->postView();
            }
            elseif($this->url == 'admin')
            {
                    $adminController = new controlleruser();
                    $adminControlle = $adminController->admin();
            }elseif($this->url == 'postManager')
            {
                    $managerPostController = new ControllerPost();
                    $managerPostControlle = $managerPostController->postManager();
                 
            }
            elseif($this->url == 'postFormUpdate')
            {
                    $updatePostController = new ControllerPost();
                    $updatePostControlle = $updatePostController->postFormUpdate();
                    
            }
            elseif($this->url == 'postUpdate')
            {
                    $HTMLtitleupdate = htmlspecialchars($_POST['title']);
                    $HTMLcontentupdate = htmlspecialchars($_POST['content']);
                    $postUpdateController = new ControllerPost();
                    $postUpdateControlle = $postUpdateController->postUpdate($HTMLtitleupdate, $HTMLcontentupdate);
                    
            }
            elseif($this->url == 'postCreate')
            {
                    $postCreateController = new ControllerPost();
                    $postCreateControlle = $postCreateController->postCreate();
                   
            }
            elseif($this->url == 'postAdd')
            {
                    $HTMLtitlepostadd = htmlspecialchars($_POST['title']);
                    $HTMLcontentpostadd = htmlspecialchars($_POST['content']);
                    $postAddController = new ControllerPost();
                    $postAddControlle = $postAddController->postAdd($HTMLtitlepostadd, $HTMLcontentpostadd);
                    
            }
            elseif($this->url == 'commentUpdateForm')
            {
                
     
                    $postsController = new ControllerComment();
                    $postsControlle = $postsController->commentUpdateForm();
                  
            }
            elseif($this->url == 'registration')
            {
                    $registrationController = new ControllerUser();
                    $viewRegistration = $registrationController->registration();
            }
            elseif(isset($_POST['checkuser']) && !empty($_POST['pseudo']) && !empty($_POST['motdepasse'])){
                if($_POST['motdepasse'] == $_POST['motdepasseconfirmer'] ){
                $HTMLpseudoRegister = htmlspecialchars($_POST['pseudo']);
                $passwordValid = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
                $registerController = new ControllerUser();
                $viewRegister = $registerController->register($HTMLpseudoRegister, $passwordValid);
                }
                else{
                    echo "Tous les champs ne sont pas remplis !";
                }
        }
            elseif($this->url == 'postDelete')
            {
                    $postCreateController = new ControllerPost();
                    $postCreateControlle = $postCreateController->postDelete();
                
            }
            elseif($this->url == 'postsManager')
            {
                
                    $postCommentController = new ControllerPost();
                    $postCommentControlle = $postCommentController->postsManager();
                    
                
                
                
            }
            
            elseif (isset($_POST['checkconnexion'])){
                if(!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])){
                $passwordform = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
                //connexion($_POST['pseudo'], $passwordform);
                $HTMLpseudo = htmlspecialchars($_POST['pseudo']);
                $connexionController = new ControllerUser();
                $connexionControlle = $connexionController->connect($HTMLpseudo, $passwordform);
                }  
                
                else {
                    //erreur
                    echo ('Tous les champs ne sont pas remplis !');
                }
            }
            elseif($this->url == 'commentAdd')
            {
                    $HTMLid = $_GET['id'];
                    $HTMLauthor = htmlspecialchars($_POST['author']);
                    $HTMLcomment = htmlspecialchars($_POST['comment']);
                    $adminConnectController = new ControllerComment();
                    $adminConnectControlle = $adminConnectController->commentAdd($HTMLid, $HTMLauthor, $HTMLcomment);
                    
                
            }
            elseif($this->url == 'commentDelete')
            {
                    
                    $adminConnectController = new ControllerComment();
                    $adminConnectControlle = $adminConnectController->commentDelete($HTMLid, $HTMLauthor, $HTMLcomment);
                  
                
            }
        
        }
    }
    
