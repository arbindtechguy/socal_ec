<?php

require_once  'lib/base.php';
class Homepage extends Base {
    var $loginRequired = false;
    
    function __construct() {
        parent::__construct($this->loginRequired);

    }

}