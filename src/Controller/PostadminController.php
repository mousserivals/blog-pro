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
        $form = new PostAdd($this->database(), new Post());
        $form->build();
        $form->handle($this->request->post());
        if ($this->request->method() == 'POST' && $form->isValid()) {
            $manager = $this->database()->getManagerOf(Post::class);
            $form->entity->setUserId(1);
            $form->entity->setDateCreated(date("Y-m-d H:i:s"));
            $manager->add($form->entity);
            $this->session->setFlash('Article bien enregisté', 'success');
            $this->redirect('Postadmin.index');
        }

        $this->render('Admin/Post/add.html.twig', ['form' => $form->getView(), 'message' => $message]);
    }

    function edit($id) {
        $manager = $this->database()->getManagerOf(Post::class);
        $article = $manager->find($id);

        $form = new PostEdit($this->database(), $article);
        $form->build();

        $form->handle($this->request->post());

        if ($this->request->method() == 'POST' && $form->isValid()) {
            $form->entity->setDateCreated(date("Y-m-d H:i:s"));
            $manager->modify($form->entity);

            $this->session->setFlash('Article bien Modifié', 'success');
            $this->redirect('Postadmin.index');
        }

        $this->render('Admin/Post/edit.html.twig', ['form' => $form->getView(), 'message' => $message]);
    }

    function delete($id) {
        $manager = $this->database()->getManagerOf(Post::class);
        $article = $manager->find($id);

        $manager->delete($article);

        $this->session->setFlash('Article bien été supprimé', 'success');
        $this->redirect('Postadmin.index');
    }

}
