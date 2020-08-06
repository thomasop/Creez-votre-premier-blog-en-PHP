<?php
namespace App\tool;
use App\Controller\IndexController;
use App\controller\ControllerPost;
use App\controller\ControllerComment;
use App\controller\ControllerUser;
use App\controller\Controller;
use App\tool\Route;
use App\tool\HttpRequest;
//require_once('Config/routes.php');
	class Route
	{
    private $path;
		private $controller;
		private $action;
		private $method;
		private $param;
		
		public function __construct($route)
		{  
      $this->path = $route->path;
      $this->controller = $route->controller;
      $this->action = $route->action;
			$this->method = $route->method;
      $this->param = $route->param;
      //var_dump($this->path);
		}
		
		public function getPath()
		{
			return $this->path;
		}
		
		public function getController()
		{
			return $this->controller;
		}
		
		public function getAction()
		{
			return $this->action;
		}
		
		public function getMethod()
		{
			return $this->method;
		}
		
		public function getParam()
		{
			return $this->param;
    }
    public function run($httpRequest)
		{
      $controller = null;
      $controllerName = '\App\\controller\\'.$this->controller;
            if(class_exists($controllerName))
            {
                $contre = new $controllerName($httpRequest);
                if(method_exists($contre, $this->action))
                {
                   $contre->{$this->action}(...$httpRequest->getParam());
                }
		}}
        
          public function setAction($action)
          {
            if (is_string($action))
            {
              $this->action = $action;
            }
          }
        
          public function setModule($module)
          {
            if (is_string($module))
            {
              $this->module = $module;
            }
          }
        
          public function setUrl($url)
          {
            if (is_string($url))
            {
              $this->url = $url;
            }
          }
        
          public function setVarsNames(array $varsNames)
          {
            $this->varsNames = $varsNames;
          }
        
          public function setVars(array $vars)
          {
            $this->vars = $vars;
          }
        
          public function action()
          {
            return $this->action;
          }
        
          public function module()
          {
            return $this->module;
          }
        
          public function vars()
          {
            return $this->vars;
          }
        
          public function varsNames()
          {
            return $this->varsNames;
          }
        }
        /*
        private $path;
    private $action;
    private $controller;
    //private $middlewares = [];
    private $params = [];
    private $matches = [];


    public function __construct($path, $controller)
    {
        $this->path = trim($path);
        $this->controller = $controller['controller'];
        $this->action = $controller['action'];
    }

    public function withMiddleware($middlewares)
    {
        $this->withMiddleware[] = ucfirst($middlewares);
    }

    public function withParam($param, $regex)
    {
        $this->param[$param] = str_replace('(', '(?:', $regex);
        return $this;
    }

    public function match($url)
    {
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
        $regex = "#^$path$#i";

        if(!preg_match($regex, $url, $matches))
        {
            return false;
        }

        array_shift($matches);
        $this->matches = $matches;
        
        return true;
    }

    public function paramMatch($match)
    {
        if(isset($this->params[$match[1]]))
        {
            return '('.$this->params[$match[1]];
        }
        
        return "([^/]+)";
    }

    public function call()
    {
        /*if(count($this->middlewares))
        {
            foreach ($this->middlewares as $middleware)
            {
                $middleware = 'Middlewares\\'.$middleware;
                $check = new $middleware();
                
                if(!$check)
                {
                    $errorController = new \Controllers\ErrorController;
                    $errorController->error403();
                }
            }
        }*/
        //$index = new IndexController::class();
         //$pm ='\\App\\Controller\\ControllerPost';
         //var_dump($pm);
         //if ($_SERVER['REQUEST_METHOD'] == 'get'){
         //$po = $this->controller;
         //var_dump($po);
         //$mp = '\\App\\controller\\' .$po;
         //$ip = new $mp('GET');
         //class_exists($mp);
         
         //$ut = $this->action;
         //if(method_exists($mp, $ut)){
         //var_dump($po);
         //return call_user_func_array([$mp, $this->action], $this->matches);
        //}
         //$po = new $pm();
    //}{
           /* $yo = new \App\controller\IndexController('GET');
            $jk = $yo->index();
        
        //$controllerr = 'IndexController';
        
        if(method_exists(IndexController::class, 'index')){
            echo 'ok';
        }
        else {
            var_dump(class_exists('App/controller/IndexController', 'index'));
        }
   
            
        $controller = 'App\\Controller\\'.$this->controller;
        $controller = new $controller;
        $controllerClass = ($controller);
        var_dump($controllerClass);
        }
        
        {
 return call_user_func_array([$controller, $this->action], $this->matches);
        }

        echo 'Methode passée au controlleur n\'existe pas.'; 
    }*/

        