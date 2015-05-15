<?php

/**
  CGone Framework
  @version 1.0
  @author Marc Lauder
 * router.class.php file -> get and split url into controller & action and call 
 */
$url = isset($_GET['url']) ? $_GET['url'] : null;

$urlArray = array();
$urlArray = explode("/", $url);

$error = new errorController();

$controller = $urlArray[0];
array_shift($urlArray);  //pull off controller Name

if (empty($controller)) {
    $controller = 'index';  //default to index controller
}

$controllerName = $controller;
$controller .= 'Controller'; //Concatenant with Controller Name

$file = APPLICATION_PATH . 'controllers/' . $controller . '.php';
if (!file_exists($file)) {
    $error->errorMessage('Missing Controller');
    return false;
}

$dispatch = new $controller(); // Call Requested Controller

if (isset($urlArray[0])) {
    $action = $urlArray[0];
    array_shift($urlArray); // If it is set, pull off action

    if (!method_exists($dispatch, $action)) {
        $error->errorMessage('Missing Action');
        return false;
    }
} else {
    $action = 'index';  //default to index Action
}

$dispatch->{$action}(); // Call Requested Action
$dispatch->setContent($controllerName, $action);

$queryString = $urlArray;
?>

