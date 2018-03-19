<?php

namespace Lib\Router;

class Router {

    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $routes = [];

    /**
     * @var array
     */
    private $namedRoutes = [];
    
    public function __construct($url) {
        $this->url = $url;
    }

    public function get($path, $callable,$name = null) {      
        return $this->add($path, $callable,$name, 'GET');
    }

    public function post($path, $callable,$name = null) {
        return $this->add($path, $callable,$name, 'POST');
    }

    private function add($path, $callable, $name, $method) {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if ($name) {
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }
    public function run() {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new \Exception('REQUEST_METHOD does not exist');
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->url)) {
                return $route->call();
            }
        }
       throw new \Exception('No routes matches');
    }

    
}