<?php

require_once __DIR__ . '/../controller/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php?page=login');
    exit;
}

$auth = new AuthController();
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($auth->login($email, $password)) {
    header('Location: ../admin.php');
    exit;
}

header('Location: ../index.php?page=login&error=1');
exit;
