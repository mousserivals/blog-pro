<?php

namespace Lib;

/**
 * Description of Route
 *
 * @author steph
 */
class Route {

    public function verifRoute($list) {

        $controller = null;
        $action = null;
        $variable = null;

        $controller = $this->verifController($list[0]);
        $action = (isset($list[1])) ? $this->verifAction($list[1]) : "nc";
        $variable = (isset($list[2])) ? $this->verifVariable($list[2]) : "nc";

        $array = [$controller, $action, $variable];
        $result = (in_array(false, $array)) ? "page 404 - page no found" : "page trouvée";

        return $result;
    }

    public function verifController($controller) {

        if (preg_match("#[a-z]+#" ,$controller)) {
            switch ($controller) {
                case "blog":

                    return true;
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

        if (preg_match("#[a-z]+#" ,$action)) {
            switch ($action) {
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

        if (preg_match("#[0-9]+#" ,$variable)) {
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
