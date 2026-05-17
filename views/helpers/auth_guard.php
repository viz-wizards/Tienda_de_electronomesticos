<?php

require_once __DIR__ . '/../../config/constants.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['admin_user'])) {
    header('Location: ' . BASE_URL . 'index.php?page=login');
    exit;
}
