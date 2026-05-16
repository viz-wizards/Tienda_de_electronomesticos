<?php

require_once __DIR__ . '/../controller/AuthController.php';

$auth = new AuthController();
$auth->logout();

header('Location: ../index.php?page=login&logout=1');
exit;
