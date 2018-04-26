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
        var_dump($id);
        $post = $this->database()->getManagerOf(Post::class)->getList(1,10);

     //   var_dump($post);
     //   exit();
    }

}
