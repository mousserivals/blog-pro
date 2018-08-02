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
        $paginations = $manager->paginate($newpage, 7);
        $this->render('Admin/Post/index.html.twig', ['pagination' => $paginations]);
    }

    function show($id) {
        
    }

    function add() {
        $erreur = [];
        $message = '';

        if (!empty($_POST)) {


            if (!empty($_POST['categoryId'])) {
                $categorie = htmlentities($_POST['categoryId']);
            } else {
                $erreur['cat'] = 'Merci de vérifier la catégorie';
            }

            if (is_string($_POST['title']) && !empty($_POST['title'])) {
                $title = htmlentities($_POST['title']);
            } else {
                $erreur['tit'] = 'Le titre est vide, Merci de le renseigner';
            }

            if (is_string($_POST['content']) && !empty($_POST['content'])) {
                $content = htmlentities($_POST['content']);
            } else {
                $erreur['con'] = 'Le contenu est vide, Merci de le renseigner';
            }
            if (!empty($erreur)) {
                $this->render('Admin/Post/add.html.twig', ['erreur' => $erreur,
                    'categorie' => $_POST['categoryId'],
                    'title' => $_POST['title'],
                    'content' => $_POST['content']]);
            } else {
                $post = new Post();
                $post->setUserId(1);
                $post->setTitle($title);
                $post->setContent($content);
                $post->setCategoryId($categorie);
                $post->setDateCreated(date("Y-m-d H:i:s"));
                $postManager = $this->database()->getManagerOf(Post::class)->add($post);

                $message = 'l\'article a bien été enregistré';
                $this->render('Admin/Post/add.html.twig', ['message' => $message]);
            }
        }

        $this->render('Admin/Post/add.html.twig');
    }

    function edit($id = null) {
        $erreur = [];
        $message = '';
        if (!empty($_POST)) {

            if (!empty($_POST['categoryId'])) {
                $categorie = htmlentities($_POST['categoryId']);
            } else {
                $erreur['cat'] = 'Merci de vérifier la catégorie';
            }

            if (is_string($_POST['title']) && !empty($_POST['title'])) {
                $title = htmlentities($_POST['title']);
            } else {
                $erreur['tit'] = 'Le titre est vide, Merci de le renseigner';
            }

            if (is_string($_POST['content']) && !empty($_POST['content'])) {
                $content = htmlentities($_POST['content']);
            } else {
                $erreur['con'] = 'Le contenu est vide, Merci de le renseigner';
            }
            if (!empty($erreur)) {
                $this->render('Admin/Post/add.html.twig', ['erreur' => $erreur,
                    'categorie' => $_POST['categoryId'],
                    'title' => $_POST['title'],
                    'content' => $_POST['content']]);
            } else {

                $manager = $this->database()->getManagerOf(Post::class);
                $post = $manager->find($_POST['id']);

                $post->setId($_POST['id']);
                $post->setUserId(1);
                $post->setTitle($title);
                $post->setContent($content);
                $post->setCategoryId($categorie);

                $manager->modify($post);

                $message = 'l\'article a bien été modifié';
                $this->render('Admin/Post/add.html.twig', ['message' => $message]);
            }
        }

        $manager = $this->database()->getManagerOf(Post::class);
        $post = $manager->find($id);
        $this->render('Admin/Post/edit.html.twig', ['article' => $post]);
    }

    function delete($param) {
        
    }

}
