<?php

namespace Lib;

use Lib\Router\Router;
use Lib\Controller;

session_start();

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
//        $this->router->get('/posts/:id', 'Post#show', 'Post.show');
        $this->router->get('/article/:id-:title', 'Post#show', 'Post.show')->with('id', '[0-9]+')->with('title', '[a-z\-0-9]+');
        $this->router->get('/registration', 'User#registration', 'User.registration');
        $this->router->post('/registration', 'User#registration', 'User.registration');
        $this->router->get('/connection', 'User#connection', 'User.connection');
        $this->router->post('/connection', 'User#connection', 'User.connection');
        $this->router->get('/deconnection', 'User#deconnection', 'User.deconnection');
        /*
         * admin
         */

        $this->router->get('/admin', 'Postadmin#home', 'Postadmin.home');
        $this->router->get('/admin/post', 'Postadmin#index', 'Postadmin.index');
//        $this->router->get('/admin/post/:pagination', 'Postadmin#index', 'Postadmin.index')->with('pagination', '[0-9]+');
        $this->router->get('/admin/post/show/:id', 'Postadmin#show', 'Postadmin.show')->with('id', '[0-9]+');
        $this->router->get('/admin/post/add', 'Postadmin#add', 'Postadmin.add');
        $this->router->post('/admin/post/add', 'Postadmin#add', 'Postadmin.add');
        $this->router->get('/admin/post/edit/:id', 'Postadmin#edit', 'Postadmin.edit')->with('id', '[0-9]+');
        $this->router->post('/admin/post/edit/:id', 'Postadmin#edit', 'Postadmin.edit')->with('id', '[0-9]+');
        $this->router->get('/admin/post/delete/:id', 'Postadmin#delete', 'Postadmin.delete')->with('id', '[0-9]+');

        $this->router->get('/admin/category', 'Categoryadmin#index', 'Categoryadmin.index');
        $this->router->get('/admin/category/add', 'Categoryadmin#add', 'Categoryadmin.add');
        $this->router->post('/admin/category/add', 'Categoryadmin#add', 'Categoryadmin.add');
        $this->router->get('/admin/category/edit/:id', 'Categoryadmin#edit', 'Categoryadmin.edit')->with('id', '[0-9]+');
        $this->router->post('/admin/category/edit/:id', 'Categoryadmin#edit', 'Categoryadmin.edit')->with('id', '[0-9]+');
        $this->router->get('/admin/category/delete/:id', 'Categoryadmin#delete', 'Categoryadmin.delete')->with('id', '[0-9]+');

        $this->router->get('/admin/comment', 'Commentadmin#index', 'Commentadmin.index');
        $this->router->get('/admin/comment/add', 'Commentadmin#add', 'Commentadmin.add');
        $this->router->post('/admin/comment/add', 'Commentadmin#add', 'Commentadmin.add');
        $this->router->get('/admin/comment/edit/:id', 'Commentadmin#edit', 'Commentadmin.edit')->with('id', '[0-9]+');
        $this->router->post('/admin/comment/edit/:id', 'Commentadmin#edit', 'Commentadmin.edit')->with('id', '[0-9]+');
        $this->router->get('/admin/comment/delete/:id', 'Commentadmin#delete', 'Commentadmin.delete')->with('id', '[0-9]+');

        $this->router->getRoute($this->request, $this->router);
    }

}
