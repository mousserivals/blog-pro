<?php

namespace Lib;

use Lib\ORM\Manager;
use Lib\ORM\PDOFactory;
use Lib\Router\Router;

abstract class Controller {

//
    public $request;
    private $router;
    private $database;
    private $twig;

    public function __construct(Request $request, Router $router) {
        $this->request = $request;
        $this->router = $router;
        $this->database = new PDOFactory();
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../src/View/');
        $this->twig = new \Twig_Environment($loader,['cache' => false ,'debug' => true]);
        $this->twig->addExtension(new \Twig_Extension_Debug());
    }
    
    public function render($nameView, $params = []) {
        $template = $this->twig->load($nameView);
        $view = $template->render($params);

        echo $view;
        exit();
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
