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
        $this->router->get('/blog', 'Post#index', 'post.index');
        $this->router->get('/blog/:pagination', 'Post#index', 'post.index')->with('pagination', '[0-9]+');
//        $this->router->get('/posts', 'Post#index', 'Post.index');
        $this->router->get('/posts/:id', 'Post#show', 'Post.show');
        $this->router->get('/posts/:id-:slug', function($id, $slug) {
                    echo "Afficher $slug : $id";
                }, 'post.show')->with('id', '[0-9]+')
                ->with('slug', '[a-z\-0-9]+');


        $this->router->post('/posts/:id', function($id) {
            echo 'Poster l\'articles ' . $id;
        });
       
        
        /*
         * admin
         */
        
        $this->router->get('/admin', 'Postadmin#home', 'Postadmin.home');
        $this->router->get('/admin/post', 'Postadmin#index', 'Postadmin.index');
        $this->router->get('/admin/post/:pagination', 'Postadmin#index', 'Postadmin.index')->with('pagination', '[0-9]+');
        $this->router->get('/admin/post/show/:id', 'Postadmin#show', 'Postadmin.show')->with('id', '[0-9]+');
        $this->router->get('/admin/post/add', 'Postadmin#add', 'Postadmin.add');
        $this->router->get('/admin/post/edit/:id', 'Postadmin#edit', 'Postadmin.edit')->with('id', '[0-9]+');
        $this->router->get('/admin/delete/:id', 'Postadmin#delete', 'Postadmin.delete');
         $this->router->getRoute($this->request, $this->router);
    }

}
