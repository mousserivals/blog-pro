<?php

namespace Lib;


class Session {
    

    /**
     * @var object
     */
    private static $_instance;
    
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new Session();
        }
        return self::$_instance;
    }
    
    

    public function setFlash($message, $type = 'error') {
        $_SESSION['flash'] = array('message' => $message, 'type' => $type);
    }

    public function getFlash() {
        if (isset($_SESSION['flash'])) {
            $session = $_SESSION['flash'];
            
            unset($_SESSION['flash']);
            echo '<div class="alert alert-' . $session['type'] . '">' . $session['message'] . '</div>';
        }
    }
    
    public function write($key,$value) {
        $_SESSION[$key] = $value;
    }
    
    
    public function read($key = null) {
        if ($key) {
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            } else {
                return false;
            }
        }else{
            return $_SESSION;
        }
        
    }
    
    public function isLogged() {
        return isset($_SESSION['User']['role']);
    }

    public function user($key) {
        if ($this->read('User')) {
            if (isset($this->read('User')->$key)) {
               return $this->read('User')->$key;
            } else {
                return false;
            }
            return false;
        }
    }   
    
}
