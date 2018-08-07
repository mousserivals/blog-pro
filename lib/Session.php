<?php

namespace Lib;

/**
 * Description of Session
 *
 * @author steph
 */
class Session {

    public function setFlash($message, $type = 'error') {
        $_SESSION['flash'] = array('message' =>$message, 'type' =>  $type) ;
    }

    public function getFlash() {
        if (isset($_SESSION['flash'])) {
            return $_SESSION['flash'];
            unset($_SESSION['flash']);
        }
    }

}
