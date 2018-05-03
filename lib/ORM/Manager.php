<?php

namespace Lib\ORM;

class Manager {

    protected $pdo = null;
    protected $managers = [];

    public function __construct($pdo ,$entity) {
        
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

    protected function add(Posts $posts) {
        $requete = $this->pdo->prepare('INSERT INTO article SET title = :title, content = :content,date = NOW()');

        $requete->bindValue(':title', $posts->title());
        $requete->bindValue(':content', $posts->content());

        $requete->execute();
    }

    protected function modify(Posts $posts) {
        $requete = $this->pdo->prepare('UPDATE article SET title = :title, content = :content, date = NOW() WHERE id = :id');

        $requete->bindValue(':title', $posts->title());
        $requete->bindValue(':content', $posts->content());
        $requete->bindValue(':id', $posts->id(), \PDO::PARAM_INT);

        $requete->execute();
    }

}
