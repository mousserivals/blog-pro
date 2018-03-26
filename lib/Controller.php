<?php

namespace Lib;

class Controller extends Application {

    private $request;
    private $router;
  //  private $database;

    public function __construct(Request $request, Router $router) {
        $this->request = $request;
        $this->router = $router;
      //  $this->database = '';
    }

    public function render($nameRoute, $params = []) {
        
       return $this->router->url($nameRoute, $param);
    }

    public function redirect($location) {
        header('Location: ' . $location);
        exit;
    }
    
    public function json($json) {
       return json_encode($json);
    }
    
    public function database() {
      //  return $this->database;
    }

}
