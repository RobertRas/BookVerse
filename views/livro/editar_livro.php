<?php
require_once __DIR__ . "/../../template/_cabecalho.php";
require_once __DIR__ . "/../../models/categoria.php";
require_once __DIR__ . "/../../models/livros.php";

$categorias = Categoria::listarCategorias(); //existe pq precisamos da lista de categorias para o select do formulário
$id = $_GET['id'];

$livro = new Livro();
$livro->carregar($id); //carrega os dados do livro com base no ID   
?>
<main class="main-detalhe">
    <!-- Adicionado o action para o controller e o enctype para permitir envio de arquivos -->
    <form action="/BookVerse/controllers/livro_editar_controller.php" method="post" enctype="multipart/form-data">

        <p>Editar Livro</p>
        <div class="form-items">
            <label for="titulo">Título: </label>
            <input type="text" name="titulo" id="titulo" value="<?= $livro->getTitulo(); ?>">
        </div>
        <div class="form-items">
            <label for="Ano">Ano Publicação: </label>
            <input type="text" name="ano" id="ano" value="<?= $livro->getano_pub(); ?>">
        </div>
        <div class="form-items">
            <label for="autor">Autor: </label>
            <input type="text" name="autor" id="autor" value="<?= $livro->getAutor(); ?>">
        </div>
        <div class="form-items">
            <label for="resumo">Resumo: </label>
            <textarea name="resumo" id="resumo" cols="30" rows="10"><?= $livro->getResumo(); ?></textarea>
        </div>
        <div class="form-items">
            <label for="foto">Capa: </label>
            <input type="file" name="capa" id="capa">
        </div>
        <div class="form-items">
            <label for="categoria">Categoria: </label>
            <select name="categoria" class="categoria">
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['id_categoria'] ?>" <?= ($categoria['id_categoria'] == $livro->getCategoria()) ? 'selected' : '' ?>><?= $categoria['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="hidden" name="id_livro" value="<?= $livro->getId(); ?>">
        <button type="submit">Atualizar</button>
    </form>
</main>
<?php
require_once __DIR__ . "/../../template/_rodape.php";
?>

</html>