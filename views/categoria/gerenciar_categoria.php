<?php
    require_once __DIR__ ."/../../template/_cabecalho.php";
    require_once __DIR__ ."/../../models/categoria.php";

    $resultado = Categoria::listarCategorias();
?>

    <main>
        <table class="gerenciar-categoria">
            <tr>
                <th>Nome Categoria</th>
                <th colspan="2">Opção</th>
            </tr>]
            <?php foreach($resultado as $categoria): ?>
            <tr>
                <td><?=  $categoria['nome'] ?></td>
                <td><a href="../controllers/categoria_edit_controller.php?id=<?= $categoria['id_categoria'] ?>">Editar</a></td>
                <td><a href="../controllers/categoria_del_controller.php?id=<?= $categoria['id_categoria'] ?>">Excluir</a></td>
            </tr>
            <?php endforeach; ?>
        </table>

    </main>

<?php
    require_once "../../template/_rodape.php"
?>
    <script src="../BookVerse/js/engine.js" defer></script>
</body>

</html>