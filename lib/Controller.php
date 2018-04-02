<?php

namespace Lib;

use Lib\ORM\Managers;

abstract class Controller {
//
    private $request;
//    private $router;
    private $database;

    public function __construct(Request $request , Router $router ) {
        $this->request = $request;
        $this->router = $router;
        $this->database = new Managers('PDO', PDOFactory::getMysqlConnexion());
    }

    public function render($nameView, $params = []) {
        $view = __DIR__ . '/../../src/Views/' . $nameView;
        return $view;
    }

    public function redirect($nameRoute, $params = []) {
        header('Location: ' . $this->router->url($nameRoute, $params));
        exit;
    }

    public function json($json) {
        return json_encode($json);
    }

    public function database() {
        return $this->database;
    }

}
