<?php


include('connection.php');
session_destroy();
unset($_SESSION['username']);
header("Location: login.php");
exit();

?>