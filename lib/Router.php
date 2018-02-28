<?php
namespace Lib;

use Lib\Route;


class Router {
    
    
    /**
     * @var string
     */
    private $url;
    
    public function __construct($url) {
        $this->url = $url;
    }
    
    public function getUrl() {

        $list =  explode("/", $this->url);
        $route = new Route();
        $f = $route->verifRoute($list);

        return $f ;
    }
    
    
    
    
    
}
