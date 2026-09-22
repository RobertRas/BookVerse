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

        public function inserir($nome){
        //criar uma conexão com o banco de dados
        //criar o sql
        //preparar o sql
        //substituir os dados depois  de preparado
        //executar

        try{
            
            $conexao = Conexao::conectar();

            $sql = "INSERT INTO categoria (nome) VALUES (:nome)";
            $stmt = $conexao->prepare($sql);

            $stmt->bindValue(':nome',$nome);
            $stmt->execute();

            
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}

