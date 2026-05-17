<?php
$crudTitle = 'Categorias';
$primaryKey = 'id_categoria';
$formFields = [
    ['name' => 'nombre', 'label' => 'Nombre'],
    ['name' => 'descripcion', 'label' => 'Descripcion', 'type' => 'textarea'],
    ['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'options' => ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], 'default' => 'Activo'],
];
$columns = [
    ['key' => 'id_categoria', 'label' => 'ID'],
    ['key' => 'nombre', 'label' => 'Nombre'],
    ['key' => 'descripcion', 'label' => 'Descripcion'],
    ['key' => 'estado', 'label' => 'Estado', 'format' => 'status'],
];
include __DIR__ . '/_crud.php';
