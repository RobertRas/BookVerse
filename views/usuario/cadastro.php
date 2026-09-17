<?php
    require_once __DIR__ . "/../../template/_cabecalho.php"
?>
    <main class="main-detalhe">
        <!--no formulário abaixo, o atributo enctype="multipart/form-data" é necessário para que o formulário possa enviar arquivos (no caso, a foto de perfil do usuário) para o servidor. Sem esse atributo, o arquivo não seria enviado corretamente.
        o atributo action="/controllers/usuario_add_controller.php" indica que, quando o formulário for enviado, os dados serão enviados para o arquivo usuario_add_controller.php, que está localizado na pasta controllers. Esse arquivo será responsável por processar os dados do formulário e realizar a inserção do novo usuário no banco de dados. -->
        <form action="/controllers/usuario_add_controller.php" method="post" enctype="multipart/form-data">
            <img src="imagens/logo_senac.png" alt="" class="logo">
            <div class="form-items">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome">
            </div>
            <div class="form-items">
                <label for="email">E-mail: </label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-items">
                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha">
            </div>
            <div class="form-items">
                <label for="foto">foto de perfil: </label>
                <input type="file" name="foto" id="foto">
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </main>
<?php
    require_once __DIR__ . "/../../template/_rodape.php"
?>
</body>
</html>