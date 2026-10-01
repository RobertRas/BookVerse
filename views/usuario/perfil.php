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
        <div class="itens-perfil">
            <a href="/BookVerse/views/categoria/gerenciar_categoria.php" class="link-btn">Gerenciar Categorias</a>
            <a href="/BookVerse/views/livro/cadastrar_livros.php" class="link-btn">Cadastrar livros</a>
        </div>
</main>
<?php
require_once __DIR__ . "/../../template/_rodape.php"
?>


<script src="../../js/engine.js"></script>


</body>

</html>