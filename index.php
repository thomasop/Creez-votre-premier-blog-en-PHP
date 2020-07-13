<?php
session_start();

require('vendor/autoload.php');

use App\controller\IndexController;
use App\controller\controllercom;
use App\controller\controllerpost;
use App\controller\controlleruser;
use App\classe\Router;




isset($_GET['r']) ? $url = $_GET['r'] : $url = 'index';
$router = new Router($url);
$router->renderController();
