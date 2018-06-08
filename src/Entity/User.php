<?php

namespace Src\Entity;

use Lib\ORM\Entity;

class User  extends Entity {

    public $id;
    public $avatar;
    public $username;
    public $password;
    public $role;
    public $date;

    public static function dataStructure() {
        return [
            "table" => "user",
            "manager" => "Src\Manager\userManager",
            "primaryKey" => "id",
            "columns" => [
                "id" => [
                    "type" => "integer",
                    "property" => "id"
                ],
                "avatar" => [
                    "type" => "string",
                    "property" => "avatar"
                ],
                "username" => [
                    "type" => "string",
                    "property" => "username"
                ],
                "password" => [
                    "type" => "string",
                    "property" => "password"
                ],
                "role" => [
                    "type" => "role",
                    "property" => "string"
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

    function geAvatar() {
        return $this->avatar;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getRole() {
        return $this->Role;
    }

    function getDateCreated() {
        return $this->dateCreated;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRole($Role) {
        $this->role = $role;
    }

    function setDateCreated($date) {
        $this->dateCreated = $date;
    }

}

