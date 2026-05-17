<?php
$crudTitle = 'Clientes';
$primaryKey = 'id_cliente';
$formFields = [
    ['name' => 'nombres', 'label' => 'Nombres'],
    ['name' => 'apellidos', 'label' => 'Apellidos'],
    ['name' => 'telefono', 'label' => 'Telefono'],
    ['name' => 'correo', 'label' => 'Correo', 'type' => 'email'],
    ['name' => 'direccion', 'label' => 'Direccion', 'type' => 'textarea'],
    ['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'options' => ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], 'default' => 'Activo'],
];
$columns = [
    ['key' => 'id_cliente', 'label' => 'ID'],
    ['key' => 'nombres', 'label' => 'Nombres'],
    ['key' => 'apellidos', 'label' => 'Apellidos'],
    ['key' => 'telefono', 'label' => 'Telefono'],
    ['key' => 'correo', 'label' => 'Correo'],
    ['key' => 'estado', 'label' => 'Estado', 'format' => 'status'],
];
include __DIR__ . '/_crud.php';
