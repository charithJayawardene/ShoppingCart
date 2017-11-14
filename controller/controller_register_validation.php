<?php

//echo getcwd();

include_once "model/model_register.php";

class register_validation {

    public $errors = array();
    public $validate_data = array();
    private $model_register;

    public function __construct() {
        $this->model_register = new model_register();
    }

    public function get_errors() {
        return $this->errors;
    }

    public function get_validate_data() {
        return $this->validate_data;
    }

    function check_validation($post_data) {

        if (empty($post_data["first_name"])) {
            $this->errors["first_name"] = "First name is required";
        } else {
            $this->validate_data["first_name"] = $this->test_input($post_data["first_name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $this->validate_data["first_name"])) {
                $this->errors["first_name"] = "Only letters and white space allowed";
            }
        }

        if (empty($post_data["last_name"])) {
            $this->errors["last_name"] = "Last name is required";
        } else {
            $this->validate_data["last_name"] = $this->test_input($post_data["last_name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $this->validate_data["last_name"])) {
                $this->errors["last_name"] = "Only letters and white space allowed";
            }
        }

        if (empty($post_data["email"])) {
            $this->errors["email"] = "Email is required";
        } else {
            $this->validate_data["email"] = $this->test_input($post_data["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($this->validate_data["email"], FILTER_VALIDATE_EMAIL)) {
                $this->errors["email"] = "Invalid email format";
            } else {
                $this->errors["email"] = $this->model_register->check_duplicate_email($this->validate_data["email"]);
            }
        }

        if (empty($post_data["contact_number"])) {
            $this->errors["contact_number"] = "Contact Number is required";
        } else {
            $this->validate_data["contact_number"] = $this->test_input($post_data["contact_number"]);
            // check if contact number only contains numbers
            if (!preg_match("/^[0-9]*$/", $this->validate_data["contact_number"])) {
                $this->errors["contact_number"] = "Only numbers allowed";
            }
        }

        if (empty($post_data["password"])) {
            $this->errors["password"] = "Password is required";
        } else {
            $this->validate_data["password"] = $this->test_input($post_data["password"]);
            // check if contact number only contains numbers
            if (!preg_match("/^[A-Za-z]\w{7,}$/", $this->validate_data["password"])) {
                $this->errors["password"] = "Only characters, numeric digits, underscore allowed. Also first character must be a letter ";
            }
        }

        if (empty($post_data["confirm_password"])) {
            $this->errors["confirm_password"] = "Confirm password is required";
        } else {
            $this->validate_data["confirm_password"] = $this->test_input($post_data["confirm_password"]);
            // check if contact number only contains numbers
            if (!($this->validate_data["password"] === $this->validate_data["confirm_password"])) {
                $this->errors["confirm_password"] = "Password confirmation is invalid";
            }
        }

        if (empty($post_data["gender"])) {
            $this->errors["gender"] = "Gender is required";
        } else {
            $this->validate_data["gender"] = $this->test_input($post_data["gender"]);
        }

        if (empty($this->errors)) {
            $success = $this->model_register->insert_customer($this->validate_data);
//            unset($this->validate_data);
            if ($success) {
                $this->validate_data = array();
                echo '<script>window.location="http://localhost/ShoppingCart/index.php"</script>';
            }
        }
    }

    function test_input($data) {
        $a = trim($data);
        $b = stripslashes($a);
        $c = htmlspecialchars($b);
        return $c;
    }

}
