  <?php

require __DIR__."/../vendor/autoload.php";  
  

use Lib\Router\Router;


$router = new Router();

$router->get('/',function(){ echo 'Homepage'; } );
$router->get('/posts',function(){ echo 'Tous les articles'; } );
$router->get('/posts/:id-:slug',function($id,$slug){
                                                        echo "Afficher $slug : $id"; 
                                                    },'post.show')->with('id','[0-9]+')
                                                      ->with('slug','[a-z\-0-9]+');
$router->get('/posts/:id', 'Posts#show','post.show' );

$router->post('/posts/:id',function($id){ echo 'Poster l\'articles '.$id; } );
$router->run();