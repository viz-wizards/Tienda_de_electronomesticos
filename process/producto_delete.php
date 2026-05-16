<?php

require_once __DIR__ . '/../views/helpers/auth_guard.php';
require_once __DIR__ . '/../config/Database.php';

$db = (new Database())->connect();
$id = (int) ($_POST['id'] ?? $_GET['id'] ?? 0);

if ($db && $id > 0) {
    $stmt = $db->prepare("UPDATE productos SET estado = 'Inactivo' WHERE id_producto = :id");
    $stmt->execute(['id' => $id]);
}

header('Location: ../admin.php?page=productos&ok=deleted');
exit;
