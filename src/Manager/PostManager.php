<?php

namespace Src\Manager;

use Src\Entity\Post;
use Lib\ORM\Manager;

class PostManager extends Manager {

    public function PostByUser($id) {

        $query = sprintf("SELECT * FROM %s WHERE user_id= %s", $this->datastructure["table"], $id);
        $requete = $this->pdo->prepare($query);
        $requete->execute(array(":table" => $this->datastructure["table"], ":user_id" => $id));
        $result = $requete->fetchAll(\PDO::FETCH_ASSOC);

        return $this->getHydrateAll($result);
    }

    public function postByCategory($id) {

        $query = sprintf("SELECT * FROM %s WHERE category_id= %s", $this->datastructure["table"], $id);
        $requete = $this->pdo->prepare($query);
        $requete->execute(array(":table" => $this->datastructure["table"], ":category_id" => $id));
        $result = $requete->fetchAll(\PDO::FETCH_ASSOC);

        return $this->getHydrateAll($result);
    }

}
