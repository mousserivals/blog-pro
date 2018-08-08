<?php

namespace Src\Controller;

use Lib\Controller;
use Lib\Form\Form;
use Src\Entity\Category;
use Src\Form\CategoryAdd;
use Src\Form\CategoryEdit;

/**
 * Description of PostAdmin
 *
 * @author steph
 */
class CategoryadminController extends Controller {

    function home() {
        
    }

    function index($newpage = null) {

        $manager = $this->database()->getManagerOf(Category::class);
        $paginations = $manager->paginate($newpage, 7);
        $this->render('Admin/Category/index.html.twig', ['pagination' => $paginations]);
    }

    function show($id) {

    }

    function add() {
        $form = new CategoryAdd($this->database(), new Category());
        $form->build();
        $form->handle($this->request->post());
        if ($this->request->method() == 'POST' && $form->isValid()) {
            $manager = $this->database()->getManagerOf(Category::class);
            $manager->add($form->entity);
            $this->session->setFlash('Categorie bien enregistée', 'success');
            $this->redirect('Categoryadmin.index');
        }

        $this->render('Admin/Category/add.html.twig', ['form' => $form->getView()]);
    }

    function edit($id) {
        $manager = $this->database()->getManagerOf(Category::class);
        $cat = $manager->find($id);

        $form = new CategoryEdit($this->database(), $cat);
        $form->build();

        $form->handle($this->request->post());

        if ($this->request->method() == 'POST' && $form->isValid()) {
            $manager->modify($form->entity);

            $this->session->setFlash('Categorie bien Modifiée', 'success');
            $this->redirect('Categoryadmin.index');
        }

        $this->render('Admin/Category/edit.html.twig', ['form' => $form->getView()]);
    }

    function delete($id) {

    }

}
