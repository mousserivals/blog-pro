<?php

namespace Lib;

/**
 * Description of Request
 *
 * @author steph
 */
class Request {

    public function cookie($key) {

        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
    }

    public function cookieExists($key) {

        return isset($_COOKIE[$key]);
    }

    public function get($key) {

        return isset($_GET[$key]) ? $_GET[$key] : null;
    }

    public function getExists($key) {

        return isset($_GET[$key]);
    }

    public function method() {

        return $_SERVER['REQUEST_METHOD'];
    }

    public function post($key) {

        return isset($_POST[$key]) ? $_POST[$key] : null;
    }

    public function postExists($key) {

        return isset($_POST[$key]);
    }

    public function requestURI() {

        return $_SERVER['REQUEST_URI'];
    }

}
