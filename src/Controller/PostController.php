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
//        $post = new Post();
//        $post->setId(4);
//        $post->setTitle("titlemodified");
//        $post->setContent("titlemodified");
//        $post->setCategoryId(1);
//        $post->setDate(date("Y-m-d H:i:s"));
//         $postManager = $this->database()->getManagerOf(Post::class)->add($post);
        
        $manager = $this->database()->getManagerOf(Post::class);
        $article = $manager->find(4);
        var_dump($article);

        $manager->modify($article);

//        $manager->delete()->find($article);

    }

}
