<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['admin_user'])) {
    header('Location: index.php?page=login');
    exit;
}
