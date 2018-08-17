<?php

namespace Src\Form;

use Lib\Form\NotNullValidator;
use Lib\Form\Form;
use Src\Entity\Category;



class PostAdd extends Form {

    public function build() {
        
        $managerCategorie = $this->database->getManagerOf(Category::class);
        $cat = $managerCategorie->findAll();
        $catArray = array_combine(array_map(function($c) {
                    return $c->getId();
                }, $cat), array_map(function($c) {
                    return $c->getTitle();
                }, $cat));
                
        $this->form = ['title' => [
                'name' => 'title',
                'label' => 'Titre',
                'placeholder' => 'Titre',
                'value' => '',
                'errors' => [],
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de spécifier le titre')
                ],
            ],
            'categoryId' => [
                'name' => 'category_id',
                'label' => 'Categorie',
                'placeholder' => 'Categorie',
                'option_array' => $catArray,
                'value' => '',
                'errors' => [],
                'options' => false,
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de vérifier la catégorie')
                ],
            ],
            'content' => [
                'name' => 'content',
                'label' => 'Contenu',
                'placeholder' => 'Contenu',
                'value' => '',
                'errors' => [],
                "validate" => [
                    'notNull' => new NotNullValidator('Merci de spécifier un contenu')
                ],
            ]
        ];
    }
    
    

}

