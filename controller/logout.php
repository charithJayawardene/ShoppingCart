<?php
session_start();
session_destroy();
header("Location: ../index.php");
//if(session_destroy()) // Destroying All Sessions
//{
//header("Location: index.php"); // Redirecting To Home Page
//}
?>
