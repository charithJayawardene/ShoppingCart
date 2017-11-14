<?php

include_once 'model/model_login.php';

class controller_login {

    private $model_login;

    public function __construct() {
        $this->model_login = new model_login();
    }

    public function check_user($login_data) {

        $this->model_login->check_login($login_data);
        $errors = $this->model_login->get_errors();

        if (!$this->model_login->user_valid) {
            echo "<script type='text/javascript'> alert('$errors');</script>";
        } else {
            $_POST = array();
            echo '<script>window.location="http://localhost/ShoppingCart/index.php"</script>';
        }
    }

}

?>