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
        $manager = $this->database()->getManagerOf(Post::class);
        $article = $manager->find(1);
        echo 'index';
    }

    function show($id) {

//        $post = new Post();
//        $post->setId(5);
//        $post->setTitle("titlemodified");
//        $post->setContent("titlemodified");
//        $post->setCategoryId(1);
//        $post->setDate(date("Y-m-d H:i:s"));
//         $postManager = $this->database()->getManagerOf(Post::class)->add($post);

        $manager = $this->database()->getManagerOf(Post::class);
        $article = $manager->find(5);
//        $article->setTitle('titre modifie');
//        $article->setContent('contenu modifie');
//        $manager->modify($article);
        $manager->delete($article);

    }

}
