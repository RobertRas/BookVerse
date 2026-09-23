
<?php
session_start();

require_once __DIR__ . "/../models/categoria.php";

$id =$_GET["id"];

$categoria = new Categoria();
$categoria->deletar($id);

header("Location: /BookVerse/views/categoria/gerenciar_categoria.php");
exit() ;
