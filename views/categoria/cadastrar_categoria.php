<?php
    require_once __DIR__ ."/../../template/_cabecalho.php";
?>
    <main class="main-detalhe">
        <form action="/BookVerse/controllers/categoria_add_controller.php" method="post">
            <p>Cadastrar Categoria</p>
            <div class="form-items">
                <label for="nome">Nome da categoria: </label>
                <input type="text" name="nome" id="nome">
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </main>

<?php
    require_once "../../template/_rodape.php"
?>
</body>
</html>