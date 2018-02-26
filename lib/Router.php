<?php
namespace Lib;

use Lib\Route;


class Router {
    
    public function getUrl($url) {
        
        $list =  explode("/", $url);
        $route = new Route();
        $f = $route->verifRoute($list);

        return $f ;
    }
    
    
    
    
    
}
