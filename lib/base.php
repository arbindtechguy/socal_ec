<?php
require_once('lib/dbHandler.php');


class Base extends DBHandler {
    function __construct() {
        parent::__construct();

    }

    public function render($fileName, $obj) {
        $viewPath = TEMPLATE_DIRS;

    }

    public function redirect($url) {
        header('Location: '. $url);
    }

}

new Base();