<?php

require_once __DIR__ . '/../model/Venta.php';

class VentaController
{
    private Venta $model;

    public function __construct()
    {
        $this->model = new Venta();
    }

    public function listar(): array { return $this->model->listar(); }
    public function obtener(int $id): ?array { return $this->model->obtener($id); }
    public function guardar(array $data): bool { return $this->model->guardar($data); }
    public function eliminar(int $id): bool { return $this->model->eliminar($id); }
}
