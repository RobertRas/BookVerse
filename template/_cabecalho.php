<?php
session_start();
require_once __DIR__ . "/../auth/autenticacao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookVerse</title>
    <link rel="stylesheet" href="/bookverse/CSS/style.css">
</head>

<body>
    <video autoplay muted loop id="bg-video">
        <source src="src/universo.mp4" type="video/mp4">
        Seu navegador não suporta vídeo em HTML5.
    </video>
    <header>
        <div class="logo-menu">
            <img src="imagens/logo_senac.png" alt="" class="logo">

            <img src="imagens/menu.png" alt="" id="btn-menu">
        </div>

        <h1> BookVerse</h1>


        <nav id="menu_global">
            <a href="/BookVerse/index.php">Início</a>
            <?php if (!Autenticacao::estaAutenticado()): ?>
                <a href="/BookVerse/views/usuario/cadastro.php">Cadastre-se</a>
                <a href="/BookVerse/views/usuario/login.php">Entrar</a>
            <?php else: ?>
                <a href="/BookVerse/views/usuario/perfil.php">Perfil</a>
                <a href="/BookVerse/controllers/logout_controller.php">Sair</a>
            <?php endif; ?>
        </nav>
    </header>

    <?php

    require_once __DIR__ . "/_avisos.php";
    ?>