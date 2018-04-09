<?php

namespace Src\Entity;

use Lib\ORM\Entity;

class postsEntity extends Entity {

    public static function dataStructure() {
        return [
            "table" => "article",
            "primaryKey" => "id",
            "columns" => [
                "id" => [
                    "type" => "integer",
                    "property" => "id"
                ],
                "title" => [
                    "type" => "string",
                    "property" => "title"
                ],
                "content" => [
                    "type" => "string",
                    "property" => "content"
                ],
                "categoryId" => [
                    "type" => "integer",
                    "property" => "categoryId"
                ],
                "date" => [
                    "type" => "datetime",
                    "property" => "date"
                ]
            ]
        ];
    }

    public function getId($param) {
        
    }
    
    
    
}
