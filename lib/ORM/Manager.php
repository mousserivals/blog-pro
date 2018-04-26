<?php

namespace Lib\ORM;

class Manager {

    protected $dao = null;
    protected $managers = [];
    protected $dataStructure = [];

    public function __construct($dao) {
        
        $this->dao = $dao;
    }

    public function getManagerOf($manager) {

        $entityName = explode("\\", $manager);
        if (!is_string($manager) || empty($manager)) {
            throw new \InvalidArgumentException('Le entité spécifié est invalide');
        }
        
        if (!isset($this->managers[$manager])) {
          //  $entity = new Entity($manager::dataStructure());
            var_dump($entity);
            $this->dataStructure = $manager::dataStructure();
            var_dump($this->dataStructure);
            $manager = 'Src\\Manager\\' . $entityName[2] . 'Manager';
            $this->managers[$manager] = new $manager($this->dao);
            
        }
        return $this->managers[$manager];
    }

    public function getList($debut = -1, $limite = -1) {
        var_dump($this->dataStructure);
        foreach ($this->dataStructure as $key => $value) {
            var_dump($key);
            var_dump($value);
            exit();
        }
        $sql = 'SELECT id, title, content, date FROM article ORDER BY id DESC';

        if ($debut != -1 || $limite != -1) {
            $sql .= ' LIMIT ' . (int) $limite . ' OFFSET ' . (int) $debut;
        }

        $requete = $this->dao->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\postEntity');

        $listePosts = $requete->fetchAll();

        $requete->closeCursor();

        return $listePosts;
    }

    public function getUnique($id) {

        $requete = $this->dao->prepare('SELECT id,  title, content, date FROM article WHERE id = :id');
        $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $requete->execute();
        $result = $requete->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function count() {
        return $this->dao->query('SELECT COUNT(*) FROM article')->fetchColumn();
    }

    protected function add(Posts $posts) {
        $requete = $this->dao->prepare('INSERT INTO article SET title = :title, content = :content,date = NOW()');

        $requete->bindValue(':title', $posts->title());
        $requete->bindValue(':content', $posts->content());

        $requete->execute();
    }

    protected function modify(Posts $posts) {
        $requete = $this->dao->prepare('UPDATE article SET title = :title, content = :content, date = NOW() WHERE id = :id');

        $requete->bindValue(':title', $posts->title());
        $requete->bindValue(':content', $posts->content());
        $requete->bindValue(':id', $posts->id(), \PDO::PARAM_INT);

        $requete->execute();
    }

}
