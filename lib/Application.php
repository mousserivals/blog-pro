<?php

namespace Lib;

use Lib\Router\Router;
use Lib\Controller;

class Application {

    protected $request;
    protected $router;

    public function __construct() {
        $this->request = new Request();
        $this->router = new Router();

    }
    
    public function appRun() {

        $this->router->get('/', 'Post#home', 'Post.home');
        $this->router->get('/posts', 'Post#index', 'Post.index');
        $this->router->get('/posts/:id', 'Post#show', 'Post.show');
        $this->router->get('/posts/:id-:slug', function($id, $slug) {
                    echo "Afficher $slug : $id";
                }, 'post.show')->with('id', '[0-9]+')
                ->with('slug', '[a-z\-0-9]+');
        

        $this->router->post('/posts/:id', function($id) {
            echo 'Poster l\'articles ' . $id;
        });
        $this->router->getRoute($this->request, $this->router);

        
    }

}
