<?php

require_once __DIR__ . '/CrudModel.php';

class Categoria extends CrudModel
{
    protected string $table = 'categorias';
    protected string $primaryKey = 'id_categoria';
    protected array $fillable = ['nombre', 'descripcion', 'estado'];
}
