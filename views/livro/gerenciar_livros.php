<?php
    require_once "_cabecalho.php"
?>

    <main>
        <table class="gerenciar-livros">
            <tr>
                <th>Título</th>
                <th>Ano</th>
                <th>Categoria</th>
                <th colspan="2">Opção</th>
            </tr>
            <tr>
                <td>nome do livro</td>
                <td>2014</td>
                <td>romance</td>
                <td><a href="editar_livro.html">Editar</a></td>
                <td><a href="excluir_livro.html">Excluir</a></td>
            </tr>

        </table>

    </main>

<?php
    require_once "_rodape.php"
?>
    <script src="../BookVerse/js/engine.js" defer></script>
</body>

</html>