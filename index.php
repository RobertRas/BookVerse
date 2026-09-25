<?php
require_once __DIR__ . "/template/_cabecalho.php";
require_once __DIR__ . "/models/livros.php";

$resultado = Livro::listar();
?>

<main>
    <img class="banner jumbo" src="imagens/logo_senac.png" alt="">
    <h1>Biblioteca</h1>
    <div class="card-container">
        <?php foreach ($resultado as $livro): ?>
            <?php
            // Pega o ID com segurança
            $id = $livro['Id_livro'] ?? $livro['Id_livro'] ?? '';

            // Verifica se 'capa' existe no array retornado do banco
            $capa = $livro['capa'] ?? $livro['imagem'] ?? null;
            ?>
            <a href="/BookVerse/views/livro/detalhes.php?id=<?= $id ?>">
                <div class="card">
                    <div class="card-img">
                        <?php if (empty($capa)): ?>
                            <img src="imagens/Captura de tela 2026-07-01 200144.png" alt="Capa padrão" class="imagem_livro">
                        <?php else: ?>
                            <img src="imagens/<?= htmlspecialchars($capa) ?>" alt="<?= htmlspecialchars($livro['titulo'] ?? '') ?>" class="imagem_livro">
                        <?php endif; ?>
                    </div>
                    <div class="card-text">
                        <h2><?= htmlspecialchars($livro['titulo'] ?? 'Sem título'); ?></h2>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</main>

<?php
// Corrigido: usando __DIR__ para apontar corretamente para a pasta template local
require_once __DIR__ . "/template/_rodape.php";
?>