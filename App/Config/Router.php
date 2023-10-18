<?php
    
    // URL FORMAT:  http://localhost/controller/method/param

    Class App 
    {
        protected $controller = 'Users';
        protected $method = 'index';
        protected $params = [];

        public function __construct()
        {
          $url = $this->getUrl();
          
          if ($url == null)
          {
            //$url = [$this->controller, $this->method];
            header('location: '.URLROOT.'/Users/index');
          }
         
          if(@file_exists('../App/Controllers/' . $url[0]. '.php'))
          {
            $this->controller = $url[0];
            unset($url[0]);
          }

          require_once '../App/Controllers/'. $this->controller . '.php';

          $this->controller = new $this->controller;

          if(isset($url[1]))
          {
            if(method_exists($this->controller, $url[1]))
            {
              $this->method = $url[1];
              unset($url[1]);
            }
          }

          $this->params = $url ? array_values($url) : [];
          call_user_func_array([$this->controller, $this->method], $this->params);
        }

        public function getUrl()
        {
          if(isset($_GET['url']))
          {
            $url = rtrim($_GET['url'], '/');
            $url = explode('/', $url);
            return $url;
          }
        }
    }

?>