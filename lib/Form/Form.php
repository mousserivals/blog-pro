<?php

namespace Lib\Form;

/**
 * Description of Formulaire
 *
 * @author steph
 */
abstract class Form {

    protected $database;
    public $entity;
    public $form;

    public function __construct($database, $entity) {
        $this->database = $database;
        $this->entity = $entity;
    }

    public abstract function build();

    public function getView() {
        return $this->form;
    }

    public function handle($request) {
        if (!empty($request)) {
            $this->entity->hydrate($request);
            foreach ($this->form as &$field) {
                $field['value'] = $request[$field['name']] ?? '';
            }
        }
    }

    public function isValid() {
        $error = true;
        foreach ($this->form as $name => &$field) {
            foreach ($field['validate'] as $validator) {
                if (!$validator->validate($field['value'])) {
                    $field['errors'][] = $validator->message;
                    $error = false;
                }
                
            }
        }
        return $error;
    }
}
