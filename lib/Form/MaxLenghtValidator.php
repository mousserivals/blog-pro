<?php

namespace Lib\Form;

use Lib\Form\validator;

/**
 * Description of Validator
 *
 * @author steph
 */
class MaxLenghtValidator extends AbstractValidator{
    
    public function __construct($message, $field) {
        parent::__construct($message);
        $this->field = $field;
    }

    public function validate($value) {

        return (strlen($value) > $this->field)?  false: true;
    }
    
    
}
