<?php

class Conexao {
    public static function conectar() {
        $env = parse_ini_file(__DIR__ . "/../.env");

        $host = $env['DB_HOST'];
        $dbname = $env['DB_NAME'];
        $username = $env['DB_USER'];
        $password = $env['DB_PASS'];

        $conn = new PDO("mysql:host={$host};dbname={$dbname}; charset=utf8mb4", $username, $password);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    }

}

Conexao::conectar();