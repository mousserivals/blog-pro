<?php

namespace Src\Controller;

use Lib\Controller;
use Lib\Form\Form;
use Src\Entity\Post;
use Src\Entity\Category;
use Src\Form\PostAdd;

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
            $form->entity->setCategoryId(intval($this->request->post()['category_id']));
            $form->entity->setDateCreated(date("Y-m-d H:i:s"));
            $manager->add($form->entity);
            $message = 'Article bien enregisté';
        }

        $this->render('Admin/Post/add.html.twig', ['form' => $form->getView(), 'message' => $message]);
    }

    function edit($param) {
        
    }

    function delete($param) {
        
    }

}
