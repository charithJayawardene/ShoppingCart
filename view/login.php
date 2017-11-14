<?php

include_once 'controller/session_logged.php';
include_once 'controller/controller_login.php';
$controller_login = new controller_login();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller_login->check_user($_POST);
}
?>

<div>    
    <form action="index.php?route=login" method="post">

        <h1>Login</h1>

        <fieldset>

            <label for="email">Email : 
                <span class="error">* </span></label>
            <input type="email" id="email" name="email" value="<?php
if (!empty($_POST["email"]))
    echo $_POST["email"];
else
    echo '';
?>" required="">

            <label for="password">Password : 
                <span class="error">* </span></label>
            <input type="password" id="password" name="password" value="<?php
            if (!empty($_POST["password"]))
                echo $_POST["password"];
            else
                echo '';
?>" required="">

        </fieldset>

        <button type="submit" name="login">Login</button>
    </form>
</div>



