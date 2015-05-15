<?php

class indexModel extends baseModel {

    protected $_name = 'products';
    protected $_primary = 'product_id';

    public function getProducts() {
        $select = $this->select();
        $select = $this->processQuery();
        print_r($select);
        return $select->fetchAll();
    }

}
