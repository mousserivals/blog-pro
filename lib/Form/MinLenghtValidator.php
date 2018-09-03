<?php

namespace Lib\Form;

use Lib\Form\validator;

/**
 * Description of Validator
 *
 * @author steph
 */
class MinLenghtValidator extends AbstractValidator {

    public function __construct($message, $field) {
        parent::__construct($message);
        $this->field = $field;
    }

    public function validate($value) {

        var_dump(strlen($value));
        var_dump($this->field);
        var_dump((strlen($value) < $this->field));
        return (strlen($value) < $this->field) ? false : true;
    }

}
