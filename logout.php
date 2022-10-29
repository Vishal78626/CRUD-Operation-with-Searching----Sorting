<?php
session_start();
unset($_SESSION['is_login']);
$_SESSION['logoutMsg'] = "Your account logged out Securly";

header('Location: login.php');

?>