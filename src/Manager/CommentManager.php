<?php

namespace Src\Manager;

use Src\Entity\Comment;
use Lib\ORM\Manager;

class CommentManager extends Manager {
    
    public function commentByPost($id) {
        
        $query = sprintf("SELECT * FROM %s WHERE post_id= %s", $this->datastructure["table"], $id);
        $requete = $this->pdo->prepare($query);
        $requete->execute(array(":table" => $this->datastructure["table"], ":id" => $id));
        $data = $requete->fetchAll(\PDO::FETCH_ASSOC);
        return $this->getHydrateAll($data);
    }
}
