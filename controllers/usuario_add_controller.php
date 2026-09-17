<?php
require_once __DIR__ . "/../models/usuario.php";
$nome = $_POST["nome"];

$email = $_POST["email"];
$senha = $_POST["senha"];
$senha = password_hash($senha, PASSWORD_DEFAULT);


//verifica se o usuário enviou uma foto de perfil
if (!empty($_FILES["foto"]["name"])) {
    $foto = $_FILES["foto"];
    //verifica a extensão do arquivo enviado para garantir que seja uma imagem válida (jpg, jpeg, png ou gif)
    $extensao =  strtolower(pathinfo($foto["name"], PATHINFO_EXTENSION));

    $nomedafoto = uniqid() . "." . $extensao; //gera um nome único para a foto, evitando conflitos com nomes de arquivos existentes

    $caminho = __DIR__ . "/../imagens/fotos/uploads/" . $nomedafoto; //define o caminho onde a foto será salva no servidor

    move_uploaded_file($foto["tmp_name"], $caminho); //move a foto do diretório temporário para o diretório de destino

} else {
    $foto = null; // Se não houver foto, defina como null ou um valor padrão
}


$usuario = new Usuario();
$usuario->inserir($nome, $email, $senha, $foto); // chama o método inserir da classe Usuario, passando os dados do usuário (nome, email, senha e foto) para serem salvos no banco de dados

header("Location: /bookverse/views/usuario/login.php"); //redireciona o usuário para a página de login após o cadastro
exit();