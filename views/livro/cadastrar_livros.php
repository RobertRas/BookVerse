<?php
    require_once __DIR__ ."/../../template/_cabecalho.php";
    require_once __DIR__ ."/../../models/categoria.php";

    $categorias = Categoria::listarCategorias();
?>
    <main class="main-detalhe">
        <form action="" method="post">
            <p>Cadastrar Livro</p>
            <div class="form-items">
                <label for="titulo">Título: </label>
                <input type="text" name="titulo" id="titulo">
            </div>
            <div class="form-items">
                <label for="Ano">Ano Publicação: </label>
                <input type="text" name="ano" id="ano">
            </div>
            <div class="form-items">
                <label for="autor">Autor: </label>
                <input type="text" name="autor" id="autor">
            </div>
            <div class="form-items">
                <label for="resumo">Resumo: </label>
                <textarea name="resumo" id="resumo" cols="30" rows="10"></textarea>
            </div>
            <div class="form-items">
                <label for="foto">Capa: </label>
                <input type="file" name="capa" id="capa">
            </div>
            <div class="form-items">
                <label for="categoria">Categoria: </label>
                <select name="categoria" class="categoria">
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria['id_categoria'] ?>"><?= $categoria['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </main>
    <?php
    require_once __DIR__ . "/../../template/_rodape.php";
?>
</html>