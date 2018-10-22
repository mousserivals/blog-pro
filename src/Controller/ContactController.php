<?php

namespace Src\Controller;

use Lib\Controller;
use Src\Entity\Contact;
use Src\Form\ContactForm;

class ContactController extends Controller {

    public function send() {

        $form = new contactForm($this->database(), new Contact());
        $form->build();
        $form->handle($this->request->post());
        if ($this->request->method() == 'POST' && $form->isValid()) {
            $post = $this->request->post();
            
            if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == 'blog-pro.com') {
                // Create the Transport
                $transport = (new \Swift_SmtpTransport('smtp.mailtrap.io', 25))
                        ->setUsername('001de698ab95dc')
                        ->setPassword('2e3f016de2a00a');
            } else {
                $transport = (new \Swift_SmtpTransport);       
            }

            // Create the Mailer using your created Transport
            $mailer = new \Swift_Mailer($transport);

            // Create a message
            $message = (new \Swift_Message('message du blog de ' . $post['firstname'] . ' ' . $post['lastname']))
                    ->setFrom(['fitoussistphane@gmail.com' => 'Steph'])
                    ->setTo([$post['email']])
                    ->setBody($post['message'])
            ;

            // Send the message
            $result = $mailer->send($message);
            $this->session->setFlash('Merci, Votre message a bien été envoyé, un de nos modérateurs prendra contact avec vous, dans les plus brefs délais', 'success');
            $this->redirect('Contact.send');
        }

        $this->render('contact.html.twig', ['form' => $form->getView()]);
    }

}
