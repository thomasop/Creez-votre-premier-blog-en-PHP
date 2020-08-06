<?php
namespace App\tool;
	class HttpRequest
	{private $_url;
		private $_method;
        private $_param;
        private $_route;
		
		public function __construct($url = null, $method = null)
		{
			$this->_url = (is_null($url))?$_SERVER['REQUEST_URI']:$url;
			$this->_method = (is_null($method))?$_SERVER['REQUEST_METHOD']:$method;
			$this->_param = array();
			//var_dump($_SERVER['REQUEST_URI']);
			//var_dump($this->_method);
		}
		
		public function getUrl()
		{
			return $this->_url;
			//var_dump($url);	
		}
		
		public function getMethod()
		{
			return $this->_method;	
		}
		
		public function getParams()
		{
			return $this->_params;	
		}
		public function setRoute($route)
		{
			$this->_route = $route;	
			//var_dump($route);
		}
		
        public function bindParam()
		{
			switch($this->_method)
			{
				case "GET":
				case "DELETE":
					foreach($this->_route->getParam() as $param)
					{
						if(isset($_GET[$param]))
						{
							$this->_param[] = $_GET[$param];
						}
					}
				case "POST":
				case "PUT":
					foreach($this->_route->getParam() as $param)
					{
						if(isset($_POST[$param]))
						{
							$this->_param[] = $_POST[$param];
						}
					}
			
                }
		}
		public function getRoute()
		{
			return $this->_route;	
		}
        public function getParam()
		{
			return $this->_param;	
        }
		
		public function run()
        {
			//echo "ok";
			//var_dump($this->_route);
            $this->_route->run($this);
        }

	}