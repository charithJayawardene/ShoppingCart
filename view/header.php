<div id="templatemo_header">
    <div id="site_title"><h1><a href="index.php">Online Shoes Store</a></h1></div>
    <div id="header_right">
        <p>
            <a href="#">My Cart</a> |
            <a id="my_account" href="#" >My Account</a>
            <!--            <a href="#">Checkout</a> | -->
            <a id="login" href="index.php?route=login" >Log In</a> |
            <a id="register" href="index.php?route=register" >Register</a>
            <a id="logout" href="controller/logout.php" >Log Out</a></p>
        <p>
            Shopping Cart: <strong>3 items</strong> ( <a href="shoppingcart.html">Show Cart</a> )
        </p>
    </div>
    <div class="cleaner"></div>
</div> <!-- END of templatemo_header -->

<?php
if (!empty($_SESSION["customer_id"])) {
    echo "<script>document.getElementById('login').style.display = 'none';</script>";
    echo "<script>document.getElementById('register').style.display = 'none';</script>";
} else {
    echo "<script>document.getElementById('logout').style.display = 'none';</script>";
    echo "<script>document.getElementById('my_account').style.display = 'none';</script>";
}
?>
