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
    
    public function commentByPostWithValided($id) {

        $query = sprintf("SELECT a.* , u.username FROM %s as a ,user as u WHERE post_id= %s AND a.user_id = u.id AND a.valided = 1", $this->datastructure["table"], $id);
        $requete = $this->pdo->prepare($query);
        $requete->execute(array(":table" => $this->datastructure["table"], ":id" => $id));
        $data = $requete->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function validComment($id, $valid) {

        $sql = sprintf("UPDATE %s SET valided= %s WHERE id= %s", $this->datastructure["table"], $valid , $id);
        $requete = $this->pdo->prepare($sql);
        $requete->execute(array(":table" => $this->datastructure["table"],":valided" => $valid, ":id" => $id));
    }

}
