<?php

namespace Lib\Form;

use Lib\Form\validator;

/**
 * Description of Validator
 *
 * @author steph
 */
class NotNullValidator extends AbstractValidator{
    
    public function validate($value) {
        return ($value == '')?  false: true;
    }
    
    
}
