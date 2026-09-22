<?php // Tag de abertura que indica o início do script PHP.

require_once __DIR__ . "/../auth/autenticacao.php"; // Inclui o arquivo 'autenticacao.php' (onde está a classe Autenticacao) uma única vez, usando o caminho a partir do diretório atual (__DIR__).
require_once __DIR__ ."/../configs/conexao.php"; // Inclui o arquivo 'conexao.php' (onde está a classe Conexao) uma única vez, garantindo que o banco de dados possa ser acessado.

$email = $_POST['email']; // Captura o dado enviado pelo formulário HTML no campo 'email' através do método HTTP POST e o guarda na variável $email.
$senha = $_POST['senha']; // Captura o dado enviado pelo formulário HTML no campo 'senha' através do método HTTP POST e o guarda na variável $senha.

Autenticacao::logar($email, $senha); // Chama o método estático 'logar' da classe 'Autenticacao', passando o email e a senha recém-capturados para tentar fazer o login.
