<?php
//    echo getcwd();
include_once 'controller/session_logged.php';
include_once 'controller/controller_register_validation.php';
$register_validation = new register_validation();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $register_validation->check_validation($_POST);
    $errors = $register_validation->get_errors();
    $validate_data = $register_validation->get_validate_data();
}
?>

<div>
    <form action="index.php?route=register" method="post">

        <h1>Sign Up</h1>

        <fieldset>

            <label for="first_name">First Name : 
                <span class="error">* <?php
                    if (!empty($errors["first_name"]))
                        echo $errors["first_name"];
                    else
                        echo '';
                    ?></span></label>
            <input type="text" id="first_name" name="first_name" value="<?php
            if (!empty($validate_data["first_name"]))
                echo $validate_data["first_name"];
            else
                echo '';
            ?>">

            <label for="last_name">Last Name : 
                <span class="error">* <?php
                    if (!empty($errors["last_name"]))
                        echo $errors["last_name"];
                    else
                        echo '';
                    ?></span></label>
            <input type="text" id="last_name" name="last_name" value="<?php
            if (!empty($validate_data["last_name"]))
                echo $validate_data["last_name"];
            else
                echo '';
            ?>">

            <label for="email">Email : 
                <span class="error">* <?php
                    if (!empty($errors["email"]))
                        echo $errors["email"];
                    else
                        echo '';
                    ?></span></label>
            <input type="email" id="email" name="email" value="<?php
            if (!empty($validate_data["email"]))
                echo $validate_data["email"];
            else
                echo '';
            ?>">

            <label for="contact_number">Contact Number : 
                <span class="error">* <?php
                    if (!empty($errors["contact_number"]))
                        echo $errors["contact_number"];
                    else
                        echo '';
                    ?></span></label>
            <input type="text" id="contact_number" name="contact_number" value="<?php
            if (!empty($validate_data["contact_number"]))
                echo $validate_data["contact_number"];
            else
                echo '';
            ?>">

            <label for="password">Password : 
                <span class="error">* <?php
                    if (!empty($errors["password"]))
                        echo $errors["password"];
                    else
                        echo '';
                    ?></span></label>
            <input type="password" id="password" name="password" value="<?php
            if (!empty($validate_data["password"]))
                echo $validate_data["password"];
            else
                echo '';
            ?>">

            <label for="confirm_password">Confirm Password : 
                <span class="error">* <?php
                    if (!empty($errors["confirm_password"]))
                        echo $errors["confirm_password"];
                    else
                        echo '';
                    ?></span></label>
            <input type="password" id="confirm_password" name="confirm_password" value="<?php
            if (!empty($validate_data["confirm_password"]))
                echo $validate_data["confirm_password"];
            else
                echo '';
            ?>">

            <label>Gender : 
                <span class="error">* <?php
                    if (!empty($errors["gender"]))
                        echo $errors["gender"];
                    else
                        echo '';
                    ?></span></label>
            <input type="radio" id="male" value="male" name="gender" <?php if (isset($validate_data["gender"]) && $validate_data["gender"] == "male") echo "checked"; ?> >
            <label for="male" class="light">Male</label><br>
            <input type="radio" id="female" value="female" name="gender" <?php if (isset($validate_data["gender"]) && $validate_data["gender"] == "female") echo "checked"; ?> >
            <label for="female" class="light">Female</label>

        </fieldset>

        <button type="submit" name="register">Sign Up</button>
    </form>
</div>


