<?php

namespace Lib\ORM;

use Lib\ORM\PDOFactory;
use Lib\Form;

class Manager {

    protected $pdo = null;
    protected $entity;
    public $datastructure;
    protected $form;

    public function __construct($entity) {

        $this->pdo = PDOFactory::getMysqlConnexion();
        $this->entity = $entity;
        $this->datastructure = $this->entity::dataStructure();
    }

    public function getHydrate($data) {
        return (new $this->entity())->hydrate($data);
    }

    public function getHydrateAll($data) {
        return array_map(function($row) {
            return (new $this->entity())->hydrate($row);
        }, $data);
    }

    public function findAll() {
        $requete = $this->pdo->query("select * from " . $this->datastructure["table"]);
        $data = $requete->fetchAll(\PDO::FETCH_ASSOC);
        return $this->getHydrateAll($data);
    }

    public function find($id) {

        $query = sprintf("SELECT * FROM %s WHERE id= %s", $this->datastructure["table"], $id);
        $requete = $this->pdo->prepare($query);
        $requete->execute(array(":table" => $this->datastructure["table"], ":id" => $id));
        $result = $requete->fetch(\PDO::FETCH_ASSOC);
        return $this->getHydrate($result);
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

    public function paginate($newpage = null,$perPage = null) {
        $pagination = [];
        $nbArt = (int)$this->count();
        $perPage = ($perPage)? $perPage :  5;
        $nbage = ceil($nbArt/$perPage);
        $cPage = (isset($newpage))? $newpage :  1 ;
        $current = ($cPage-1)*$perPage;
        $curPage = (isset($newpage))? $newpage :  0 ;
        $first = $curPage-1;
        if ($first == 0) {
            $first = 1;
        }
        $last = $curPage+1;
        if ($last == $nbage) {
            $last = $nbage;
        }

        $query = sprintf("select * from %s ORDER BY %s DESC LIMIT %s,%s", $this->datastructure["table"], $this->datastructure["primaryKey"], $current ,$perPage);
        $requete = $this->pdo->prepare($query);
        $requete->execute(array(":table" => $this->datastructure["table"], ":id" => $this->datastructure["primaryKey"], "current" => $current, "perPage" => $perPage));
        $data = $requete->fetchAll(\PDO::FETCH_ASSOC);
        $result =  $this->getHydrateAll($data);
        $pagination['result'] = $result;
        $pagination['nbpage'] = $nbage;
        $pagination['currentPage'] = $curPage;
        $pagination['first'] = $first;
        $pagination['last'] = $last;
        $pagination['path'] = $_SERVER['REQUEST_URI'];
        return $pagination;

    }

    public function count() {
        $query = sprintf("SELECT COUNT(*) FROM %s ", $this->datastructure["table"]);
        $requete = $this->pdo->prepare($query);
        $requete->execute();
        $result = $requete->fetchColumn();

        return $result;
    }
   
}
