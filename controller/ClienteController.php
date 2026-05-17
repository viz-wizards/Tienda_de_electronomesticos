<?php

require_once __DIR__ . '/../model/Cliente.php';

class ClienteController
{
    private Cliente $model;

    public function __construct()
    {
        $this->model = new Cliente();
    }

    public function listar(): array { return $this->model->listar('creado_en DESC'); }
    public function obtener(int $id): ?array { return $this->model->obtener($id); }
    public function guardar(array $data): bool { return $this->model->guardar($data); }
    public function eliminar(int $id): bool { return $this->model->eliminar($id); }
}
