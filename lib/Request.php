<?php

namespace Lib;

class Request {

    public function cookie($key) {

        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
    }

    public function cookieExists($key) {

        return isset($_COOKIE[$key]);
    }

    public function get() {
        return isset($_GET);
    }

    public function files() {
        return $_FILES;
    }

    public function getExists($key) {
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }

    public function method() {

        return $_SERVER['REQUEST_METHOD'];
    }

    public function post() {
        return $_POST;
    }

    public function postExists($key) {

        return isset($_POST[$key]) ? $_POST[$key] : null;
    }

    public function requestURI() {

        return $_SERVER['REQUEST_URI'];
    }
    public function requestHOST() {

        return $_SERVER['HTTP_HOST'];
    }
    public function getSession($name) {
        return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
    }
    public function setSession($name, $key) {
        return $_SESSION[$name] = [$key];
    }

}
