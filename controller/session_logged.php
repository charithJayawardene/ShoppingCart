<?php
//session_start();
if (!empty($_SESSION['customer_id'])) {
    echo '<script>window.location="http://localhost/ShoppingCart/index.php"</script>';
}

