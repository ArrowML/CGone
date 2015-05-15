<?php

/**
  @version 1.0
  @author Marc Lauder
 * router.class.php file -> route application using url
 */
/** Configuration Variables * */
if (APP_ENVIRONMENT == DEVELOPMENT) {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 'Off');
    ini_set('log_errors', 'On');
    ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
}

date_default_timezone_set("Africa/Johannesburg");

define("APPLICATION_PATH", dirname(__FILE__) . "/application/");
define('APP_ENVIRONMENT', DEVELOPMENT);
define("LIBRARY_PATH", dirname(__FILE__) . "/library/");
define('BASEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/CGone');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'cgone');
define('DB_USER', '');
define('DB_PASSWORD', '');


