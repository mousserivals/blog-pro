<?php

namespace Src\Form;

use Lib\Form\NotNullValidator;
use Lib\Form\Form;
use Src\Entity\Contact;

class ContactForm extends Form {

    public function build() {
        $this->form = ['firstname' => [
                'name' => 'firstname',
                'label' => 'Prénom',
                'placeholder' => 'Prénom',
                'value' => '',
                'errors' => [],
                'options' => false,
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de vérifier')
                ],
            ],
            'lastname' => [
                'name' => 'lastname',
                'label' => 'Nom',
                'placeholder' => 'Nom',
                'value' => '',
                'errors' => [],
                'options' => false,
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de vérifier')
                ],
            ],
            'email' => [
                'name' => 'email',
                'label' => 'Adresse Email',
                'placeholder' => 'Adresse Email',
                'value' => '',
                'errors' => [],
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de vérifier votre email')
                ],
            ],
            'message' => [
                'name' => 'message',
                'label' => 'message',
                'placeholder' => 'message',
                'value' => '',
                'errors' => [],
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de vérifier votre message'),
                ],
            ]
        ];
    }

}
