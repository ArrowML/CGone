<?php

/**
  @version 0.1
  @author Marc Lauder
 * bootstrap.php file -> includes base application files
 */
class Bootstrap {

    function __construct() {

        require_once (LIBRARY_PATH . 'config.php');
        require_once (LIBRARY_PATH . 'autoloader.php');
        require_once (LIBRARY_PATH . 'router.php');
        require '../vendor/autoload.php';
    }

}

?>
