<?php
    require_once __DIR__ . "/../../template/_cabecalho.php";
?>

<main class="main-detalhe">
    <div class="cartao-perfil">
        <div class="celula foto">
            <!-- Usamos empty() para evitar erros caso a sessão da foto não exista -->
            <?php if (empty($_SESSION['foto'])): ?>
                <img src="/BookVerse/imagens/fotos/logo_senac.png" alt="Foto Padrão" class="img-perfil">
            <?php else: ?>
                <img src="/BookVerse/imagens/fotos/uploads/<?= htmlspecialchars($_SESSION['foto']) ?>" alt="Foto do Usuário" class="img-perfil">
            <?php endif; ?>
        </div>

        <!-- Nova div para exibir os dados do usuário -->
        <div class="dados-usuario">
            <!-- Usa operador de coalescência (??) caso a sessão esteja vazia por algum motivo -->
            <h2><?= htmlspecialchars($_SESSION['nome'] ?? 'Nome do Usuário') ?></h2>
            <p><?= htmlspecialchars($_SESSION['email'] ?? 'email@exemplo.com') ?></p>
        </div>

        <div class="itens-perfil">
            <a href="/BookVerse/views/categoria/gerenciar_categoria.php" class="link-btn">Gerenciar Categorias</a>
            <a href="/BookVerse/views/livro/gerenciar_livros.php" class="link-btn">Gerenciar livros</a>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . "/../../template/_rodape.php";
?>

<script src="../../js/engine.js"></script>

</body>
</html>