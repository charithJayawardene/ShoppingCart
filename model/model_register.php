<?php

include_once 'database_connection.php';

class model_register {

    private $conn;
    private $success = FALSE;

    public function __construct() {
        $this->conn = new database_connection();
    }
    
    public function check_duplicate_email($email) {
        try {
            $sql = "SELECT customer_id FROM customer WHERE email='$email'";
            $result = $this->conn->get_connection()->prepare($sql);
            $result->execute();
            $rows = $result->rowCount();
            $result = $result->fetch(PDO::FETCH_ASSOC);
            if ($rows>0) {
                return "This email already used";
            }
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function insert_customer($customer_data) {

        $first_name = $customer_data["first_name"];
        $last_name = $customer_data["last_name"];
        $email = $customer_data["email"];
        $contact_number = $customer_data["contact_number"];
        $password = md5($customer_data["password"]);
        $gender = $customer_data["gender"];

        try {
// set the PDO error mode to exception
            //$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customer (first_name, last_name, email, contact_number, password, gender)
    VALUES ('$first_name', '$last_name', '$email', '$contact_number', '$password', '$gender')";
// use exec() because no results are returned
            $this->conn->get_connection()->exec($sql);
            echo "New record created successfully";

            $sql2 = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
            $result = $this->conn->get_connection()->prepare($sql2);
            $result->execute();
            $rows = $result->rowCount();
            $result = $result->fetch(PDO::FETCH_ASSOC);
            if ($rows == 1) {
                $_SESSION['customer_id'] = $result['customer_id']; // Initializing Session
                return $this->success = TRUE;
            }
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            echo $sql2 . "<br>" . $e->getMessage();
//            echo "<script type='text/javascript'> alert('$e'); </script>";
        }
        $this->conn->close_connection();
    }

}
