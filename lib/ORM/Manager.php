<?php

namespace Lib\ORM;

use Lib\ORM\PDOFactory;

class Manager {

    protected $pdo = null;

    public function __construct($pdo ) {
        
        $this->pdo = $pdo;
    }

    public function findAll() {
        $query = 'select * form :table ';
        $this->pdo->prepare($query, array(\PDO::FETCH_OBJ));
        $this->pdo->excecute(array(':table' => 150));
    }
    
    public function getList($debut = -1, $limite = -1) {
//        var_dump($this->dataStructure);
//        foreach ($this->dataStructure as $key => $value) {
//            var_dump($key);
//            var_dump($value);
//            exit();
//        }
        $sql = 'SELECT id, title, content, date FROM article ORDER BY id DESC';

        if ($debut != -1 || $limite != -1) {
            $sql .= ' LIMIT ' . (int) $limite . ' OFFSET ' . (int) $debut;
        }

        $requete = $this->pdo->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\postEntity');

        $listePosts = $requete->fetchAll();

        $requete->closeCursor();

        return $listePosts;
    }

    public function getUnique($id) {

        $requete = $this->pdo->prepare('SELECT id,  title, content, date FROM article WHERE id = :id');
        $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $requete->execute();
        $result = $requete->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function count() {
        return $this->pdo->query('SELECT COUNT(*) FROM article')->fetchColumn();
    }

    public function add(Entity $entity) {
        
//        $this->managers($entity);
//        var_dump($entity::dataStructure());

//        if (true) {
//            
//        }
        var_dump($entity);
        foreach ($entity::dataStructure()['columns'] as $key => $value) {
        var_dump($key);
        var_dump($value);
            exit();
        }
        $requete = $this->pdo->prepare('INSERT INTO article SET title = :title, content = :content,date = NOW()');

        $requete->bindValue(':title', $entity->title());
        $requete->bindValue(':content', $entity->content());

        $requete->execute();
    }

    public function modify(Entity $entity) {

        $requete = $this->pdo->prepare('UPDATE article SET title = :title, content = :content, date = NOW() WHERE id = :id');

        $requete->bindValue(':title', $posts->title());
        $requete->bindValue(':content', $posts->content());
        $requete->bindValue(':id', $posts->id(), \PDO::PARAM_INT);

        $requete->execute();
    }
    
    public function delect($param) {
        
    }
    
}
