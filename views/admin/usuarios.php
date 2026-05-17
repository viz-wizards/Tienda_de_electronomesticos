<?php
$crudTitle = 'Usuarios';
$primaryKey = 'id_usuario';
$formFields = [
    ['name' => 'nombre', 'label' => 'Nombre'],
    ['name' => 'email', 'label' => 'Correo', 'type' => 'email'],
    ['name' => 'password', 'label' => empty($edit) ? 'Contrasena' : 'Nueva contrasena', 'type' => 'password'],
    ['name' => 'rol', 'label' => 'Rol', 'type' => 'select', 'options' => ['Administrador' => 'Administrador', 'Empleado' => 'Empleado', 'Cliente' => 'Cliente'], 'default' => 'Cliente'],
    ['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'options' => ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], 'default' => 'Activo'],
];
$columns = [
    ['key' => 'id_usuario', 'label' => 'ID'],
    ['key' => 'nombre', 'label' => 'Nombre'],
    ['key' => 'email', 'label' => 'Correo'],
    ['key' => 'rol', 'label' => 'Rol'],
    ['key' => 'estado', 'label' => 'Estado', 'format' => 'status'],
];
include __DIR__ . '/_crud.php';
