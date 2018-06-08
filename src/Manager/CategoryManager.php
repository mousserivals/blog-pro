<?php

namespace Src\Manager;

use Src\Entity\Category;
use Lib\ORM\Manager;

class CategoryManager extends Manager {
    
    public function categoryByPost($id) {

        $query = sprintf("SELECT * FROM %s WHERE id= %s", $this->datastructure["table"], $id);
        $requete = $this->pdo->prepare($query);
        $requete->execute(array(":table" => $this->datastructure["table"], ":id" => $id));
        $result = $requete->fetch(\PDO::FETCH_ASSOC);

        return $this->getHydrate($result);
    }


}
