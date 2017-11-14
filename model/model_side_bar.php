<?php

include_once 'database_connection.php';

class model_side_bar {

    private $conn;
//    public $names;

    public function __construct() {
        $this->conn = new database_connection;
    }

    public function get_category_name() {

        try {
            $sql = "SELECT name FROM category";
            $result = $this->conn->get_connection()->prepare($sql);
            $result->execute();
            $rows = $result->rowCount();
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            return $result;
//            $result = $result->fetchAll();
//            $this->names = $result;
//            return $result['name'];
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $this->conn->close_connection();
    }

}
