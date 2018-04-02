<?php
namespace Lib\ORM;


class PDOFactory {

    public static function getMysqlConnexion() {
        $db = new \PDO('mysql:host=localhost;dbname=blog-pro', 'steph', 'Steph@555@ane');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }

}
