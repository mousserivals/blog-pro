<?php

namespace Lib;

use Lib\ORM\Manager;
use Lib\ORM\PDOFactory;
use Lib\Router\Router;
use Lib\Session;

abstract class Controller {

//
    public $request;
    private $router;
    private $database;
    private $twig;
    public $session;

    public function __construct(Request $request, Router $router) {
        $this->request = $request;
        $this->router = $router;
        $this->database = new PDOFactory();
        $this->session = new session();
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../src/View/');
        $this->twig = new \Twig_Environment($loader, ['cache' => false, 'debug' => true]);
        $this->twig->addExtension(new \Twig_Extension_Debug());
        $this->twig->addFunction(new \Twig_SimpleFunction('session', function() {
                return $this->session->getFlash();
        }));
    }

    public function render($nameView, $params = []) {
        $template = $this->twig->load($nameView);
        $view = $template->render($params);

        echo $view;
        exit();
    }

    public function redirect($nameRoute, $params = []) {
        $site = $this->request->requestHOST();
        header('Location: http://' . $site . '/' . $this->router->url($nameRoute, $params));
    }

    public function json($json) {
        return json_encode($json);
    }

    public function database() {
        return $this->database;
    }

}
