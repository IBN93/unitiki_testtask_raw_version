<?php
$error_text = $_GET['error'] == 1 ? '<div class="text-danger text-center mb-2">Неверная комбинация email и пароля.</div>' : '';
require_once "../views/admin_auth.php";