<?php
require_once __DIR__ . '/config/constants.php';
require_once __DIR__ . '/views/helpers/helpers.php';
require_once __DIR__ . '/views/helpers/auth_guard.php';
require_once __DIR__ . '/config/Database.php';

$section = $_GET['section'] ?? 'dashboard';
$allowedSections = ['dashboard', 'productos', 'categorias', 'clientes', 'proveedores', 'ventas', 'pagos', 'usuarios'];

if (!in_array($section, $allowedSections, true)) {
    $section = 'dashboard';
}

$db = (new Database())->connect();
$stats = [
    'productos' => 8,
    'clientes' => 3,
    'ventas' => 6,
    'ingresos' => 8492,
];
$recentSales = [];

if ($db) {
    $stats['productos'] = (int) $db->query("SELECT COUNT(*) FROM productos")->fetchColumn();
    $stats['clientes'] = (int) $db->query("SELECT COUNT(*) FROM clientes")->fetchColumn();
    $stats['ventas'] = (int) $db->query("SELECT COUNT(*) FROM ventas")->fetchColumn();
    $stats['ingresos'] = (float) $db->query("SELECT COALESCE(SUM(total), 0) FROM ventas WHERE estado <> 'Anulado'")->fetchColumn();

    $recentSales = $db->query("SELECT v.id_venta, v.fecha_venta, v.total, v.estado, c.nombres, c.apellidos, p.nombre AS producto
        FROM ventas v
        INNER JOIN clientes c ON c.id_cliente = v.id_cliente
        INNER JOIN productos p ON p.id_producto = v.id_producto
        ORDER BY v.creado_en DESC
        LIMIT 6")->fetchAll();
}

if ($section !== 'dashboard') {
    $controllerFile = [
        'productos' => 'ProductoController.php',
        'categorias' => 'CategoriaController.php',
        'clientes' => 'ClienteController.php',
        'proveedores' => 'ProveedorController.php',
        'ventas' => 'VentaController.php',
        'pagos' => 'PagoController.php',
        'usuarios' => 'UsuarioController.php',
    ][$section];

    require_once __DIR__ . '/controller/' . $controllerFile;

    $controllerClass = [
        'productos' => 'ProductoController',
        'categorias' => 'CategoriaController',
        'clientes' => 'ClienteController',
        'proveedores' => 'ProveedorController',
        'ventas' => 'VentaController',
        'pagos' => 'PagoController',
        'usuarios' => 'UsuarioController',
    ][$section];

    $controller = new $controllerClass();
    $rows = $controller->listar();
    $edit = $controller->obtener((int) ($_GET['edit'] ?? 0)) ?? [];

    if ($section === 'productos') {
        $categorias = $controller->categorias();
        $proveedores = $controller->proveedores();
    }

    if (in_array($section, ['ventas', 'pagos'], true) && $db) {
        $clientes = $db->query("SELECT * FROM clientes WHERE estado = 'Activo' ORDER BY nombres")->fetchAll();
        $productos = $db->query("SELECT * FROM productos WHERE estado <> 'Inactivo' ORDER BY nombre")->fetchAll();
        $ventas = $db->query("SELECT v.*, c.nombres, c.apellidos FROM ventas v INNER JOIN clientes c ON c.id_cliente = v.id_cliente ORDER BY v.creado_en DESC")->fetchAll();
    }
}

include __DIR__ . '/views/admin/header.php';
include __DIR__ . '/views/admin/sidebar.php';
include __DIR__ . '/views/admin/' . $section . '.php';
include __DIR__ . '/views/admin/footer.php';
