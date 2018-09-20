<?php

namespace Src\Entity;

use Lib\ORM\Entity;

class Comment extends Entity {

    public $id;
    public $postId;
    public $userId;
    public $content;
    public $date;

    public static function dataStructure() {
        return [
            "table" => "comment",
            "manager" => "Src\Manager\CommentManager",
            "primaryKey" => "id",
            "columns" => [
                "id" => [
                    "type" => "integer",
                    "property" => "id"
                ],
                "post_id" => [
                    "type" => "integer",
                    "property" => "postId"
                ],
                "user_id" => [
                    "type" => "integer",
                    "property" => "userId"
                ],
                "content" => [
                    "type" => "string",
                    "property" => "content"
                ],
                "valided" => [
                    "type" => "boolean",
                    "property" => "valided"
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

    function getPostId() {
        return $this->postId;
    }

    function getUserId() {
        return $this->userId;
    }

    function getContent() {
        return $this->content;
    }
    
    function getValided() {
        return $this->valided;
    }

    function getDateCreated() {
        return $this->dateCreated;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPostId($postId) {
        $this->postId = $postId;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setValided($valided) {
        $this->valided = $valided;
    }

    function setDateCreated($date) {
        $this->dateCreated = $date;
    }

}
