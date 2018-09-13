<?php

namespace Src\Form;

use Lib\Form\NotNullValidator;
use Lib\Form\Form;
use Src\Entity\User;

class UserConnection extends Form {

    public function build() {
        $this->form = ['email' => [
                'name' => 'email',
                'label' => 'Adresse Email',
                'placeholder' => 'Adresse Email',
                'value' => '',
                'errors' => [],
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de vérifier votre email')
                ],
            ],
            'password' => [
                'name' => 'password',
                'label' => 'Mot de passe',
                'placeholder' => 'Mot de passe',
                'value' => '',
                'errors' => [],
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de spécifier un mon de passe'),
                ],
            ]
        ];
    }

}
