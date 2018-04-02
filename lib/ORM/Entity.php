<?php

namespace Lib\ORM;

abstract class Entity{

    protected $erreurs = [],
              $id;

    public function __construct(array $donnees = []) {
        if (!empty($donnees)) {
            $this->hydrate($donnees);
        }
    }

    
    public function isNew() {
        return empty($this->id);
    }

    public function erreurs() {
        return $this->erreurs;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = (int) $id;
    }

    public function hydrate(array $donnees) {
        foreach ($donnees as $attribut => $valeur) {
            $methode = 'set' . ucfirst($attribut);

            if (is_callable([$this, $methode])) {
                $this->$methode($valeur);
            }
        }
    }

    
    
}
