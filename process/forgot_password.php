<?php

require_once __DIR__ . '/../controller/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php?page=recuperar');
    exit;
}

$auth = new AuthController();
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirmacion = $_POST['password_confirm'] ?? '';

if ($auth->resetPassword($email, $password, $confirmacion)) {
    header('Location: ../index.php?page=login&reset=1');
    exit;
}

header('Location: ../index.php?page=recuperar&error=1');
exit;
