<?php

namespace Src\Form;

use Lib\Form\NotNullValidator;
use Lib\Form\Form;



class CategoryEdit extends Form {

    public function build() {
                
        $this->form = [
            
            'id' => [
                'name' => 'id',
                'label' => '',
                'placeholder' => '',
                'value' => $this->entity->getId(),
                'errors' => [],
                "validate" => [],
            ],
            'title' => [
                'name' => 'title',
                'label' => 'Titre',
                'placeholder' => 'Titre',
                'value' => $this->entity->getTitle(),
                'errors' => [],
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de spécifier le titre')
                ],
            ]
        ];
    }
    
    

}
