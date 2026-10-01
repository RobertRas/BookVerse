<?php
require_once __DIR__ . "/../models/usuario.php";
$nome = $_POST["nome"];

//receber os dados do front
$email = $_POST["email"];
$senha = $_POST["senha"];
$senha = password_hash($senha, PASSWORD_DEFAULT);


//verifica se o usuário enviou uma foto de perfil
if (!empty($_FILES["foto"]["name"])) {
    $foto = $_FILES["foto"];
    //verifica a extensão do arquivo enviado para garantir que seja uma imagem válida (jpg, jpeg, png ou gif)
    $extensao =  strtolower(pathinfo($foto["name"], PATHINFO_EXTENSION));

    $nomedafoto = uniqid() . "." . $extensao; //gera um nome único

    $caminho = __DIR__ . "/../imagens/fotos/uploads/" . $nomedafoto; //define o caminho

    move_uploaded_file($foto["tmp_name"], $caminho); //move a foto

} else {
    // CORREÇÃO 1: Mudar de $foto para $nomedafoto
    $nomedafoto = null; 
}


$usuario = new Usuario();

// CORREÇÃO 2: Passar a variável $nomedafoto em vez de $foto
$usuario->inserir($nome, $email, $senha, $nomedafoto); 

header("Location: /bookverse/views/usuario/login.php"); 
exit();