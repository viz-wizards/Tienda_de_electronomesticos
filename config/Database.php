<?php

class Database
{
    private string $host = 'localhost';
    private string $database = 'Tienda_de_electrodomesticos';
    private string $user = 'root';
    private string $password = '';
    private string $charset = 'utf8mb4';

    public function connect(): ?PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->database};charset={$this->charset}";

        try {
            return new PDO($dsn, $this->user, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $exception) {
            return null;
        }
    }
}
