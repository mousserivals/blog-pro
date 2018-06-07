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

    function getPostId() {
        return $this->post;
    }

    function getUserId() {
        return $this->userId;
    }

    function getContent() {
        return $this->content;
    }

    function getDate() {
        return $this->date;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPost($post) {
        $this->post = $post;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setDate($date) {
        $this->date = $date;
    }

}
