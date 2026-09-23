<?php
    require_once __DIR__ ."/../../template/_cabecalho.php";
    require_once __DIR__ ."/../../models/categoria.php";

    $id =  $_GET["id"];
    $categoria = new Categoria();
    $categoria->carregar($id);
?>
    <main class="main-detalhe">
        <form action="/BookVerse/controllers/categoria_edit_controller.php" method="post">
            <p>Cadastrar Categoria</p>
            <div class="form-items">
                <label for="nome">Nome da categoria: </label>
                <input type="text" name="nome" id="nome" value="<?= $categoria->getNome()?>">
            </div>

            <input type="hidden" name="id" value="<?= $categoria->getId()?>">

            <button type="submit">Cadastrar</button>
        </form>
    </main>

<?php
    require_once "../../template/_rodape.php"
?>
</body>
</html>