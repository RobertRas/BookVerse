<?php
    require_once __DIR__ ."/../../template/_cabecalho.php";
?>

    <main>
        <table class="gerenciar-categoria">
            <tr>
                <th>Nome Categoria</th>
                <th colspan="2">Opção</th>
            </tr>
            <tr>
                <td>romance</td>
                <td><a href="editar_categoria.html">Editar</a></td>
                <td><a href="excluir_categoria.html">Excluir</a></td>
            </tr>

        </table>

    </main>

<?php
    require_once "../../template/_rodape.php"
?>
    <script src="../BookVerse/js/engine.js" defer></script>
</body>

</html>