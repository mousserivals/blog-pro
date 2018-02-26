  <?php

require __DIR__."/../vendor/autoload.php";  
  
use Lib\Router;

$url = [];
$url1 = "blog" ;  
$url2 = "blog/add" ;  
$url3 = "blog/update/5" ;  

$urlFausse1 = "categories";
$urlFausse2 = "promo/view";
$urlFausse3 = "blog/view/7";

$router = new Router();
$url = $router->getUrl($url2);

echo $url;