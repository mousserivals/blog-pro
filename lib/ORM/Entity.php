<?php
namespace Lib\ORM;

abstract class Entity{

    protected $erreurs = [],
              $id;
    
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
            $methode = 'set' . ucfirst(static::dataStructure()['columns'][$attribut]['property']);
            if (is_callable([$this, $methode])) {
                $this->$methode($valeur);
            }
        }      
       
        return $this;
    }

    
    
}
