<?php
require_once __DIR__ . "/../auth/autenticacao.php";
require_once __DIR__ ."/../configs/conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

Autenticacao::logar($email, $senha);
