<?php

    require_once __DIR__ ."/../../template/_cabecalho.php";
    
    require_once __DIR__ ."/../../models/livros.php";


    //esse if serve para que se o usuario tentar acessar a página detalhes.php sem passar o id do livro, ele seja redirecionado para a página inicial
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $livro = Livro::buscarPorId($id);
    } else {
        header("Location: /BookVerse/index.php");
        exit();

    }
    if(!$livro) {
        header("Location: /BookVerse/index.php");
        exit();
    }
?>

    <main class="main-detalhe">
        <div id="img-detalhe">
            <img src="imagens/Captura de tela 2026-07-01 200144.png" alt="">
        </div>
        <div id="texto-detalhe">
            <h2><?php echo $livro['titulo']; ?></h2>
            <br>
            <p><?php echo $livro['ano_pub']; ?></p>
            <br>
            <p><?php echo $livro['resumo']; ?></p>
        </div>
    </main>

    <?php
    require_once __DIR__ ."/../../template/_cabecalho.php"
?>

</body>
</html>