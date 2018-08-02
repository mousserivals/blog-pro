<?php

namespace Lib\Form;

/**
 *
 * @author steph
 */
abstract class AbstractValidator {

    public $message;

    public function __construct($message) {
        $this->message = $message;
    }

    public abstract function validate($value);
}
