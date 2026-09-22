<?php
require_once __DIR__ . "/../configs/conexao.php";

class Categoria
{
    private $id_categoria;
    private $nome_categoria;

    public static function listarCategorias()
    {
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT * FROM categoria";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Erro ao listar livros: ' . $e->getMessage();
        }
    }
}
