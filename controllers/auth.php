<?php
session_start();
if (isset($_SESSION['login'])) {
    header('Location: admin_main.php');
    exit;
}
require_once "../db.php";
$login = $_POST['login'];
$password = SHA1($_POST['pass']);
$query = "SELECT * FROM admins WHERE login='$login' AND pass='$password'";
$result = $mysqli->query($query);
$result_assoc = $result->fetch_assoc();
if ($result_assoc != NULL) {
    $_SESSION['login'] = $result_assoc['login'];
    header('Location: admin_main.php');
    exit;
} else {
    header('Location: admin_auth.php?error=1');
    exit;
}
