<?php

require_once __DIR__ . '/../model/Producto.php';

class ProductoController
{
    private Producto $model;

    public function __construct()
    {
        $this->model = new Producto();
    }

    public function listar(): array { return $this->model->listar(); }
    public function obtener(int $id): ?array { return $this->model->encontrar($id); }
    public function guardar(array $data): bool { return $this->model->guardar($data); }
    public function eliminar(int $id): bool { return $this->model->eliminar($id); }
    public function categorias(): array { return $this->model->categorias(); }
    public function proveedores(): array { return $this->model->proveedores(); }
}
