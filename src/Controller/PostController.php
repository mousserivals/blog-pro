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
        $post = $this->database()->getManagerOf(Post::class);

        var_dump($post);
        var_dump($post::dataStructure());
        $ds = $post::dataStructure();
       // var_dump($post->hidrate($ds));
//        var_dump($post->hidrate($post));
        exit();
    }

}
