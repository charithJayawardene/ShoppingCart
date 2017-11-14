<?php

class database_connection {

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "shopping_cart";
    public $connection;

    function get_connection() {
        try {
            $connection = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
// set the PDO error mode to exception
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $connection;
    }

    function close_connection() {
        $this->connection = NULL;
    }

}
