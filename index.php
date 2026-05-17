<?php
require_once __DIR__ . '/config/constants.php';
require_once __DIR__ . '/views/helpers/helpers.php';
require_once __DIR__ . '/model/Producto.php';

$productoModel = new Producto();
$page = $_GET['page'] ?? 'home';
$allowedPages = ['home', 'producto', 'categoria', 'contacto', 'nosotros', 'terminos', 'login', 'registro', 'recuperar'];

if (!in_array($page, $allowedPages, true)) {
    http_response_code(404);
    $page = 'home';
}

$categories = $productoModel->categorias();
$query = trim($_GET['q'] ?? '');
$products = $query !== '' ? $productoModel->buscar($query) : $productoModel->destacados();
$currentProduct = null;

if ($page === 'producto') {
    $currentProduct = $productoModel->encontrar((int) ($_GET['id'] ?? 0));
}

if ($page === 'categoria') {
    $categoryId = (int) ($_GET['id'] ?? 0);
    $products = $productoModel->porCategoria($categoryId);
}

include __DIR__ . '/views/public/layout.php';
