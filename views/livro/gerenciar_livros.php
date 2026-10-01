<?php
    require_once __DIR__ ."/../../template/_cabecalho.php";
    require_once __DIR__ ."/../../models/livros.php"; // 1. Importa o model

    // 2. Busca os livros no banco de dados
    $livros = Livro::listar();
?>

    <main>
        <a href="/BookVerse/views/livro/cadastrar_livros.php" class="link-btn">Cadastrar livros</a>
        <table class="gerenciar-livros">
            <tr>
                <th>Título</th>
                <th>Ano</th>
                <th>Categoria</th>
                <th colspan="2">Opção</th>
            </tr>
            
            <!-- 3. Verifica se existem livros e faz o loop -->
            <?php if (empty($livros)): ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Nenhum livro cadastrado.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($livros as $livro): ?>
                    <tr >
                        <td><?= htmlspecialchars($livro['titulo'] ?? '') ?></td>
                        <td><?= htmlspecialchars($livro['ano_pub'] ?? '') ?></td>
                        <!-- 'nome' vem do JOIN com a tabela categoria que você fez no método listar() -->
                        <td><?= htmlspecialchars($livro['nome'] ?? '') ?></td> 
                        
                        <!-- Passando o ID do livro via GET (URL) para as páginas de editar e excluir -->
                        <td><a href="editar_livro.php?id=<?= $livro['id_livro'] ?>">Editar</a></td>
                        <td><a href="../../controllers/livro_del_controller.php?id=<?= $livro['id_livro'] ?>">Excluir</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </table>

    </main>

<?php
    require_once __DIR__ . "/../../template/_rodape.php";
?>
    <script src="/BookVerse/js/engine.js" defer></script>
</body>
</html>