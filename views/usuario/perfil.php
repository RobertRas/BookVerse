<?php
require_once __DIR__ . "/../../template/_cabecalho.php"
?>


<main class="main-detalhe">
    <div class="container-perfil">
        <div class="itens-perfil">
            <p>Nome: <?=$_SESSION['nome']; ?></p>
            <p>Email: <?= $_SESSION['email']; ?></p>
            <!-- <table class="gerenciar-livros">
                <tr>
                    <th>nome do administrador</th>
                    <th><a href="gerenciar_livros.php">administrar livros</a></th>
                    <th>email@dominio.com</th>
                    <th colspan="2"><a href="gerenciar_categoria.php">administrar categorias</a></th>
                </tr>
            </table> -->
        </div>
        <div class="itens-perfil">
            <a href="../categoria/gerenciar_categoria.php" class="link-btn">Gerenciar Categorias</a>
            <a href="../categoria/cadastrar_categoria.php" class="link-btn">Cadastrar Categoria</a>
        </div>
    </div>
</main>
<?php
require_once __DIR__ . "/../../template/_rodape.php"
?>

<script src="../BookVerse/js/engine.js"></script>

</body>

</html>