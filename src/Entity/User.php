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
            "manager" => "Src\Manager\UserManager",
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
                "email" => [
                    "type" => "string",
                    "property" => "email"
                ],
                "username" => [
                    "type" => "string",
                    "property" => "username"
                ],
                "firstname" => [
                    "type" => "string",
                    "property" => "firstname"
                ],
                "lastname" => [
                    "type" => "string",
                    "property" => "lastname"
                ],
                "password" => [
                    "type" => "string",
                    "property" => "password"
                ],
                "role" => [
                    "type" => "string",
                    "property" => "role"
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

    function getAvatar() {
        return $this->avatar;
    }

    function getEmail() {
        return $this->email;
    }

    function getUsername() {
        return $this->username;
    }

    function getFirstname() {
        return $this->firstname;
    }
    
    function getLastname() {
        return $this->lastname;
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

    function setEmail($email) {
        $this->email = $email;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }
    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRole($role) {
        $this->role = $role;
    }

    function setDateCreated($date) {
        $this->dateCreated = $date;
    }

}

