<?php

require_once __DIR__ . '/../views/helpers/auth_guard.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../admin.php');
    exit;
}

$entity = $_POST['entity'] ?? 'productos';
$controllers = [
    'productos' => ['file' => 'ProductoController.php', 'class' => 'ProductoController'],
    'categorias' => ['file' => 'CategoriaController.php', 'class' => 'CategoriaController'],
    'clientes' => ['file' => 'ClienteController.php', 'class' => 'ClienteController'],
    'proveedores' => ['file' => 'ProveedorController.php', 'class' => 'ProveedorController'],
    'ventas' => ['file' => 'VentaController.php', 'class' => 'VentaController'],
    'pagos' => ['file' => 'PagoController.php', 'class' => 'PagoController'],
    'usuarios' => ['file' => 'UsuarioController.php', 'class' => 'UsuarioController'],
];

if (!isset($controllers[$entity])) {
    header('Location: ../admin.php?msg=error');
    exit;
}

require_once __DIR__ . '/../controller/' . $controllers[$entity]['file'];

$class = $controllers[$entity]['class'];
$controller = new $class();
$success = $controller->guardar($_POST);

header('Location: ../admin.php?section=' . urlencode($entity) . '&msg=' . ($success ? 'saved' : 'error'));
exit;
