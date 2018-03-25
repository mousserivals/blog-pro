<?php

namespace Lib;

abstract class Application {

    protected $Request;

    public function __construct() {
        $this->httpRequest = new Request;
    }

    public function Request() {
        return $this->Request;
    }

}
