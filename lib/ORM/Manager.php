<?php

namespace Lib\ORM;

use Lib\ORM\PDOFactory;

class Manager {

    protected $pdo = null;
    private $entity;
    private $datastructure;

    public function __construct($entity) {

        $this->pdo = PDOFactory::getMysqlConnexion();
        $this->entity = $entity;
        $this->datastructure = $this->entity::dataStructure();
    }

    public function findAll(Entity $entity) {
        $requete = $this->pdo->query("select * from " . $this->datastructure["table"]);
        $data = $requete->fetchAll(\PDO::FETCH_OBJ);
        return array_map(function($row) {
            return (new $this->entity())->hydrate($row);
        }, $data);
    }

    public function find($id) {

        $query = sprintf("SELECT * FROM %s WHERE id= %s", $this->datastructure["table"], $id);
        $requete = $this->pdo->prepare($query);
        $requete->execute(array(":table" => $this->datastructure["table"], ":id" => $id));
        $result = $requete->fetch(\PDO::FETCH_ASSOC);
        return (new $this->entity())->hydrate($result);
    }

    public function add(Entity $entity) {
        $set = [];
        $parasm = [];
        foreach ($entity::dataStructure()['columns'] as $col) {
            $property = $col['property'];
            $proper = $this->verifProperty($property);
            $set[] = sprintf("%s = :%s", $proper, $col['property']);
            $parasm[$col['property']] = $entity->$property;
        }
        $requete = $this->pdo->prepare(sprintf("INSERT INTO %s SET %s", $entity::dataStructure()["table"], implode(",", $set)));
        $requete->execute($parasm);
        return true;
    }

    public function modify(Entity $entity) {
        $set = [];
        $parasm = [];
        foreach ($this->datastructure['columns'] as $col) {
            $property = $col['property'];
            $proper = $this->verifProperty($property);

            if (!empty($entity->$property)) {

                $set[] = sprintf("%s = :%s", $proper, $col['property']);
                $parasm[$col['property']] = $entity->$property;
            }
        }

        if (count($set)) {
            $query = sprintf("UPDATE %s SET %s WHERE %s = :id", $entity::dataStructure()["table"], implode(",", $set), $entity::dataStructure()["primaryKey"]);
            $requete = $this->pdo->prepare($query);
            $requete->execute($parasm);

            return true;
        }
        return false;
    }

    public function delete(Entity $entity) {

        if (!isset($entity->id)) {
            throw new \InvalidArgumentException("erreur : il n'y a aucun identifiant");
        }

        $query = sprintf("DELETE FROM %s WHERE %s = :id", $entity::dataStructure()["table"], $entity::dataStructure()["primaryKey"]);
        $requete = $this->pdo->prepare($query);
        $requete->execute([$entity::dataStructure()["primaryKey"] => $entity->id]);
        
        return true;
    }

    public function verifProperty($property) {
        if (preg_match('#^[^A-Z]*([A-Z].*)#', $property, $result)) {
            $result1 = str_replace($result[1], "", $property);
//            
            $result2 = lcfirst($result[1]);
            $result = $result1 . "_" . $result2;
            return $result;
        }
        return $property;
    }

//    public function getList($debut = -1, $limite = -1) {
////        var_dump($this->dataStructure);
////        foreach ($this->dataStructure as $key => $value) {
////            var_dump($key);
////            var_dump($value);
////            exit();
////        }
//        $sql = 'SELECT id, title, content, date FROM article ORDER BY id DESC';
//
//        if ($debut != -1 || $limite != -1) {
//            $sql .= ' LIMIT ' . (int) $limite . ' OFFSET ' . (int) $debut;
//        }
//
//        $requete = $this->pdo->query($sql);
//        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\postEntity');
//
//        $listePosts = $requete->fetchAll();
//
//        $requete->closeCursor();
//
//        return $listePosts;
//    }
//
//    public function count() {
//        return $this->pdo->query('SELECT COUNT(*) FROM article')->fetchColumn();
//    }
//
}
