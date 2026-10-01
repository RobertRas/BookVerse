
<?php
session_start();

require_once __DIR__ . "/../models/livros.php";

$id =$_GET["id"];

$livro = new Livro();
$livro->deletar($id);

header("Location: /BookVerse/views/livro/gerenciar_livros.php");
exit();
