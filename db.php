<?php
$db_host = 'localhost';
$db_user = 'admin';
$db_pass = 'baRil93;';
$db_name = 'news_feed';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
$mysqli->set_charset('utf8');

if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к базе данных: " . $mysqli->connect_error;
    die();
}
