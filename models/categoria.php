<?php
require_once __DIR__ . "/../configs/conexao.php";

class Categoria
{
    private $id_categoria;
    private $nome_categoria;

    public function getId()
    {
        return $this->id_categoria;
    }

    public function getNome()
    {
        return $this->nome_categoria;
    }


    public function carregar($id)
    {
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT * FROM categoria WHERE id_categoria = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                $this->id_categoria = $resultado['id_categoria'];
                $this->nome_categoria = $resultado['nome'];
            } else {
                throw new Exception("Categoria não encontrada.");
            }
        } catch (PDOException $e) {
            echo 'Erro ao carregar categoria: ' . $e->getMessage();
        }
    }
    public function deletar($id)
    {
        try {
            $conexao = Conexao::conectar();
            $sql = "DELETE FROM categoria WHERE id_categoria = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao deletar categoria: ' . $e->getMessage();
        }
    }
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

    public function inserir($nome)
    {
        //criar uma conexão com o banco de dados
        //criar o sql
        //preparar o sql
        //substituir os dados depois  de preparado
        //executar

        try {

            $conexao = Conexao::conectar();

            $sql = "INSERT INTO categoria (nome) VALUES (:nome)";
            $stmt = $conexao->prepare($sql);

            $stmt->bindValue(':nome', $nome);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function atualizar($nome, $id)
    {
        // usamos try/catch quando existe possibilidade de erro, principalmente ao usar banco de dados
        // o try é onde tentamos executar o código
        try {
            // chama o método conectar() da classe Conexao
            // cria uma conexão configurada e guarda na variável $conexao
            $conexao = Conexao::conectar();

            // comando SQL responsável por atualizar o nome de uma categoria
            // :nome e :id são espaços reservados para os valores que serão utilizados
            $sql = "UPDATE categoria SET nome = :nome WHERE id_categoria = :id";

            // prepara o SQL para executar
            $stmt = $conexao->prepare($sql);

            // coloca o valor de $nome no espaço reservado :nome
            $stmt->bindValue(':nome', $nome);

            // coloca o valor de $id no espaço reservado :id
            $stmt->bindValue(':id', $id);

            // executa o comando no banco
            $stmt->execute();
        } catch (PDOException $e) { // executa caso aconteça um erro
            // mostra o erro encontrado
            echo $e->getMessage();
        }
    }
}
