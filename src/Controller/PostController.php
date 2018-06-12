<?php

namespace Src\Controller;

use Lib\Controller;
use Src\Entity\Post;
use Src\Entity\Category;
use Src\Entity\Comment;
use Src\Manager\PostManager;

class PostController extends Controller {

    function home() {

      $this->render('Post/home.html.twig',['title' => 'Bienvenu visiteur']);
    }

    function index() {
        $manager = $this->database()->getManagerOf(Comment::class);
        $article = $manager->commentByPost(1);
        
        $this->render('Post/index.html.twig',['title' => 'Bienvenu visiteur']);

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
        $article = $manager->find(1);
//        $article->setTitle('titre modifie');
//        $article->setContent('contenu modifie');
//        $manager->modify($article);
//        $manager->delete($article);
//echo $article;
var_dump($article);
exit();
    }

}
