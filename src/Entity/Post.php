<?php

namespace Src\Entity;

use Lib\ORM\Entity;

class Post extends Entity {
    
    private $id;
    private $title;
    private $content;
    private $categoryId;
    private $date;

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
    
    function getId() {
        return $this->id;
    }


        function getTitle() {
        return $this->title;
    }

    function getContent() {
        return $this->content;
    }

    function getCategoryId() {
        return $this->categoryId;
    }

    function getDate() {
        return $this->date;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }

    function setDate($date) {
        $this->date = $date;
    }

    
    
    
}
