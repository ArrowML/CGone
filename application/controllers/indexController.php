<?php

class indexController extends baseController {

    public function index() {

        $model = new indexModel();
        $this->view->title = "CGone";
        $this->view->msg = $model->getProducts();
    }

    public function help() {
        $this->view->title = "Help Please!!!";
    }

}

?>
