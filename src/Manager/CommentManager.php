<?php

namespace Src\Manager;

use Src\Entity\Comment;
use Lib\ORM\Manager;

class CommentManager extends Manager {
    
    public function commentByPost($id) {
        
        $query = sprintf("SELECT a.* , u.username FROM %s as a ,user as u WHERE post_id= %s and a.user_id = u.id", $this->datastructure["table"], $id);
        $requete = $this->pdo->prepare($query);
        $requete->execute(array(":table" => $this->datastructure["table"], ":id" => $id));
        $data = $requete->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }
}
