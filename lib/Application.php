<?php

namespace Lib;

use Lib\Router\Router;
use Lib\Controller;

class Application {

    protected $request;

    public function __construct() {
        $this->request = new Request();

    }
    
    public function appRun() {

        $router = new Router();

        $router->get('/', function() {
            echo 'Homepage';
        });
        $router->get('/posts', function() {
            echo 'Tous les articles';
        });
        $router->get('/posts', function() {
            echo 'Tous les articles';
        });
        $router->get('/posts/:id', 'posts#show', 'post.show');
        $router->get('/posts/:id-:slug', function($id, $slug) {
                    echo "Afficher $slug : $id";
                }, 'post.show')->with('id', '[0-9]+')
                ->with('slug', '[a-z\-0-9]+');
        

        $router->post('/posts/:id', function($id) {
            echo 'Poster l\'articles ' . $id;
        });
        $router->run($this->request);
    }

}
