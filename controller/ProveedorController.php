<?php

require_once __DIR__ . '/../model/Proveedor.php';

class ProveedorController
{
    private Proveedor $model;

    public function __construct()
    {
        $this->model = new Proveedor();
    }

    public function listar(): array { return $this->model->listar('razon_social'); }
    public function obtener(int $id): ?array { return $this->model->obtener($id); }
    public function guardar(array $data): bool { return $this->model->guardar($data); }
    public function eliminar(int $id): bool { return $this->model->eliminar($id); }
}
