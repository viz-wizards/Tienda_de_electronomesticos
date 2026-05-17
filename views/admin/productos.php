<?php
$crudTitle = 'Productos';
$primaryKey = 'id_producto';
$categoriaOptions = ['' => 'Sin categoria'];
foreach (($categorias ?? []) as $categoria) {
    $categoriaOptions[$categoria['id_categoria']] = $categoria['nombre'];
}
$proveedorOptions = ['' => 'Sin proveedor'];
foreach (($proveedores ?? []) as $proveedor) {
    $proveedorOptions[$proveedor['id_proveedor']] = $proveedor['razon_social'];
}
$formFields = [
    ['name' => 'nombre', 'label' => 'Nombre'],
    ['name' => 'id_categoria', 'label' => 'Categoria', 'type' => 'select', 'options' => $categoriaOptions],
    ['name' => 'id_proveedor', 'label' => 'Proveedor', 'type' => 'select', 'options' => $proveedorOptions],
    ['name' => 'descripcion', 'label' => 'Descripcion', 'type' => 'textarea'],
    ['name' => 'precio', 'label' => 'Precio', 'type' => 'number', 'step' => '0.01', 'min' => '0'],
    ['name' => 'stock', 'label' => 'Stock', 'type' => 'number', 'min' => '0'],
    ['name' => 'imagen', 'label' => 'Imagen'],
    ['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'options' => ['Disponible' => 'Disponible', 'Agotado' => 'Agotado', 'Inactivo' => 'Inactivo'], 'default' => 'Disponible'],
];
$columns = [
    ['key' => 'id_producto', 'label' => 'ID'],
    ['key' => 'nombre', 'label' => 'Producto'],
    ['key' => 'categoria', 'label' => 'Categoria'],
    ['key' => 'precio', 'label' => 'Precio', 'format' => 'money'],
    ['key' => 'stock', 'label' => 'Stock'],
    ['key' => 'estado', 'label' => 'Estado', 'format' => 'status'],
];
include __DIR__ . '/_crud.php';
