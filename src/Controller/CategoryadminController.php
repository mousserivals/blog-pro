<?php

namespace Src\Controller;

use Lib\Controller;
use Lib\Form\Form;
use Src\Entity\Category;
//use Src\Form\CategoryAdd;
//use Src\Form\CategoryEdit;

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

    }

    function edit($id) {

    }

    function delete($id) {

    }

}
