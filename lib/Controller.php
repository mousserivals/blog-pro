<?php

namespace Lib;

class Controller {

    private $request;
    private $router;
    private $name;

    public function __construct(Request $request, Router $router) {
        $this->request = $request;
        $this->router = $router;
    }

    public function render($nameRoute, $params = []) {
        $this->router->url($nameRoute, $param);
    }

    public function redirect($location) {
        header('Location: ' . $location);
        exit;
    }

}
