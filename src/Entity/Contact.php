<?php

namespace Src\Entity;

use Lib\ORM\Entity;

class Contact extends Entity {

    public $id;
    public $postId;
    public $userId;
    public $content;
    public $date;

    public static function dataStructure() {
        return [
            "table" => "contact",
            "manager" => "Src\Manager\ContactManager",
            "primaryKey" => "id",
            "columns" => ["id" => [
                    "type" => "integer",
                    "property" => "id"
                ],
                "username" => [
                    "type" => "string",
                    "property" => "username"
                ],
                "firstname" => [
                    "type" => "string",
                    "property" => "firstname"
                ],
                "email" => [
                    "type" => "string",
                    "property" => "email"
                ],
                "message" => [
                    "type" => "text",
                    "property" => "message"
                ]
            ]
        ];
    }

    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getFirstname() {
        return $this->firstname;
    }
    
    function getLastname() {
        return $this->lastname;
    }

    function getMessage() {
        return $this->message;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }
    function setLastname($lastname) {
        $this->lastname = $lastname;
    }


    function setMessage($message) {
        $this->message= $message;
    }

}
