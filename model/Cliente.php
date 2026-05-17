<?php

require_once __DIR__ . '/CrudModel.php';

class Cliente extends CrudModel
{
    protected string $table = 'clientes';
    protected string $primaryKey = 'id_cliente';
    protected array $fillable = ['id_usuario', 'nombres', 'apellidos', 'telefono', 'correo', 'direccion', 'estado'];
}
