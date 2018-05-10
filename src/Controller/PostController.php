<?php

namespace Src\Controller;

use Lib\Controller;
use Src\Entity\Post;
use Src\Manager\PostManager;

class PostController extends Controller {

    function home() {
        echo 'homepage';
    }

    function index() {

        echo 'index';
    }

    function show($id) {
//        ->query('SELECT * FROM article');
//        var_dump($this->database()->getManagerOf(Post::class)); exit();
        $post = new Post();
        $post->getTitle("title");
        $post->getContent("title");
        $post->getCategoryId(1);
        $post->getDate(date("Y-m-d H:i:s"));
        
        
        $postManager = $this->database()->getManagerOf(Post::class)->add($post);
        var_dump($postManager);
        exit();
    }

}
