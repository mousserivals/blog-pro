<?php

namespace Lib;

abstract class Application {

    protected $request;
    protected $name;

    public function __construct() {
        $this->request = new Request();
        $this->name = '';
    }

    public function Request() {
        return $this->request;
    }

    public function name() {
        return $this->name;
    }

}
