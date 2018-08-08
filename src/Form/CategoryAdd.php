<?php

namespace Src\Form;

use Lib\Form\NotNullValidator;
use Lib\Form\Form;

class CategoryAdd extends Form {

    public function build() {
        
               
        $this->form = ['title' => [
                'name' => 'title',
                'label' => 'Titre',
                'placeholder' => 'Titre',
                'value' => '',
                'errors' => [],
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de spécifier le titre')
                ],
            ]
        ];
    }
    
    

}
