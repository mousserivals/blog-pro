<?php

namespace Lib\Router;

use Lib\Request;

class Router {

    /**
     * @var array
     */
    private $routes = [];

    /**
     * @var array
     */
    private $namedRoutes = [];

    public function get($path, $callable, $name = null) {
        return $this->add($path, $callable, $name, 'GET');
    }

    public function post($path, $callable, $name = null) {
        return $this->add($path, $callable, $name, 'POST');
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
        $request = new Request();

        if (!isset($this->routes[$request->method()])) {
            throw new \Exception('REQUEST_METHOD does not exist');
        }
        foreach ($this->routes[$request->method()] as $route) {
            if ($route->match($request->requestURI())) {
                return $route->call();
            }
        }
        throw new \Exception('No routes matches');
    }

}
