<?php

namespace Lib\Form;

use Lib\Form\validator;

/**
 * Description of Validator
 *
 * @author steph
 */
class UniqueValueValidator extends AbstractValidator {

    public $database;
    public $form;

    public function __construct($message, $database, $form) {
        parent::__construct($message);
        $this->database = $database;
        $this->form = $form;
    }

    function validate($value) {
        
        $manager = $this->database->getManagerOf($this->database::class);
        $cat = $managerCategorie->findAll();
        
        
        return ($value != $this->form->form[$this->field]['value']) ? false : true;
        
    }

}
