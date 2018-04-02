<?php

namespace Lib\ORM;

class Managers {

    protected $api = null;
    protected $dao = null;
    protected $managers = [];

    public function __construct($api, $dao) {
        $this->api = $api;
        $this->dao = $dao;
    }

    public function getManagerOf($entity) {
        if (!is_string($entity) || empty($entity)) {
            throw new \InvalidArgumentException('Le entité spécifié est invalide');
        }

        if (!isset($this->managers[$entity])) {
            $manager = 'Src/Entity/' . $entity . 'Entity';

            $this->managers[$entity] = new $manager($this->dao);
        }

        return $this->managers[$entity];
    }

}
