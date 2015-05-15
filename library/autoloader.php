<?php

/**
  CGone Framework
  @version 1.0
  @author Marc Lauder

 * autoloader.class.php file -> Auto Load any classes that we require
 */
function autoload_controllers($class_name) {
    $file = APPLICATION_PATH . 'controllers/' . $class_name . '.php';
    if (file_exists($file)) {
        require_once($file);
    }
}

function autoload_models($class_name) {
    $file = APPLICATION_PATH . 'models/' . $class_name . '.php';
    if (file_exists($file)) {
        require_once($file);
    }
}

function autoload_library($class_name) {
    $file = LIBRARY_PATH . $class_name . '.class.php';
    if (file_exists($file)) {
        require_once($file);
    }
}

spl_autoload_register('autoload_controllers');
spl_autoload_register('autoload_models');
spl_autoload_register('autoload_library');
?>
