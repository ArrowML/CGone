<?php

/**
 *
 * @author Marc Lauder
 */
class baseModel {

    function __construct() {
        try {
            $this->db = new Database;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function select($row = "*") {
        $this->query = "SELECT " . $row . " FROM " . $this->_name;
    }

    function where($condition, $value) {
        $this->query .= " WHERE " . $condition . " = '" . $value . "'";
    }

    function addAnd($condition, $value) {
        $this->query .= " AND " . $condition . " = '" . $value . "'";
    }

    function order($field, $direc = 'ASC') {
        $this->query .= " ORDER BY " . $field . " " . $direc;
    }

    function limit($value) {
        $this->query .= " LIMIT " . $value;
    }

    function insert($values = array()) {

        foreach ($values as $field => $value) {
            $keys[] = ':' . $field;
        }
        $inserts = implode(',', $keys);
        $fields = implode(',', array_keys($values));
        $this->query = "INSERT INTO $this->_name ($fields) VALUES ($inserts)";
        $sth = $this->db->prepare($this->query);

        foreach ($values as $field => $value) {
            $sth->bindValue(':' . $field, $value);
        }
        $sth->execute();
        return $this->db->lastInsertId();
    }

    function update($id, $values = array()) {

        foreach ($values as $field => $value) {
            $keys[] = $field . " = '" . $value . "'";
        }
        $inserts = implode(',', $keys);
        $this->query = "UPDATE $this->_name SET $inserts WHERE $this->_primary  = '" . $id . "'";
        $sth = $this->db->prepare($this->query);
        $sth->execute();
    }

    function delete($id) {
        $this->query = "DELETE FROM " . $this->_name . " WHERE " . $this->_primary . " = '" . $id . "'";
    }

    function processQuery() {
        $sth = $this->db->prepare($this->query);
        $sth->execute();
        return $sth;
    }

    function __destruct() {
        $this->db = null;
    }

}

?>
