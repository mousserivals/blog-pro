<?php

namespace Lib\ORM;

use Lib\ORM\Manager;

class PDOFactory {

    public $managers = [];

    public static function getMysqlConnexion() {
        $db = new \PDO('mysql:host=localhost;dbname=blog-pro', 'steph', 'Steph@555@ane');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }

    public function getManagerOf($entity) {

        $class = new \ReflectionClass($entity);

        if ($class->getParentClass()->getName() !== Entity::class) {
            throw new ORMException("Cette classe n'est pas une entité.");
        }
        if (!is_string($entity) || empty($entity)) {
            throw new \InvalidArgumentException('Le entité spécifié est invalide');
        }

       
        if (!isset($this->managers[$entity])) {
            $manager = $entity::dataStructure()['manager'];
            $this->managers[$entity] = new $manager($entity);
        }

        return $this->managers[$entity];
    }

}
