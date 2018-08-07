<?php

namespace Src\Controller;

use Lib\Controller;
use Lib\Form\Form;
use Src\Entity\Post;
use Src\Form\PostAdd;
use Src\Form\PostEdit;

/**
 * Description of PostAdmin
 *
 * @author steph
 */
class PostadminController extends Controller {

    function home() {
        
    }

    function index($newpage = null) {

        $manager = $this->database()->getManagerOf(Post::class);
        $paginations = $manager->paginate($newpage, 7);
        $this->render('Admin/Post/index.html.twig', ['pagination' => $paginations]);
    }

    function show($id) {
        
    }

    function add() {
        $erreur = [];
        $message = '';
        $form = new PostAdd($this->database(), new Post());
        $form->build();
        $form->handle($this->request->post());
        if ($this->request->method() == 'POST' && $form->isValid()) {
            $manager = $this->database()->getManagerOf(Post::class);
            $form->entity->setUserId(1);
            $form->entity->setDateCreated(date("Y-m-d H:i:s"));
            $manager->add($form->entity);
            $message = 'Article bien enregisté';
            $this->session->setFlash($message, 'success');
            $this->redirect('Postadmin.index',['message' => $message]);
        }

        $this->render('Admin/Post/add.html.twig', ['form' => $form->getView(), 'message' => $message]);
    }

    function edit($id) {
        $erreur = [];
        $message = '';
        $manager = $this->database()->getManagerOf(Post::class);
        $article = $manager->find($id);

        $form = new PostEdit($this->database(), $article);
        $form->build();

        $form->handle($this->request->post());

        if ($this->request->method() == 'POST' && $form->isValid()) {
            $form->entity->setDateCreated(date("Y-m-d H:i:s"));
            $manager->modify($form->entity);

            $message = 'Article bien Modifié';
            $this->session->setFlash($message, 'success');
            $this->redirect('Postadmin.index',['message' => $message]);
        }

        $this->render('Admin/Post/edit.html.twig', ['form' => $form->getView(), 'message' => $message]);
    }

    function delete($id) {
        $manager = $this->database()->getManagerOf(Post::class);
        $article = $manager->find($id);

        $manager->delete($article);

        $message = 'Article bien été supprimé';
        $this->session->setFlash($message, 'success');
        $this->redirect('Postadmin.index',['message' => $message]);
    }

}
