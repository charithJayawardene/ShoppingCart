<?php

include_once 'database_connection.php';

class model_product {

    private $conn;
    private $rows;

    public function __construct() {
        $this->conn = new database_connection;
    }

    public function get_product_count() {
//        return $this->rows;
        echo json_encode($this->rows);
    }

    public function get_product() {

        try {
            $sql = "SELECT * FROM product";
            $result = $this->conn->get_connection()->prepare($sql);
            $result->execute();
            $this->rows = $result->rowCount();
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            return $result;
//            echo json_encode($result);
//            $result = $result->fetchAll();
//            $this->names = $result;
//            return $result['name'];
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $this->conn->close_connection();
    }

}
