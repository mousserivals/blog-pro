<?php
namespace Src\Controller;

use Lib\Controller;
use Src\Entity\postsEntity;

class postsController extends Controller {
    
    function show($id) {
//        ->query('SELECT * FROM article');
        var_dump($id);
        $post = $this->database()->getManagerOf('Post')->getUnique(1);

        var_dump($post);
        exit();
    }
    
    
    
}
