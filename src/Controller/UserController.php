<?php

namespace Src\Controller;

use Lib\Controller;
use Src\Entity\User;
use Src\Form\UserAdd;

class UserController extends Controller {

    public function registration() {

        $form = new UserAdd($this->database(), new User());
        $form->build();
        $form->handle($this->request->post());
        if ($this->request->method() == 'POST' && $form->isValid()) {
            $name = $this->request->files()['avatar']["name"];
            $tmp = $this->request->files()['avatar']["tmp_name"];
            $target_file = "/var/www/blog-pro/web/upload/avatar/" . $name;
            move_uploaded_file($tmp, $target_file);

            $manager = $this->database()->getManagerOf(User::class);
            $form->entity->setAvatar($name);
            $form->entity->setPassword(md5($this->request->post()['password']));
            $form->entity->setRole('visitor');
            $form->entity->setDateCreated(date("Y-m-d H:i:s"));
            $manager->add($form->entity);
            $this->session->setFlash('Votre compte à bien enregisté', 'success');
            $this->redirect('Postadmin.index');
        }

        $this->render('User/registration.html.twig', ['form' => $form->getView()]);
    }

}
