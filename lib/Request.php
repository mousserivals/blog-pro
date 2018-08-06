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

    public function get() {
        return isset($_GET);
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

}
