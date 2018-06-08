<?php

namespace Src\Entity;

use Lib\ORM\Entity;

class Post extends Entity {

    public $id;
    public $title;
    public $content;
    public $categoryId;
    public $date;

    public static function dataStructure() {
        return [
            "table" => "article",
            "manager" => "Src\Manager\PostManager",
            "primaryKey" => "id",
            "columns" => [
                "id" => [
                    "type" => "integer",
                    "property" => "id"
                ],
                "user_id" => [
                    "type" => "string",
                    "property" => "userId"
                ],
                "title" => [
                    "type" => "string",
                    "property" => "title"
                ],
                "content" => [
                    "type" => "string",
                    "property" => "content"
                ],
                "category_id" => [
                    "type" => "integer",
                    "property" => "categoryId"
                ],
                "date_created" => [
                    "type" => "datetime",
                    "property" => "dateCreated"
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

    function getUserId() {
        return $this->userId;
    }
    function getContent() {
        return $this->content;
    }

    function getCategoryId() {
        return $this->categoryId;
    }

    function getDateCreated() {
        return $this->dateCreated;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUserId($userId) {
        $this->userId = $userId;
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

    function setDateCreated($dateCreated) {
        $this->dateCreated = $dateCreated;
    }

}
