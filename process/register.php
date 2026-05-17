<?php

require_once __DIR__ . '/../controller/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php?page=registro');
    exit;
}

$auth = new AuthController();
$password = $_POST['password'] ?? '';
$confirmacion = $_POST['password_confirm'] ?? '';

if ($password !== $confirmacion) {
    header('Location: ../index.php?page=registro&error=password');
    exit;
}

if ($auth->register($_POST)) {
    header('Location: ../index.php?page=login&registered=1');
    exit;
}

header('Location: ../index.php?page=registro&error=1');
exit;
