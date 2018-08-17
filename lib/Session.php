<?php

namespace Lib;

/**
 * Description of Session
 *
 * @author steph
 */
class Session {

    public function setFlash($message, $type = 'error') {
        $_SESSION['flash'] = array('message' => $message, 'type' => $type);
    }

    public function getFlash() {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . '">' . $_SESSION['flash']['message'] . '</div>';
            unset($_SESSION['flash']);
        }
    }

}
