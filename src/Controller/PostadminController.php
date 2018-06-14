<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Src\Controller;

use Lib\Controller;
use Src\Entity\Post;
/**
 * Description of PostAdmin
 *
 * @author steph
 */
class PostadminController extends Controller {

    function home() {
        
    }
    
    function index($newpage = null) {
//        $manager = $this->database()->getManagerOf(Comment::class);
//        $article = $manager->commentByPost(1);
        $manager = $this->database()->getManagerOf(Post::class);
        $paginations = $manager->paginate($newpage,7);
        $this->render('Admin/Post/index.html.twig', ['pagination' => $paginations]);
    }

    function show($id) {

    }
    
    function add($param) {
        
    }
    
    function edit($param) {
        
    }
    
    function delete($param) {
        
    }

}
