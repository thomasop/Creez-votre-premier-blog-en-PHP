<?php
session_start();
$token = md5(bin2hex(openssl_random_pseudo_bytes(6)));

$_SESSION['token'] = $token;
require('vendor/autoload.php');

use App\controller\IndexController;
use App\controller\ControllerComment;
use App\controller\ControllerPost;
use App\controller\ControllerUser;
use App\tool\Router;
use App\tool\HttpRequest;

try{
$httpRequest = new HttpRequest();
$router = new Router();
$httprequest->setRoad($router->findRoad($httprequest));
$httprequest->run();
	}
catch(Exception $e)
{
    echo "erreur";
}
