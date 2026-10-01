<?php
    require_once __DIR__ . "/../../template/_cabecalho.php"

?>


<main class="main-detalhe">
    <div class="cartao-perfil">
        <div class="celula foto">
            <?php if ($_SESSION['foto'] == null): ?>
                <img src="../../imagens/fotos/logo_senac.png" alt="">
            <?php else: ?>
                <img src="/BookVerse/imagens/fotos/uploads/<?= $_SESSION['foto'] ?>" alt="">
            <?php endif; ?>
        </div>
        <div class="celula nome">
            <p><?= $_SESSION['nome'] ?></p>
        </div>
        <div class="celula email">
            <p><?= $_SESSION['email'] ?></p>
        </div>
        <div class="navegacao">
            <a href="../categoria/gerenciar_categoria.php" class="celula">gerenciar categorias</a>
            <a href="../livro/cadastrar_livros.php" class="celula">cadastrar livros</a>
        </div>
</main>
<?php
require_once __DIR__ . "/../../template/_rodape.php"
?>

<script src="../../js/engine.js"></script>

</body>

</html>