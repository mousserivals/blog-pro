<?php

namespace Lib\Router;

use Config\Routig;

class Router {

    /**
     * @var array
     */
    private $routes;

    public function navigate($url) {

        $list = ["index" =>
            ["path" => "/",
                "parameter" => [],
                "controller" => "DefaultController",
                "action" => "indexAction"
            ],
            "cinema" =>
            ["path" => "/cinema/:id",
                "parameter" => ["id" => "[\d]+"],
                "controller" => "blogController",
                "action" => "cinemaAction"
            ],
            "cinemaView" =>
            ["path" => "/cinema/view/:slug/:date",
                "parameter" => ["slug" => "[\w-]+", "date" => "jour-^(0[1-9]|[1-2][0-9]|3[0-1])-([1-9]|1[0-2])-[0-9]{4}$/"],
                "controller" => "blogController",
                "action" => "viewAction"
            ]
        ];




        foreach ($list as $name => $value) {
            if (isset($this->routes[$name])) {
                throw new RouterException("erreur 123");
            }

            $this->routes[$name] = $value;
            //  var_dump($this->routes[$name]["path"]);
            $path = explode("/:", $this->routes[$name]["path"]);
            $val = 1;
            if ($this->routes[$name]["parameter"]) {

                foreach ($this->routes[$name]["parameter"] as $n => $value) {
                    if ($n === $path[$val]) {
                       
                        $this->routes[$name]["pathverif"] = preg_replace("#".$path[$val]."#", $value, $this->routes[$name]["path"]);
                        var_dump($path[$val]);
                        var_dump($value);
                        var_dump($this->routes[$name]["path"]);  
                    }
                }
            }


            // 
//        foreach ($this->routes as $name => $value) {
//                $this->routes[$name]["pathverif"] = 
//                
//            }
        }
        var_dump($this->routes);

        exit();
        if (isset($this->routes[$name]["path"]["parameter"][$match[1]])) {
            return sprintf("(%s)", $this->routes[$name]["path"]["parameter"][$match[1]]);
        }return '([^/]+)';

//            $path = explode(":", $value["path"]);
//            $urls = explode("/", $url);
//
//            var_dump($urls);
////        foreach ($path as $arg) {
////            $p = str_replace("/", "", $path);
////            var_dump($p);
////        }
//            var_dump($url . " " . $path[0] ." -> " );
//
//            if (stristr($path[0], $url)) {
//                $params = $value["parameter"];
//                var_dump($path);
//
//                var_dump($path);
//                var_dump("tt");
//                exit();
//             //   foreach ($path as $e => $p) {
//             //       foreach ($params as $n => $regex) {
//             //           if (true) {
//                            
//             //           }
////                var_dump("------------------------------------------------------------------------------");
////                var_dump($p);
//             //           var_dump($n . " " . $regex);
////                var_dump($params);
////                var_dump("------------------------------------------------------------------------------");
//             //       }
//             //   }
//            } else {
//            //    foreach ($params as $n => $regex) {
////                var_dump("------------------------------------------------------------------------------");
////                var_dump($p);
//             //       var_dump($n . " " . $regex);
////                var_dump($params);
////                var_dump("------------------------------------------------------------------------------");
//             //   }
//            }
        //      }
        //
        // var_dump($urls);
        // var_dump(in_array($url, $list));
        //    exit();

        return $f;
    }

}
