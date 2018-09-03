<?php

namespace Src\Form;

use Lib\Form\NotNullValidator;
use Lib\Form\ConfirmPasswordValidator;
use Lib\Form\MinLenghtValidator;
use Lib\Form\Form;
use Src\Entity\User;

class UserAdd extends Form {

    public function build() {
        $this->form = ['email' => [
                'name' => 'email',
                'label' => 'Adresse Email',
                'placeholder' => 'Adresse Email',
                'value' => '',
                'errors' => [],
                'options' => false,
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de vérifier votre email')
                ],
            ],
            'username' => [
                'name' => 'username',
                'label' => 'Pseudo',
                'placeholder' => 'Pseudo',
                'value' => '',
                'errors' => [],
                'options' => false,
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de vérifier')
                ],
            ],
            'firstname' => [
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
            'password' => [
                'name' => 'password',
                'label' => 'Mot de passe* (8 caractéres minimum )',
                'placeholder' => 'Mot de passe',
                'value' => '',
                'errors' => [],
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de spécifier un mon de passe'),
                    'minLenght' => new MinLenghtValidator('Le mot de passe doit contenir 8 caractéres alphanumérique', 8)
                ],
            ],
            'password2' => [
                'name' => 'password2',
                'label' => 'Confirmation mot de passe',
                'placeholder' => 'Confirmer le mot de passe',
                'value' => '',
                'errors' => [],
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de spécifier un mon de passe'),
                    'confirmPassword' => new ConfirmPasswordValidator('Les mots de passe ne sont pas identiques', 'password', $this)
                    
                ],
            ]
        ];
    }

}
