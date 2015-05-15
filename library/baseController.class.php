<?php

class baseController {

    function __construct() {
        $this->view = new view();
    }

    public function setContent($controllerName, $action) {
        $error = new errorController();
        $name = APPLICATION_PATH . 'views/' . $controllerName . '/' . $action . '.phtml';
        if (file_exists($name)) {
            $this->view->setContent($name);
        } else {
            $error->errorMessage('Missing View File');
        }
    }

}

?>
