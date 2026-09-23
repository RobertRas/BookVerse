<?php

require_once __DIR__ ."/../models/categoria.php";
$nome = $_POST["nome"];

$categoria =  new Categoria();

$categoria->inserir($nome);

$_SESSION['aviso'] = "Categoria inserir com sucesso!";
header('Location: /BookVerse/views/categoria/gerenciar_categoria.php');
exit();



