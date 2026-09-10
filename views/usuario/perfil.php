<?php
    require_once __DIR__ . "/template/_cabecalho.php"
?>


    <main class="main-detalhe">
        <div>
            <table class="gerenciar-livros">
                <tr>
                    <th>nome do administrador</th>
                    <th><a href="gerenciar_livros.php">administrar livros</a></th>
                    <th>email@dominio.com</th>
                    <th colspan="2"><a href="gerenciar_categoria.php">administrar categorias</a></th>
                </tr>
            </table>
        </div>
    </main>
    <?php
    require_once __DIR__ . "/template/_rodape.php"
?>

    <script src="../BookVerse/js/engine.js"></script>
    
</body>
</html>