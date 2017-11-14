<?php

include_once 'database_connection.php';

class model_login {

    private $errors = '';
    private $conn;
    public $user_valid = FALSE;

    public function __construct() {
        $this->conn = new database_connection();
    }

    public function get_errors() {
        return $this->errors;
    }

    public function check_login($customer_data) {
        
        $email = $customer_data['email'];
        $password = $customer_data['password'];

        if (isset($customer_data)) {
            if (empty($email) || empty($password)) {
                $this->errors = "Email or Password is invalid";
            } else {
// To protect MySQL injection for Security purpose
                $email = stripslashes($email);
                $password = stripslashes($password);
                $email = mysql_real_escape_string($email);
                $password = mysql_real_escape_string($password);
                $password = md5($password);

                try {
// SQL query to fetch information of registerd users and finds user match.
                    $sql = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
                    $result = $this->conn->get_connection()->prepare($sql);
                    $result->execute();
                    $rows = $result->rowCount();
                    $result = $result->fetch(PDO::FETCH_ASSOC);
                    if ($rows == 1) {
                        $_SESSION['customer_id'] = $result['customer_id']; // Initializing Session
                        $this->user_valid = TRUE;
                    } else {
                        $this->errors = "Username or Password is invalid";
                    }
                } catch (PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                }
            }
        }

        $this->conn->close_connection();
    }

}
