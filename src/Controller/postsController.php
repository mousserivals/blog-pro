<?php
namespace Src\Controller;

use Lib\Controller;
use Src\Entity\postsEntity;

class postsController extends Controller {
    
    function show($id) {
        
        $post = $this->database()->getManagerOf("posts");
        
        var_dump($post);
        exit();
    }
    
    
    
}
