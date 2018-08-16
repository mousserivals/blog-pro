<?php

namespace Src\Controller;

use Lib\Controller;
use Lib\Form\Form;
use Src\Entity\Comment;
use Src\Form\CommentAdd;

/**
 * Description of PostAdmin
 *
 * @author steph
 */
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

    }

    function delete($id) {

    }

}
