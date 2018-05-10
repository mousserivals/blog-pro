<?php

namespace Lib\ORM;



class PDOFactory {

    private $entity;
    public $managers;

    public static function getMysqlConnexion() {
        $db = new \PDO('mysql:host=localhost;dbname=blog-pro', 'steph', 'Steph@555@ane');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }

    public function getManagerOf($entity) {
        $class = new \ReflectionClass($entity);
//        var_dump($class->getParentClass());
//        var_dump($class->getName());
//        var_dump($class->getNamespaceName());
//        var_dump($class->getShortName());
//        var_dump($class->getParentClass()->getName());
        
        if ($class->getParentClass()->getName() !== Entity::class) {
            throw new ORMException("Cette classe n'est pas une entité.");
        }
        
        if (!is_string($entity) || empty($entity)) {
            throw new \InvalidArgumentException('Le entité spécifié est invalide');
        }

        if (!isset($this->managers[$entity])) {
//            var_dump($entity::dataStructure());
//            exit();
            $manager = $entity::dataStructure()['manager'];
                $this->managers[$entity] = new $manager($this);    
        }
        
        return $this->managers[$entity];
    }

}
