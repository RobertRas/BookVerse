<?php

class Autenticacao {
    public static function logar($email, $senha) {
        session_start();

        $sql = "SELECT * FROM usuario WHERE email = :email";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['foto'] = $usuario['foto'];

            header("Location: ../BookVerse/views/usuario/perfil.php");
            exit();
        }

        header("Location: ../BookVerse/views/usuario/login.php)");
        exit();
    }
}