<?php

require_once __DIR__ . '/CrudModel.php';

class Proveedor extends CrudModel
{
    protected string $table = 'proveedores';
    protected string $primaryKey = 'id_proveedor';
    protected array $fillable = ['razon_social', 'ruc', 'telefono', 'correo', 'direccion', 'estado'];
}
