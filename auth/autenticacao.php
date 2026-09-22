<?php

class Autenticacao
{
    public static function logar($email, $senha)
    {
        session_start();

        $sql = "SELECT * FROM usuario WHERE email = :email";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['foto'] = $usuario['foto'];

            header("Location: ../BookVerse/views/usuario/perfil.php");
            exit();
        }
        $_SESSION['aviso'] = 'Email ou senha inválidos';
        header("Location: ../BookVerse/views/usuario/login.php)");
        exit();
    }

    //verifica se o usuario está logado
    public static function estaAutenticado() {
        session_start();
        return isset($_SESSION['id_usuario']); //isset retorna true se o usuario estiver logado
    }

    public static function logout() {
        session_start();
        $_SESSION=[];
        session_destroy();

        header('Location: /BookVerse/views/usuario/login.php');
        exit();
    }

    //verifica se a pessoa tá logada e redireciona para a página de login
    public static function exigirAutenticacao(){
        if (!self::estaAutenticado()) {
            header('Location: /BookVerse/views/usuario/login.php');
            exit();
        }
    }
}
