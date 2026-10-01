<?php
require_once __DIR__ . "/../models/livros.php";
session_start();

$titulo = $_POST['titulo'];
$ano = $_POST['ano'];
$autor = $_POST['autor'];
$resumo = $_POST['resumo'];
$cat = $_POST['categoria'];

if (!empty ($_FILES['capa']['name'])) {
    
    $foto = $_FILES['capa'];
    $extensao = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));
    $nomedafoto = uniqid() . "." . $extensao;
    $caminho = __DIR__ ."/../imagens/capas/uploads/" . $nomedafoto;
    move_uploaded_file($foto["tmp_name"], $caminho);
}else{
    $nomedafoto = null;
}


$livro = new Livro();
$livro->inserir($titulo, $ano, $autor, $resumo, $nomedafoto ,$cat);

$_SESSION['aviso'] = "Livro adicionado com sucesso!";
header("Location: /BookVerse/views/livro/gerenciar_livros.php");
exit();
