<?php

namespace Src\Entity;

use Lib\ORM\Entity;

class Category extends Entity {

    public $id;
    public $title;

    public static function dataStructure() {
        return [
            "table" => "categorie",
            "manager" => "Src\Manager\CategoryManager",
            "primaryKey" => "id",
            "columns" => [
                "id" => [
                    "type" => "integer",
                    "property" => "id"
                ],
                "title" => [
                    "type" => "string",
                    "property" => "title"
                ]
            ]
        ];
    }

    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }


    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

}

