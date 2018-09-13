<?php

namespace Src\Manager;

use Src\Entity\User;
use Lib\ORM\Manager;

class UserManager extends Manager {

    public function findByEmail($email,$password) {
        $pass = MD5($password);
        
        $query = sprintf("SELECT * FROM %s WHERE email= '%s' and password= '%s'", $this->datastructure["table"], $email, $pass);

        $requete = $this->pdo->prepare($query);
        $requete->execute(array(":table" => $this->datastructure["table"], ":email" => $email, ":password" => $pass));
        $result = $requete->fetch(\PDO::FETCH_ASSOC);
        return $this->getHydrate($result);
    }
    
    
    
}
