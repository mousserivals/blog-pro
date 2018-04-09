<?php

namespace Lib\ORM;

class Manager {

    protected $dao = null;
    protected $managers = [];

    public function __construct($dao) {
        $this->dao = $dao;
    }

    public function getManagerOf($manager) {
        if (!is_string($manager) || empty($manager)) {
            throw new \InvalidArgumentException('Le entité spécifié est invalide');
        }

        if (!isset($this->managers[$manager])) {
            $manager = 'Src\\Manager\\' . $manager . 'Manager';
            $this->managers[$manager] = new $manager($this->dao);
        }

        return $this->managers[$manager];
    }

}
