<?php

namespace Lib;

/**
 * Description of Route
 *
 * @author steph
 */
class Route {

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $controller;

    /**
     * @var string
     */
    private $action;

    public function __construct($path) {
        $this->path = $path;
    }

    public function verifRoute($list) {

        $path = null;
        $controller = null;
        $action = null;
        $variable = null;

        $path = $this->verifPath($list[0]);
        $controller = $this->verifController($list[0]);
        $action = (isset($list[1])) ? $this->verifAction($list[1]) : "nc";
        $variable = (isset($list[2])) ? $this->verifVariable($list[2]) : "nc";

        $array = [$controller, $action, $variable];
        $result = (in_array(false, $array)) ? "page 404 - page no found" : "page trouvée";

        return $result;
    }

    public function verifPath($param) {
        $map = [];
        switch ($controller) {
            case "sorti-entre-amis":
                $map = ["controller" => "blog", "action" => "home"];

                return $map;
                break;
            
            case "draculas/au-cinema":

                $map = ["controller" => "blog", "action" => "home"];


                return "blog";
                break;
            case preg_match("/jour-^(0[1-9]|[1-2][0-9]|3[0-1])-([1-9]|1[0-2])-[0-9]{4}$/", "sorties-cinema-de-la-semaine/jour-07-3-2018"):
                
                $arg = explode("/", $this->url);
                $map = ["controller" => "blog", "action" => "view","arg" => "" ];


                return "blog";
                break;
            case "blog/add":

                $map = ["controller" => "blog", "action" => "home"];
                return "blog";
                break;
            
            case "blog/update/5":

                return true;
                break;
            case "blog/1-20":

                return true;
                break;


            default:

                return false;
                break;
        }
    }

    public function verifController($controller) {

        if (preg_match("#[a-z]+#", $controller)) {
            switch ($controller) {
                case "sorti-entre-amis":
                    return "blog";
                    break;
                case "draculas":

                    return "blog";
                    break;
                case "blog":

                    return "blog";
                    break;
                case "post":

                    return true;
                    break;

                default:

                    return false;
                    break;
            }
        }

        return false;
    }

    public function verifAction($action) {

        if (preg_match("#[a-z]+#", $action)) {
            switch ($action) {
                case "add":
                    return true;

                    break;
                case "add":
                    return true;

                    break;
                case "update":
                    return true;

                    break;

                default:
                    return false;
                    break;
            }
        }

        return false;
    }

    public function verifVariable($variable) {

        if (preg_match("#[0-9]+#", $variable)) {
            switch ($variable) {
                case 1:
                    return true;

                    break;
                case 5:
                    return true;

                    break;

                default:
                    return false;
                    break;
            }
        }

        return false;
    }

}
