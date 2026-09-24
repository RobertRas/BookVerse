<?php // Tag de abertura que indica o início do script PHP.

require_once __DIR__ . "/../configs/conexao.php"; // Inclui o arquivo que contém a classe Conexao, necessário para acessar o banco de dados.


class Livro { // Declara a classe 'Livro', que atua como o Model para representar a entidade de livros do banco de dados.
    
    // Declaração das propriedades privadas da classe (atributos do livro).
    // Sendo 'private', elas só podem ser acessadas diretamente de dentro desta própria classe.
    private $id_livro;
    private $titulo;
    private $ano_pub;
    private $autor;
    private $resumo;
    private $capa;
    private $categoria;

        public function carregar($id_livro,$titulo)
    {
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT * FROM livro WHERE id_livro = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $id_livro);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                $this->id_livro = $resultado['id_livro'];
                $this->titulo = $resultado['titulo'];
            } else {
                throw new Exception("Livro não encontrado.");
            }
        } catch (PDOException $e) {
            echo 'Erro ao carregar livro: ' . $e->getMessage();
        }
    }

    public function deletar($id)
    {
        try {
            $conexao = Conexao::conectar();
            $sql = "DELETE FROM livro WHERE id_livro = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao deletar livro: ' . $e->getMessage();
        }
    }


    public function inserir($titulo, $ano_pub, $autor, $resumo, $capa, $id_categoria){ // Método público para inserir um novo livro no banco de dados.
        //criar uma conexão com o banco de dados
        //criar o sql
        //preparar o sql
        //substituir os dados depois  de preparado
        //executar

        try{
            
            $conexao = Conexao::conectar();

            $sql = "INSERT INTO livro (titulo,ano_pub,autor,resumo,capa, id_categoria) VALUES (:titulo,:ano_pub,:autor,:resumo,:capa,:id_categoria)";
            $stmt = $conexao->prepare($sql);

            $stmt->bindValue(':titulo',$titulo);
            $stmt->bindValue(':ano_pub',$ano_pub);
            $stmt->bindValue(':autor',$autor);
            $stmt->bindValue(':resumo',$resumo);
            $stmt->bindValue(':capa',$capa);
            $stmt->bindValue(':id_categoria',$id_categoria);
            $stmt->execute();

            
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function listar() { // Cria um método estático para buscar todos os livros, permitindo chamá-lo sem instanciar a classe (Livro::listar()).
        try { // Inicia um bloco 'try' para tentar executar o código. Se der erro de banco, cai no 'catch'.
            $conexao = Conexao::conectar(); // Chama o método conectar() da classe Conexao para abrir a comunicação com o banco.
            $sql = "SELECT * FROM livro"; // Define a string da consulta SQL para selecionar todas as colunas de todos os registros da tabela 'livro'.
            $stmt = $conexao->prepare($sql); // Prepara a consulta SQL no banco, prática recomendada por segurança.
            $stmt->execute(); // Executa a consulta SQL preparada.
            return $stmt->fetchAll(); // Busca todas as linhas resultantes da consulta e as retorna como um array.
        } catch (PDOException $e) { // Captura qualquer exceção do tipo PDOException (erros específicos de banco de dados).
            echo 'Erro ao listar livros: ' . $e->getMessage(); // Exibe na tela a mensagem de erro caso a consulta falhe.
            
        }
    }

    public static function buscarPorId($id){ // Cria um método estático para buscar um único livro específico baseado no seu ID.
        try { // Inicia o bloco de tratamento de erros.
            $conexao = Conexao::conectar(); // Abre a conexão com o banco de dados.
            
            // Define a consulta SQL que busca os dados do livro e também faz um 'LEFT JOIN' com a tabela 'categoria'.
            // Isso serve para trazer o 'nome' da categoria junto com os dados do livro, filtrando pelo ':id'.
            $sql = "SELECT livro.*, categoria.nome FROM livro  LEFT JOIN categoria ON livro. id_categoria = categoria.id_categoria WHERE id_livro = :id";
            
            $stmt = $conexao->prepare($sql); // Prepara a consulta SQL.
            $stmt->bindValue(':id', $id); // Substitui o parâmetro ':id' na consulta SQL pelo valor real da variável '$id', protegendo contra injeção de SQL.
            $stmt->execute(); // Executa a consulta.
            return $stmt->fetch(); // Busca e retorna apenas uma única linha (já que o ID é único) com os dados do livro e da categoria correspondente.
        } catch (PDOException $e) { // Captura erros de banco de dados caso ocorram durante este processo.
            echo 'Erro ao buscar o livro: ' . $e->getMessage(); // Exibe a mensagem de erro na tela.
        }
    }
}
