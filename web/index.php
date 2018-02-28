  <?php

require __DIR__."/../vendor/autoload.php";  
  
use Lib\Router;

$url = [];
$url1 = "sorti-entre-amis" ;  
$url2 = "draculas/au-cinema" ;  
$url3 = "sorties-cinema-de-la-semaine/jour-07-3-2018" ;  
$url4 = "blog/add" ;  
$url5 = "blog/update/5" ;  
$url6 = "blog/1-20" ;  

$urlFausse1 = "categories";
$urlFausse2 = "promo/view";
$urlFausse3 = "blog/view/7";

$router = new Router($url3);
$url = $router->getUrl();

echo $url;