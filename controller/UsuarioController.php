<?php

require_once __DIR__ . '/../model/Usuario.php';

class UsuarioController
{
    private Usuario $model;

    public function __construct()
    {
        $this->model = new Usuario();
    }

    public function listar(): array { return $this->model->listar(); }
    public function obtener(int $id): ?array { return $this->model->obtener($id); }
    public function guardar(array $data): bool { return $this->model->guardar($data); }
    public function eliminar(int $id): bool { return $this->model->eliminar($id); }

    public function registrarCliente(array $data): bool
    {
        return $this->model->registrarCliente($data);
    }

    public function recuperarPassword(string $email, string $password, string $confirmacion): bool
    {
        if ($password !== $confirmacion) {
            return false;
        }

        return $this->model->actualizarPassword($email, $password);
    }
}
