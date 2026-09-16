<?php
require_once __DIR__ . "/../configs/conexao.php";


class Livro {
    private $id_livro;
    private $titulo;
    private $ano_pub;
    private $autor;
    private $resumo;
    private $capa;
    private $categoria;


    public static function listar() {
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT * FROM livro";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Erro ao listar livros: ' . $e->getMessage();
            
        }
    }

    public static function buscarPorId($id){
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT livro.*, categoria.nome FROM livro JOIN categoria ON livro. id_categoria = categoria.id_categoria WHERE id_livro = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Erro ao buscar o livro: ' . $e->getMessage();
        }
    }
}