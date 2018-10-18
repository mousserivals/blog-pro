<?php

namespace Lib\Router;

use Lib\Request;
use Lib\Session as Session;

class Router {

    /**
     * @var array
     */
    private $routes = [];

    /**
     * @var array
     */
    private $namedRoutes = [];

    /**
     * @var array
     */
    private static $role = [];

    /**
     * Ajoute un prefix au routing
     */
    public static function role($role) {
        foreach ($role as $key => $value) {
            self::$role[$key] = $value;
        }
    }

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

    public function getRoute(Request $request, Router $router) {

        if (!isset($this->routes[$request->method()])) {
            throw new \Exception('REQUEST_METHOD does not exist');
        }

        foreach ($this->routes[$request->method()] as $route) {
            if ($route->match($request->requestURI())) {
                foreach (self::$role as $key => $v) {
                    foreach ($v as $value) {
                        if (strpos($request->requestURI(), '/' . $value) === 0 && Session::getInstance()->isLogged() == false) {
                            header('Location: http://' . $request->requestHOST() . '/' . $this->url('User.connection'));
                        }
                    }
                }
//                exit();
                return $route->call($request, $router);
            }
        }
        throw new \Exception('No routes matches ');
    }

    public function url($nameRoute, $params = []) {
        if (!isset($this->namedRoutes[$nameRoute])) {
            throw new \Exception('No routes');
        }

        return $this->namedRoutes[$nameRoute]->getUrl($params);
    }

}
