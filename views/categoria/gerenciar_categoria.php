<?php
    require_once __DIR__ ."/../../template/_cabecalho.php";
<<<<<<< HEAD
    require_once __DIR__ ."/../../models/categoria.php";

    $resultado = Categoria::listarCategorias();
=======
>>>>>>> origin
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
                <td><a href="editar_categoria.php">Editar</a></td>
                <td><a href="excluir_categoria.php">Excluir</a></td>
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