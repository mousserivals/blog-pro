<?php

namespace Lib\Form;

use Lib\Form\validator;

/**
 * Description of Validator
 *
 * @author steph
 */
class ConfirmPasswordValidator extends AbstractValidator {

    public $field;
    public $form;

    public function __construct($message, $field, $form) {
        parent::__construct($message);
        $this->field = $field;
        $this->form = $form;
    }

    function validate($value) {
        return ($value != $this->form->form[$this->field]['value']) ? false : true;
        
    }

}
