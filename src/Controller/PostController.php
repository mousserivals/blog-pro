<?php

namespace Src\Controller;

use Lib\Controller;
use Src\Entity\Post;
use Src\Entity\Category;
use Src\Entity\Comment;
use Src\Manager\PostManager;
use Src\Manager\CommentManager;

class PostController extends Controller {

    function home() {


        $this->render('Post/home.html.twig', ['title' => 'Bienvenu visiteur']);
    }

    function index($newpage = null) {

        $manager = $this->database()->getManagerOf(Post::class);
        $paginations = $manager->paginate($newpage);
        $this->render('Post/index.html.twig', ['pagination' => $paginations]);
    }

    function show($id) {
        $manager = $this->database()->getManagerOf(Post::class);
        $article = $manager->postWithUser($id);

        $manager = $this->database()->getManagerOf(Comment::class);
        $comments = $manager->commentByPost($id);

        $this->render('Post/show.html.twig', ['article' => $article,'comments' => $comments]);
    }

}
