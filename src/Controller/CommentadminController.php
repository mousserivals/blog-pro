<?php

namespace Src\Controller;

use Lib\Controller;
use Lib\Form\Form;
use Src\Entity\Comment;
use Src\Form\CommentAdd;
use Src\Form\CommentEdit;

class CommentadminController extends Controller {

    function index($newpage = null) {

        $manager = $this->database()->getManagerOf(Comment::class);
        $paginations = $manager->paginate($newpage, 7);
        $this->render('Admin/Comment/index.html.twig', ['pagination' => $paginations]);
    }

    function add() {
        $form = new CommentAdd($this->database(), new Comment());
        $form->build();

        $form->handle($this->request->post());
        if ($this->request->method() == 'POST' && $form->isValid()) {

            $manager = $this->database()->getManagerOf(Comment::class);

            $form->entity->setDateCreated(date("Y-m-d H:i:s"));
            $manager->add($form->entity);
            $this->session->setFlash('Commentaire bien enregisté', 'success');
            $this->redirect('Commentadmin.index');
        }

        $this->render('Admin/Comment/add.html.twig', ['form' => $form->getView()]);
    }

    function edit($id) {
        $manager = $this->database()->getManagerOf(Comment::class);
        $comment = $manager->find($id);

        $form = new CommentEdit($this->database(), $comment);
        $form->build();

        $form->handle($this->request->post());

        if ($this->request->method() == 'POST' && $form->isValid()) {
            $form->entity->setDateCreated(date("Y-m-d H:i:s"));
            $manager->modify($form->entity);

            $this->session->setFlash('Le commentaire a bien Modifié', 'success');
            $this->redirect('Commentadmin.index');
        }

        $this->render('Admin/Comment/edit.html.twig', ['form' => $form->getView()]);
    }

    function valided() {
        if ($this->request->method() == 'POST') {
            $id = intval($this->request->post()['id']);
            $res = ($this->request->post()['res'] == 'false')? 0 : 1;

            $manager = $this->database()->getManagerOf(Comment::class);
            $val = $manager->validComment($id, $res);
            
            echo $res;
        }
    }

    function delete($id) {
        $manager = $this->database()->getManagerOf(Comment::class);
        $comment = $manager->find($id);

        $manager->delete($comment);

        $this->session->setFlash('Le commentaire a bien été supprimé', 'success');
        $this->redirect('Commentadmin.index');
    }

}
