<?php
require_once __DIR__ . "/../models/livros.php";


$id = $_POST["id"];
$titulo = $_POST["titulo"];
$ano_pub = $_POST["ano"];
$autor = $_POST["autor"];
$resumo = $_POST["resumo"];
$id_categoria = $_POST["categoria"];

$livro =  new Livro();



if (!empty ($_FILES['capa']['name'])) {
    
    $foto = $_FILES['capa'];
    $extensao = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));
    $nomedafoto = uniqid() . "." . $extensao;
    $caminho = __DIR__ ."/../imagens/capas/uploads/" . $nomedafoto;
    move_uploaded_file($foto["tmp_name"], $caminho);

    $livro->atualizar($id, $titulo, $ano_pub, $autor, $resumo, $nomedafoto ,$id_categoria);
    header("Location: /BookVerse/views/livro/gerenciar_livros.php");
    exit();
}else{
    $livro->atualizarSemCapa($id, $titulo, $ano_pub, $autor, $resumo, $id_categoria);
    header("Location: /BookVerse/views/livro/gerenciar_livros.php");
    exit();
}


