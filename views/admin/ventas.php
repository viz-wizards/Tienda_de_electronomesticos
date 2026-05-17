<?php
$crudTitle = 'Ventas';
$primaryKey = 'id_venta';
$clienteOptions = [];
foreach (($clientes ?? []) as $cliente) {
    $clienteOptions[$cliente['id_cliente']] = $cliente['nombres'] . ' ' . $cliente['apellidos'];
}
$productoOptions = [];
foreach (($productos ?? []) as $producto) {
    $productoOptions[$producto['id_producto']] = $producto['nombre'];
}
$formFields = [
    ['name' => 'id_cliente', 'label' => 'Cliente', 'type' => 'select', 'options' => $clienteOptions],
    ['name' => 'id_producto', 'label' => 'Producto', 'type' => 'select', 'options' => $productoOptions],
    ['name' => 'cantidad', 'label' => 'Cantidad', 'type' => 'number', 'min' => '1', 'default' => '1'],
    ['name' => 'precio_unitario', 'label' => 'Precio unitario', 'type' => 'number', 'step' => '0.01', 'min' => '0'],
    ['name' => 'total', 'label' => 'Total', 'type' => 'number', 'step' => '0.01', 'min' => '0'],
    ['name' => 'fecha_venta', 'label' => 'Fecha', 'type' => 'date', 'default' => date('Y-m-d')],
    ['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'options' => ['Pendiente' => 'Pendiente', 'Pagado' => 'Pagado', 'Anulado' => 'Anulado', 'Entregado' => 'Entregado'], 'default' => 'Pendiente'],
];
$columns = [
    ['key' => 'id_venta', 'label' => 'ID'],
    ['key' => 'nombres', 'label' => 'Cliente'],
    ['key' => 'producto', 'label' => 'Producto'],
    ['key' => 'cantidad', 'label' => 'Cant.'],
    ['key' => 'total', 'label' => 'Total', 'format' => 'money'],
    ['key' => 'fecha_venta', 'label' => 'Fecha'],
    ['key' => 'estado', 'label' => 'Estado', 'format' => 'status'],
];
include __DIR__ . '/_crud.php';
