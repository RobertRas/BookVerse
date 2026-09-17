<?php

require_once __DIR__ . "/../conexao.php";

class Usuario{
    private $id_usuario;
    private $nome;
    private $email;
    private $senha;
    private $foto;

    public function inserir($nome,$email,$senha, $foto){
        //criar uma conexão com o banco de dados
        //criar o sql
        //preparar o sql
        //substituir os dados depois  de preparado
        //executar

        try{
            
            $conexao = Conexao::conectar();

            $sql = "INSERT INTO usuario (nome, email, senha, foto) VALUES (:nome, :email, :senha, :foto)";
            $stmt = $conexao->prepare($sql);

            $stmt->bindValue(':nome',$nome);
            $stmt->bindValue(':email',$email);
            $stmt->bindValue(':senha',$senha);
            $stmt->bindValue(':foto',$foto);

            return $stmt->execute();
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}