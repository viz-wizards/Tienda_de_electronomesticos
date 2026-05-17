<?php
$crudTitle = 'Proveedores';
$primaryKey = 'id_proveedor';
$formFields = [
    ['name' => 'razon_social', 'label' => 'Razon social'],
    ['name' => 'ruc', 'label' => 'RUC'],
    ['name' => 'telefono', 'label' => 'Telefono'],
    ['name' => 'correo', 'label' => 'Correo', 'type' => 'email'],
    ['name' => 'direccion', 'label' => 'Direccion', 'type' => 'textarea'],
    ['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'options' => ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], 'default' => 'Activo'],
];
$columns = [
    ['key' => 'id_proveedor', 'label' => 'ID'],
    ['key' => 'razon_social', 'label' => 'Razon social'],
    ['key' => 'ruc', 'label' => 'RUC'],
    ['key' => 'telefono', 'label' => 'Telefono'],
    ['key' => 'correo', 'label' => 'Correo'],
    ['key' => 'estado', 'label' => 'Estado', 'format' => 'status'],
];
include __DIR__ . '/_crud.php';
