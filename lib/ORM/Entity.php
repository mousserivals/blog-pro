<?php

namespace Lib\ORM;



abstract class Entity{

    protected $erreurs = [],
              $id;

    public function __construct() {

    }

    
    /**
     * @return array
     */
    public abstract static function dataStructure();
    
    public function isNew() {
        return empty($this->id);
    }

    public function erreurs() {
        return $this->erreurs;
    }

    public function hydrate(array $donnees) {

        foreach ($donnees as $attribut => $valeur) {      
            $methode = 'set' . ucfirst($attribut);
            var_dump($methode);
            var_dump($valeur);
            if (is_callable([$this, $methode])) {
                $this->$methode($valeur);
                 var_dump("tst");
            }
        }      
        return $this;
    }

    
    
}
