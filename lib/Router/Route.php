<?php

namespace Lib\Router;

use Lib\Request;

class Route {

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $callable;

    /**
     * @var array
     */
    private $matches = [];

    /**
     * @var array
     */
    private $params = [];

    public function __construct($path, $callable) {

        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    public function with($param, $regex) {
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this;
    }

    public function match($url) {

        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
        $regex = "#^$path$#i";
        if (!preg_match($regex, $url, $matches)) {
            return FALSE;
        }
        /**
         * permet de retirer la premiere occurence
         */
        array_shift($matches);
        $this->matches = $matches;

        return true;
    }

    private function paramMatch($match) {
        if (isset($this->params[$match[1]])) {

            return '(' . $this->params[$match[1]] . ')';
        }
        return '([^/]+)';
    }

    /**
     * @param Request $request
     * @param Router $router
     */
    public function call(Request $request) {
        $router = new Router();
        if (is_string($this->callable)) {
            $params = explode("#", $this->callable);
            $controller = "Src\\Controller\\" . $params[0] . "Controller";

            $controller = new $controller($request , $router);
            $action = $params[1]();
            return $controller->$action();
        } else {
            return call_user_func_array($this->callable, $this->matches);
        }
    }

    public function getUrl($params) {
        $path = $this->path;
        foreach ($params as $k => $v) {
            $path = str_replace(":k", $v, $path);
        }
        return $path;
    }

}
